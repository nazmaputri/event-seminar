<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
        public function generate($registrationId)
        {
            $registration = Registration::with('user', 'event')->findOrFail($registrationId);

            // Periksa status sertifikat
            if (!$registration->certification_status) {
                return redirect()->back()->with('error', 'Anda tidak berhak mencetak sertifikat karena status sertifikat belum dikonfirmasi oleh admin.');
            }

        // Prepare data for the view
        $data = [
            'participant_name' => $registration->user->name,
            'event_name' => $registration->event->judul_event,
            'event_date' => $registration->event->tanggal_dan_jam, // Adjust format as needed
            'event_location' => $registration->event->lokasi,
            'organizer_name' => $registration->event->penyelenggara_event,
            'signature_image1' => asset('storage/images/signature-1.png'), // Path to signature image 1
            'signature_name1' => 'Dhika Hidayatullah', // Replace with actual signature name if dynamic
            'signature_title1' => 'Direktur Jenderal Aplikasi Informatika',
            'signature_image2' => asset('storage/images/signature-2.jpg'), // Path to signature image 2
            'signature_name2' => 'Samuel Handalisman', // Replace with actual signature name if dynamic
            'signature_title2' => 'Direktur Jenderal Aplikasi Informatika'
        ];
        
        // Load the view for the certificate with data
        $pdf = Pdf::loadView('certificate', $data);

        // Return the PDF as a download
        return $pdf->download('certificate-' . $registrationId . '.pdf');

        if ($event->end_date > $currentDate) {
            return redirect()->back()->with('error', 'Sertifikat tidak bisa dicetak karena event belum selesai.');
        }
    
    }

    public function updateCertificationStatus(Request $request)
    {
        $status = $request->input('certification_status', []);

        // Ambil semua ID registrasi yang ada di form
        $registrationIds = array_keys($status);

        // Update status sertifikat berdasarkan ID
        foreach ($registrationIds as $registrationId) {
            $registration = Registration::find($registrationId);
            if ($registration) {
                // Set status checklist sesuai dengan input form
                $registration->certification_status = isset($status[$registrationId]) ? (bool)$status[$registrationId] : false;
                $registration->save();
            }
        }

        // Update status sertifikat yang tidak ada di checkbox
        $allRegistrationIds = Registration::pluck('id')->toArray();
        $uncheckedIds = array_diff($allRegistrationIds, $registrationIds);

        foreach ($uncheckedIds as $id) {
            $registration = Registration::find($id);
            if ($registration) {
                $registration->certification_status = false;
                $registration->save();
            }
        }

        return redirect()->back()->with('success', 'Status sertifikat berhasil diperbarui.');
    }


    


    
    // public function generateCertificate($userId, $eventId)
    // {
    //     // Ambil data user dari database
    //     $user = User::findOrFail($userId);
    //     $event = Event::findOrFail($eventId);

    //     // Data untuk dikirim ke view
    //     $data = [
    //         'participant_name' => $user->name,
    //         'event_name' => $event->judul_event,
    //         'event_date' => $event->tanggal_dan_jam,
    //         'event_location' => $event->lokasi,
    //         'organizer_name' => $event->penyelenggara_event,
    //         'signature_title' => 'Event Coordinator',
    //     ];

    //     $pdf = Pdf::loadView('certificate', $data)
    //     ->setPaper('a4', 'landscape'); // Set ukuran dan orientasi kertas

    //     // Unduh file PDF
    //     return $pdf->download('certificate-' . $user->name . '.pdf');
    // }

    // public function print($id)
    // {
    //     $certificate = Certificate::where('id', $id)->firstOrFail();
    //     // Logika untuk mencetak sertifikat, misalnya mengarahkan ke halaman cetak PDF

    //     return view('certificate.print', compact('certificate'));
    // }

}
