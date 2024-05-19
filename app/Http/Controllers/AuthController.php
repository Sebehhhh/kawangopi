<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private function setFlashAlert($type, $title, $message)
    {
        // Set flash alert menggunakan session
        Session::flash('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $this->setFlashAlert('success', 'Success!', 'You have successfully logged in.');
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan kesalahan
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Menghasilkan token sesi yang baru
        $this->setFlashAlert('success', 'Success!', 'You have successfully logged out.');
        return redirect('/login'); // Redirect pengguna ke halaman login setelah logout
    }
}
