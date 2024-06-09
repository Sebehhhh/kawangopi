<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        $query = Blog::query();

        // Filtering by title if provided
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $blogPosts = $query->paginate(10);

        return view('dashboard.blog.index', compact('blogPosts'));
    }

    public function store(Request $request)
    {
        // Validating the data received from the form
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        // Initializing $imagePath
        $imagePath = null;

        // Upload image if provided
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('blog_images', 'public');
        }

        // Create a new BlogPost object with data received from the form
        $blogPost = new Blog([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
            'gambar' => $imagePath,
            'user_id' => Auth::id(), // Insert the authenticated user's ID
        ]);

        $blogPost->save();

        $this->setFlashAlert('success', 'Success!', 'You have successfully added a new blog post.');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        // Validating the data received from the form
        $validatedData = $request->validate([
            'id' => 'required|exists:blog,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        // Finding the blog post to be updated
        $blogPost = Blog::findOrFail($validatedData['id']);

        // If an image file is uploaded, delete the old image and save the new one
        if ($request->hasFile('gambar')) {
            // Delete old gambar if exists
            if ($blogPost->gambar) {
                Storage::disk('public')->delete($blogPost->gambar);
            }

            $imagePath = $request->file('image')->store('blog_images', 'public');
            // Change image path to be saved in the database
            $validatedData['image'] = str_replace('public/', '', $imagePath);
        }

        // Update blog post data
        $blogPost->update($validatedData);

        // Set flash message for notification
        $this->setFlashAlert('success', 'Success!', 'You have successfully updated the blog post.');

        // Redirect back to the index page or previous page
        return redirect()->back();
    }

    public function destroy($id)
    {
        $blogPost = Blog::findOrFail($id);

        // Delete user photo if exists
        if ($blogPost->image) {
            Storage::disk('public')->delete($blogPost->image);
        }

        $blogPost->delete();

        // Set flash message for notification
        $this->setFlashAlert('success', 'Success!', 'You have successfully deleted the blog post.');

        return redirect()->back();
    }
}
