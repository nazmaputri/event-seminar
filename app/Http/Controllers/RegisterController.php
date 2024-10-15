<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
        //Show halaman register untuk user
        public function index() {
            return view('registrasi');
        }

    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'telp' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        User::create([
            'name' => $validatedData['name'],
            'nik' => $validatedData['nik'],
            'email' => $validatedData['email'],
            'telp' => $validatedData['telp'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user', // Set default role
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
