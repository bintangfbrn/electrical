<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Kirim ke API login
        $response = Http::post(url('/api/login'), [
            'email' => $request->username, // API kamu pakai "email"
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Simpan token ke session
            session(['api_token' => $data['token']]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        $token = session('api_token');

        if ($token) {
            Http::withToken($token)->post(url('/api/logout'));
        }

        // Hapus token dari session
        session()->forget('api_token');

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
