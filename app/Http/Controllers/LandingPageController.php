<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // $categories = KategoriProduk::with('products')->get();
        $categories = DB::table('kategori_produk')
            ->join('produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
            ->select('kategori_produk.id as category_id', 'kategori_produk.nama as category_name', 'produk.*')
            ->get()
            ->groupBy('category_id');
        // dd($categories);
        $products = Produk::all();

        return view('landingpage.index', compact('categories', 'products'));
    }

    public function about()
    {
        return view('landingpage.about');
    }

    public function service()
    {
        return view('landingpage.service');
    }

    public function menu()
    {
        return view('landingpage.menu');
    }

    public function booking()
    {
        return view('landingpage.booking');
    }

    public function team()
    {
        return view('landingpage.team');
    }

    public function testimonial()
    {
        return view('landingpage.testimonial');
    }

    public function contact()
    {
        return view('landingpage.contact');
    }
}
