<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use App\Http\Requests\EventStoreRequest;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Log;


class EventController extends Controller
{
    public function showForm()
    {
    return view('pages-admin.tambah'); // Gantilah dengan nama view yang sesuai
    }

    public function adminIndex() {
        // Ambil semua event dari database
        $events = Event::paginate(5);

        return view('pages-admin.event', ['events' => $events]); // Mengirim data event ke view
    }
    
    public function eventLp()
    {
        // Ambil semua event dari database
        $events = Event::paginate(4);
        
        // Kirim data event ke view
        return view('event-lp', compact('events'));
    }

    public function showPeserta($eventId)
    {
        $event = Event::findOrFail($eventId);
        $registrations = Registration::where('event_id', $eventId)
                                    ->with('user') // Mengambil data user yang terdaftar
                                    ->get();

        return view('pages-admin.detail-event', compact('event', 'registrations'));
    }

    public function tambah(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'penyelenggara_event'    => 'required|string|max:255',
        'judul_event'            => 'required|string|max:255',
        'deskripsi_event'        => 'required|string',
        'jenis_event'            => 'required|string|max:255',
        'kouta_peserta'          => 'required|integer',
        'link_akses'             => 'nullable|url',
        'tanggal_dan_jam'        => 'required|date_format:Y-m-d\TH:i',
        'end_date'               => 'required|date_format:Y-m-d\TH:i',
        'lokasi'                 => 'required|string',
        'harga'                  => 'nullable|numeric|min:0',
        'image'                  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Jika ada file gambar, simpan ke storage dan update validatedData dengan path file
    if ($request->hasFile('image')) {
        $fileName = time() . '.' . $request->image->extension();

        // Simpan file ke storage/public/images dan ambil path-nya
        $filePath = $request->image->storeAs('images', $fileName, 'public');
        $validatedData['image'] = $filePath; // Update path file pada data yang akan disimpan
    }

    // Buat event baru dengan data yang telah divalidasi
    Event::create($validatedData);

    // Redirect dengan session success
    return redirect()->route('event-tambah')->with('success', 'Event berhasil ditambahkan.');
    
}

    public function showDetail($id)
    {
        // Mengambil event berdasarkan ID
         $event = Event::findOrFail($id); 

         // Mengirim data event ke view
         return view('pages-admin.detail-event', compact('event'));
    }

        public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'penyelenggara_event'    => 'required|string|max:255',
            'judul_event'            => 'required|string|max:255',
            'deskripsi_event'        => 'required|string',
            'jenis_event'            => 'required|string|max:255',
            'kouta_peserta'          => 'required|integer',
            'link_akses'             => 'nullable|url',
            'tanggal_dan_jam'        => 'required|date_format:Y-m-d\TH:i',
            'lokasi'                 => 'required|string',
            'harga'                  => 'nullable|numeric|min:0',
            'image'                  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update data
        $event->penyelenggara_event = $request->penyelenggara_event;
        $event->judul_event = $request->judul_event;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->jenis_event = $request->jenis_event;
        $event->kouta_peserta = $request->kouta_peserta;
        $event->link_akses = $request->link_akses;
        $event->tanggal_dan_jam = $request->tanggal_dan_jam;
        $event->harga = $request->harga;
        $event->lokasi = $request->lokasi;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $event->image = $imagePath;
        }

        $event->save();

        // Redirect dengan session success
        return redirect()->route('event-admin')->with('success', 'Event berhasil diupdate!.');
      
    }

    public function edit($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect()->route('pages-admin.edit')->with('error', 'Event tidak ditemukan');
        }

        return view('pages-admin.edit', compact('event'));
    }

    public function destroy($id)
    {
        \Log::info("Hapus event dengan ID: {$id}");

        // Find Event
        $event = Event::find($id);
        if (!$event) {
            \Log::error("Event dengan ID: {$id} tidak ditemukan");
            return response()->json([
                'message' => 'Event tidak ditemukan'
            ], 404);
        }

        // Delete Image from Storage
        if ($event->image) {
            $imagePath = 'storage/' . $event->image; // Pastikan path-nya sesuai dengan folder 'images'
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                \Log::info("Gambar event dengan path: {$imagePath} dihapus");
            } else {
                \Log::warning("Gambar event dengan path: {$imagePath} tidak ditemukan");
            }
        }

        // Delete Event
        $event->delete();
        \Log::info("Event dengan ID: {$id} dihapus");

        // Redirect kembali ke halaman event-admin dengan pesan sukses
        return redirect()->route('event-admin')->with('success', 'Event berhasil dihapus');
    }
}