<?php

namespace App\Http\Controllers;

use App\Models\RiwayatEvent;
use App\Models\Event;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Registration;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CertificateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatEventController extends Controller
{
    public function showHistory()
    {
        $userId = auth()->user()->id;

        // Mengambil data dengan pagination (5 data per halaman)
        $riwayatEvents = Registration::where('user_id', $userId)
            ->where('status', 'registered')
            ->paginate(5); // Menambahkan pagination dengan batas 5 data per halaman

        // Melempar data ke view
        return view('pages-user.riwayat', ['registrations' => $riwayatEvents]);
    }
    
}
