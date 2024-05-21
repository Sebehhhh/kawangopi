<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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

    public function index()
    {
        $users = User::all(); // Mendapatkan semua data pengguna dari database
        return view('dashboard.user.index', compact('users')); // Mengirim data pengguna ke tampilan user.index menggunakan compact
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        // Inisialisasi $fotoPath
        $fotoPath = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

        // Buat objek baru User dengan data yang diterima dari form
        $userData = [
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'alamat' => $validatedData['alamat'],
            'telp' => $validatedData['telp'],
        ];

        // Tambahkan foto ke data pengguna jika ada
        if ($fotoPath !== null) {
            $userData['foto'] = $fotoPath;
        }

        User::create($userData);

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new user.');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // Jika Anda ingin memvalidasi gambar
        ]);

        // Cari pengguna yang akan diperbarui
        $user = User::find($validatedData['id']);

        // Jika ada file foto yang diunggah, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            $fotoPath = $request->file('foto')->store('fotos', 'public');
            // Ubah path foto untuk disimpan di database
            $validatedData['foto'] = str_replace('public/', '', $fotoPath);
        }

        // Update data pengguna
        $user->update($validatedData);

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the user.');

        // Redirect ke halaman index
        return redirect()->back();
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto pengguna jika ada
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the user.');

        return redirect()->back();
    }
}
