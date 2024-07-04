<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Sosmed;
use App\Models\Testimoni;
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
        $testies = Testimoni::all();
        $blogs = Blog::all(); // Fetch all blog entries

        return view('landingpage.index', compact('categories', 'products', 'testies', 'blogs'));
    }


    public function about()
    {
        $about = About::first();
        // dd($about);
        return view('landingpage.about', compact('about'));
    }

    public function service()
    {
        return view('landingpage.service');
    }

    public function menu()
    {
        $categories = DB::table('kategori_produk')
            ->join('produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
            ->select('kategori_produk.id as category_id', 'kategori_produk.nama as category_name', 'produk.*')
            ->get()
            ->groupBy('category_id');
        // dd($categories);
        $products = Produk::all();
        $testies = Testimoni::all();

        return view('landingpage.menu', compact('categories', 'products', 'testies'));
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
        $sosmed = Sosmed::first(); // Assuming you only have one record in the sosmed table
        return view('landingpage.contact', compact('sosmed'));
    }
}
