<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Event;
use App\Models\Payment;
use Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $registrations = Registration::where('user_id', $userId)
        ->with('event')
        ->paginate(5); // Batas maksimal 5 data per halaman

        return view('pages-user.eventseminar', compact('registrations'));
    }

    public function store(Request $request, $eventId)
    {
        // Validasi event
        $event = Event::find($eventId);
        if (!$event) {
            return response()->json(['success' => false, 'message' => 'Event tidak ditemukan.']);
        }

        // Cek apakah user sudah terdaftar di event ini
        $existingRegistration = Registration::where('user_id', Auth::id())
                                            ->where('event_id', $eventId)
                                            ->first();
        if ($existingRegistration) {
            return response()->json(['success' => false, 'message' => 'Anda sudah terdaftar di event ini.']);
        }

        // Cek apakah kuota masih tersedia
        if ($event->kouta_peserta <= 0) {
            return redirect()->back()->with('error', 'Kuota peserta sudah penuh.');
        }
        
        // Simpan pendaftaran
        $registration = Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $eventId,
            'status' => 'registered',
            'certificate_path' => null, // Anda bisa menambahkan logika untuk sertifikat jika diperlukan
        ]);

        // Kurangi kuota peserta
        $event->kouta_peserta -= 1;
        $event->save();

        return response()->json(['success' => true, 'message' => 'Berhasil mendaftar event.']);
    }

    public function show($eventId)
    {
        $event = Event::find($eventId);

        if (!$event) {
            return abort(404, 'Event tidak ditemukan.');
        }

        // Mengambil data pendaftaran pengguna untuk event ini
        $registration = Registration::where('user_id', Auth::id())
                                    ->where('event_id', $eventId)
                                    ->first();

        return view('pages-user.detail-event', [
            'event' => $event,
            'registration' => $registration
        ]);
    }

    public function cancel($id)
    {
        // Temukan pendaftaran berdasarkan ID
        $registration = Registration::findOrFail($id);

        // Temukan event terkait
        $event = $registration->event;
        
        // Hapus pendaftaran
        $registration->delete();
    

        // Tambah kuota peserta kembali
        if ($event) {
            $event->kouta_peserta += 1;
            $event->save();
        }

        // Redirect atau tampilkan notifikasi sukses
        return redirect()->route('event-seminar')->with('success', 'Pendaftaran berhasil dibatalkan');
    }
}

    

