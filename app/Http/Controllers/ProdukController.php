<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
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
        $produks = Produk::all();
        $categories = KategoriProduk::all();
        return view('dashboard.produk.index', compact('produks', 'categories')); // Mengirim data pengguna ke tampilan user.index menggunakan compact
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'kategori_produk_id' => 'required|exists:kategori_produk,id',
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'stok' => 'required|integer|min:0',
        ]);

        // Inisialisasi $gambarPath
        $gambarPath = null;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('products', 'public');
        }

        // Buat objek baru Produk dengan data yang diterima dari form
        $productData = [
            'kategori_produk_id' => $validatedData['kategori_produk_id'],
            'nama' => $validatedData['nama'],
            'harga' => $validatedData['harga'],
            'stok' => $validatedData['stok'],
        ];

        // Tambahkan gambar ke data produk jika ada
        if ($gambarPath !== null) {
            $productData['gambar'] = $gambarPath;
        }

        Produk::create($productData);

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new product.');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'id' => 'required|exists:produk,id',
            'kategori_produk_id' => 'required|exists:kategori_produk,id',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // Jika Anda ingin memvalidasi gambar
        ]);

        // Cari produk yang akan diperbarui
        $product = Produk::find($validatedData['id']);

        // Jika ada file gambar yang diunggah, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            $gambarPath = $request->file('gambar')->store('products', 'public');
            // Ubah path gambar untuk disimpan di database
            $validatedData['gambar'] = str_replace('public/', '', $gambarPath);
        }

        // Update data produk
        $product->update($validatedData);

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the product.');

        // Redirect ke halaman index atau halaman sebelumnya
        return redirect()->back();
    }


    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus foto pengguna jika ada
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        // Set flash message untuk notifikasi
        $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the user.');

        return redirect()->back();
    }
}
