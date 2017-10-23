<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ImagesController extends Controller
{
  // Show all images
  public function index()
  {
    $images = Image::paginate(10);

    return view('admin.gallery.index')->with('images', $images);
  }

  // Show all images (admin)
  public function customerShowImages()
  {
    $images = Image::all();

    return view('gallery.main')->with('images', $images);
  }

  // Upload & store images
  public function store(Request $request)
  {
    $user_id = Auth::guard('customer')->user()->id;
    $user_email = Auth::guard('customer')->user()->email;
    foreach ($request->images as $file) {
      Image::create([
          'customer_id' => $user_id,
          'image_url' => asset($file->store('uploads/' . $user_email)),
          'filename' => asset($file->store('uploads/' . $user_email)),
          'name' => $file->getClientOriginalName(),
          'format' => $file->extension(),
          'description' => 'default'
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
    return redirect('/admin/images');
  }

  public function destroy($id)
  {
    // Search database for id
    $image = Image::findOrFail($id);

    // Delete database entry
    $image->delete();

    // Display a message
    Session::flash('success', 'You have deleted the image!');

    // redirect to all countries page
    return redirect('/admin/images');
  }
}
