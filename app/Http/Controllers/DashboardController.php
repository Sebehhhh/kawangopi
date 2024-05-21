<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Produk::all();
        $kategoris = KategoriProduk::all();

        // Menghitung jumlah produk terjual dari tabel transaksi
        $totalProdukTerjual = Transaksi::sum('quantity');

        // Menghitung total terjual untuk setiap produk
        $totalTerjualPerProduk = Transaksi::select('produk_id', DB::raw('SUM(quantity) as total_terjual'))
            ->groupBy('produk_id')
            ->get();

        // Mengurutkan produk berdasarkan total terjual
        $sortedProducts = $totalTerjualPerProduk->sortByDesc('total_terjual');

        // Mengambil 3 produk terlaris
        $topThreeProducts = $sortedProducts->take(3);

        // Mengambil 3 produk terlaris per kategori
        $topThreePerCategory = [];
        foreach ($kategoris as $kategori) {
            $topThreePerCategory[$kategori->id] = Transaksi::select('produk_id', DB::raw('SUM(quantity) as total_terjual'))
                ->join('produk', 'produk.id', '=', 'transaksi.produk_id')
                ->where('produk.kategori_produk_id', $kategori->id)
                ->groupBy('produk_id')
                ->orderBy('total_terjual', 'desc')
                ->take(3)
                ->get();
        }

        $userCount = count($users);
        $produkCount = count($products);
        $kategoriCount = count($kategoris);

        return view('dashboard.index', compact('userCount', 'kategoris', 'produkCount', 'kategoriCount', 'totalProdukTerjual', 'topThreeProducts', 'topThreePerCategory'));
    }



    public function getTransactionChartData(Request $request)
    {
        $range = $request->get('range', 'all');
        $now = Carbon::now();
        $data = [];

        switch ($range) {
            case 'weekly':
                $startOfWeek = $now->startOfWeek();
                $transactions = Transaksi::whereBetween('created_at', [$startOfWeek, $now])
                    ->selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->get();
                break;

            case 'monthly':
                $startOfMonth = $now->startOfMonth();
                $transactions = Transaksi::whereBetween('created_at', [$startOfMonth, $now])
                    ->selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->get();
                break;

            case 'yearly':
                $startOfYear = $now->startOfYear();
                $transactions = Transaksi::whereBetween('created_at', [$startOfYear, $now])
                    ->selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->get();
                break;

            case '5years':
                $startOf5Years = $now->subYears(5);
                $transactions = Transaksi::whereBetween('created_at', [$startOf5Years, $now])
                    ->selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->get();
                break;

            case 'all':
            default:
                $transactions = Transaksi::selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->get();
                break;
        }

        foreach ($transactions as $transaction) {
            $data[] = [
                'x' => $transaction->date,
                'y' => $transaction->total,
            ];
        }

        return response()->json($data);
    }
}
