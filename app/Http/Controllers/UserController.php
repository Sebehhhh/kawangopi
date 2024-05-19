<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mendapatkan semua data pengguna dari database
        return view('dashboard.user.index', compact('users')); // Mengirim data pengguna ke tampilan user.index menggunakan compact
    }
}
