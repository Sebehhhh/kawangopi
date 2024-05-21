<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
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
        $transaksis = Transaksi::latest()->paginate(10);
        return view('dashboard.transaksi.index', compact('transaksis', 'produks'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil produk berdasarkan ID
        $product = Produk::findOrFail($validatedData['produk_id']);

        // Periksa apakah stok produk cukup
        if ($product->stok < $validatedData['quantity']) {
            return redirect()->back()->with('error', 'Failed to add transaction. Insufficient stock.');
        }

        // Kurangi stok produk
        $product->stok -= $validatedData['quantity'];
        $product->save();

        // Tambahkan transaksi baru
        Transaksi::create($validatedData);

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new transaction.');
        return redirect()->back();
    }


    // public function update(Request $request)
    // {
    //     // Validasi data yang diterima dari formulir
    //     $validatedData = $request->validate([
    //         'id' => 'required|exists:transaksi,id',
    //         'produk_id' => 'required|exists:produk,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Cari transaksi yang akan diperbarui
    //     $transaksi = Transaksi::find($validatedData['id']);

    //     // Update data transaksi
    //     $transaksi->update($validatedData);

    //     // Set flash message untuk notifikasi
    //     $this->setFlashAlert('success', 'Success!', 'You have successfully updated the transaction.');

    //     // Redirect ke halaman index atau halaman sebelumnya
    //     return redirect()->back();
    // }

    // public function destroy($id)
    // {
    //     $transaksi = Transaksi::findOrFail($id);
    //     $transaksi->delete();

    //     // Set flash message untuk notifikasi
    //     $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the transaction.');

    //     return redirect()->back();
    // }
}
