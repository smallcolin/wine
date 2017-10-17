<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Session;

class ImagesController extends Controller
{
  // Show all images
  public function index()
  {
    $images = Image::all();

    return view('gallery.main')->with('images', $images);
  }

  public function adminShowImages()
  {
    $images = Image::all();

    return view('admin.gallery.index')->with('images', $images);
  }

  // Upload & store images
  public function store(Request $request)
  {
    foreach ($request->images as $file) {
      Image::create([
          'customer_id' => $request->user()->id,
          'filename' => asset($file->store('uploads/' . $request->user()->email)),
          'name' => $file->getClientOriginalName(),
          'format' => $file->extension(),
      ]);
    }

    // Display a message
    Session::flash('success', 'Files have been uploaded');
    // Redirect
    return redirect()->back();
  }

  // Edit an image
  public function edit(Image $image)
  {
    // Show the form to edit a country
    return view('admin.gallery.edit')->with('image', $image);
  }

  public function update($id)
  {
    // Validate form data
    $this->validate(request(), [
      'name' => 'required|string|max:40',
      'description' => 'required|string|max:191'
    ]);

    // Prepare data and save to table
    $image = Image::findOrFail($id);
    $image->name = request()->name;
    $image->description = request()->description;
    $image->save();

    // Display a message
    Session::flash('success', 'Gallery image info was updated');

    // Redirect admin back to show all countries
    return redirect()->route('adminImages.show');
  }

  public function delete($id)
  {
    // Search database for id
    $image = Image::findOrFail($id);

    // Delete database entry
    $image->delete();

    // Display a message
    Session::flash('success', 'You have deleted the image!');

    // redirect to all countries page
    return redirect()->route('adminImages.show');
  }
}
