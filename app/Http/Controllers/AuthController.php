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
            'password' => 'required',
        ]);

        // Ambil data user berdasarkan email
        $user = DataUserModel::where('user_email', $request->user_email)->first();

        // Cek apakah user ditemukan
        if ($user) {
            // Cek apakah password sesuai
            if (Hash::check($request->password, $user->password)) {

                // Cek status user dan atur autentikasi
                $credentials = $request->only('user_email', 'password');

                if (Auth::attempt($credentials)) {
                    // Set status user di session
                    $user = Auth::user();

                    if ($user->user_status == 'Administrator') {
                        return redirect()->intended('/adm/dashboard');
                    } elseif ($user->user_status == 'HO BAT') {
                        return redirect()->intended('/ho-bat/dashboard');
                    } elseif ($user->user_status == 'ASM') {
                        return redirect()->intended('/asm/dashboard');
                    } elseif ($user->user_status == 'HO Distributor') {
                        return redirect()->intended('/hod/dashboard');
                    } else {
                        return redirect()->intended('/');
                    }
                }
            }
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