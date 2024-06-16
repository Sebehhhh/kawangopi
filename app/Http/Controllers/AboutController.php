<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
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
        $about = About::first(); // Assuming there is only one row
        $socialMedia = Sosmed::first(); // Assuming there is only one row
        return view('dashboard.halaman.index', compact('about', 'socialMedia'));
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
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
        ]);

        $about = About::first(); // Assuming you have a single row for About Us
        $socialMedia = Sosmed::first(); // Assuming you have a single row for Social Media

        if ($about) {
            $about->update($request->only(['nama', 'visi', 'misi', 'sejarah', 'alamat', 'telp']));
        } else {
            About::create($request->only(['nama', 'visi', 'misi', 'sejarah', 'alamat', 'telp']));
        }

        if ($socialMedia) {
            $socialMedia->update($request->only(['facebook', 'instagram', 'tiktok', 'whatsapp']));
        } else {
            Sosmed::create($request->only(['facebook', 'instagram', 'tiktok', 'whatsapp']));
        }

        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the about.');

        return redirect()->route('dashboard.about')->with('success', 'About Us updated successfully.');
    }
}
