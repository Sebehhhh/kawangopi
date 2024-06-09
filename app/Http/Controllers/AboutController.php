<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        // dd($about);
        return view('dashboard.halaman.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sejarah' => 'required|string',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
        ]);

        $about = About::first(); // Assuming you have a single row for About Us
        if ($about) {
            $about->update($request->all());
        } else {
            About::create($request->all());
        }

        return redirect()->route('dashboard.about')->with('success', 'About Us updated successfully.');
    }
}
