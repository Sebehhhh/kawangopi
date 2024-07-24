<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    private function setFlashAlert($type, $title, $message)
    {
        // Set flash alert using session
        Session::flash('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function index(Request $request)
    {
        $query = Galeri::query();
    
        $galeriItems = $query->paginate(10);
        $galeriCount = $query->count(); // Count the total number of galeri items
    
        return view('dashboard.galeri.index', compact('galeriItems', 'galeriCount'));
    }
    

    public function store(Request $request)
    {
        // Validating the data received from the form
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        // Initializing $imagePath
        $imagePath = null;

        // Upload image if provided
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('galeri_images', 'public');
        }

        // Create a new Galeri object with data received from the form
        $galeriItem = new Galeri([
            'gambar' => $imagePath,
            'user_id' => Auth::id(), // Insert the authenticated user's ID
        ]);

        $galeriItem->save();

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new galeri item.');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        // Validating the data received from the form
        $validatedData = $request->validate([
            'id' => 'required|exists:galeri,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        // Finding the galeri item to be updated
        $galeriItem = Galeri::findOrFail($validatedData['id']);

        // If an image file is uploaded, delete the old image and save the new one
        if ($request->hasFile('gambar')) {
            // Delete old gambar if exists
            if ($galeriItem->gambar) {
                Storage::disk('public')->delete($galeriItem->gambar);
            }

            $imagePath = $request->file('gambar')->store('galeri_images', 'public');
            // Change image path to be saved in the database
            $validatedData['gambar'] = str_replace('public/', '', $imagePath);
        }

        // Update galeri item data
        $galeriItem->update($validatedData);

        // Set flash message for notification
        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the galeri item.');

        // Redirect back to the index page or previous page
        return redirect()->back();
    }

    public function destroy($id)
    {
        $galeriItem = Galeri::findOrFail($id);

        // Delete galeri image if exists
        if ($galeriItem->gambar) {
            Storage::disk('public')->delete($galeriItem->gambar);
        }

        $galeriItem->delete();

        // Set flash message for notification
        $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the galeri item.');

        return redirect()->back();
    }
}
