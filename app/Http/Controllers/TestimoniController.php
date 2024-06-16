<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'rate' => 'required|integer|between:1,5',
        ]);
        // dd($request);

        Testimoni::create($request->all());

        return redirect()->route('landingpage')->with('success', 'Thank you for your feedback!');
    }
}
