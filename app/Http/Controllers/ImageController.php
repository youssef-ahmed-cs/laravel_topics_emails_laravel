<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{

    public function store(StoreImageRequest $request)
    {
        $request->validated(); // Validate the request using the custom request class

        $file = $request->file('image'); // Get the uploaded file
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename, 'public');
        Image::create(attributes: [
            'path' => $path,
            'filename' => $filename
        ]);
        return redirect()->route('images.index');
    }

    public function create()
    {
        return view('images.create');
    }

    public function index()
    {
        $images = Image::latest()->get(); // Fetch all images ordered by created_at
        return view('images.index', compact('images'));
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id); // Find the image by ID
        Storage::disk('public')->delete($image->path); // Delete the image file from storage
        $image->delete(); // Delete the image record from the database
        return redirect()->route('images.index');
    }
}
