<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriProdukController extends Controller
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
        $data = KategoriProduk::all();
        return view('dashboard.kategoriProduk.index', compact('data'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Buat objek baru KategoriProduk dengan data yang diterima dari form
        KategoriProduk::create($validatedData);

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new category product.');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'id' => 'required|exists:kategori_produk,id',
            'nama' => 'required|string|max:255',
        ]);

        // Cari dan update data kategori produk
        $kategori = KategoriProduk::find($validatedData['id']);
        $kategori->update($validatedData);

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the product category.');

        // Redirect ke halaman index
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        $kategori->delete();

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the product category.');

        return redirect()->back();
    }
}
