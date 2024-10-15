<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //Dashboard User
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = auth()->user();

        // Update nama jika diisi
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        // Update email jika diisi
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Update foto profil jika ada
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && Storage::exists('public/profile_photos/' . $user->profile_photo)) {
                Storage::delete('public/profile_photos/' . $user->profile_photo);
            }

            // Simpan foto profil baru
            $fileName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->storeAs('public/profile_photos', $fileName);

            // Update nama file foto profil di database
            $user->profile_photo = $fileName;
        }

        // Simpan perubahan ke database
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function userIndex()
    {
        // Ambil semua event dari database
        $events = Event::paginate(4);
        
        // Kirim data event ke view dashboard-user.blade.php
        return view('pages-user.dashboard-user', compact('events'));
    }

    public function showInfo($id)
    {
        // Mengambil event berdasarkan ID
         $event = Event::findOrFail($id); 

         // Mengirim data event ke view
         return view('pages-user.info-event', compact('event'));
    }

    //Admin
    public function index()
{
    // Hitung total event
    $totalEvents = Event::count();

    // Hitung total user dengan role 'user' pada tabel users
    $totalUsers = User::where('role', 'user')->count();

    // Return ke view pages-admin.dashboard
    return view('pages-admin.dashboard', compact('totalEvents', 'totalUsers'));
}

    
}
