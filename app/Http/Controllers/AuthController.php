<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUserModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function dologin(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);

        // Ambil data user berdasarkan email
        $user = DataUserModel::where('user_email', $request->user_email)->first();

        // Cek apakah user ditemukan dan password sesuai
        if ($user && Hash::check($request->user_password, $user->user_password)) {
            // Set autentikasi manual
            Auth::login($user);

            // Jika sukses, redirect ke dashboard atau halaman lain
            return redirect()->intended('/dashboard');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'user_email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}