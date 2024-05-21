<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export()
    {
        return Excel::download(new TransaksiExport, 'transaksis.xlsx');
    }

    public function index(Request $request)
    {
        $produks = Produk::all();

        // Ambil data transaksi yang sudah diurutkan dari yang terbaru
        $transaksis = Transaksi::latest();

        // Inisialisasi variabel untuk menyimpan nilai tanggal filter
        $start_date = null;
        $end_date = null;

        // Proses filter berdasarkan tanggal jika dimasukkan dalam request
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $start_date_parsed = Carbon::parse($start_date);
            $end_date_parsed = Carbon::parse($end_date);

            // Pastikan tanggal awal kurang dari tanggal akhir
            if ($start_date_parsed->lessThanOrEqualTo($end_date_parsed)) {
                $transaksis->whereBetween('created_at', [$start_date_parsed->startOfDay(), $end_date_parsed->endOfDay()]);
            } else {
                $this->setFlashAlert('error', 'Failed!', 'Tanggal Tidak Sesuai!');
                return redirect()->back();
            }
        }

        // Paginasi hasil transaksi
        $transaksis = $transaksis->paginate(10);

        // Kirim kembali nilai tanggal filter ke view
        return view('dashboard.transaksi.index', compact('transaksis', 'produks', 'start_date', 'end_date'));
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
