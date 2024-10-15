<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //Show halaman login untuk customer
    public function index() {
        return view('login');
    }

 
    public function login(Request $request)
{
    try {
        // Validasi input
        $validateUser = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validateUser->fails()) {
            return back()->withErrors($validateUser->errors())->withInput();
        }

        // Autentikasi pengguna
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return back()->with('error', 'Email dan Password tidak sesuai')->withInput();
        }

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Periksa peran pengguna dan arahkan ke halaman yang sesuai
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('dashboard-user');
        } else {
            return back()->with('error', 'Role tidak valid.');
        }

    } catch (\Throwable $th) {
        return back()->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
    }
}
    
            //Logout
        public function logout(){
            auth()->user()->tokens()->delete();

            //Return Json Response
            return response()->json([
                'status'  => true,
                'message' => 'Berhasil logout!',
                'data'    => [],
            ],200);
        }

}
