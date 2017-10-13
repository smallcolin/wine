<?php

namespace App\Http\Controllers;

use App\Wine;
use App\Country;
use App\Comment;
use Illuminate\Http\Request;
use Session;

class WineController extends Controller
{
    // Show all wines
    public function index()
    {
      $wines = Wine::all();

      return view('admin.wines.index')->with('wines', $wines);
    }

    public function showOne($id)
    {
      $wine = Wine::findOrFail($id);
      // $comments = Comment::where('wine_id', $id)->get();
      // Get all comments associated with a particular wine
      $comments = $wine->comments()->with('customer')->get();
      $rating = "5 stars";

      return view('store.wines.showOneWine')->with('wine', $wine)->with('comments', $comments)->with('rating', $rating);
    }

    // Create new wine
    public function create()
    {
      return view('customers.wines.createWine')->with('countries', Country::all());
    }

    // Save newly create wine to database
    public function store()
    {
      // Validate all fields
      $this->validate(request(), [
        'name' => 'required|max:20',
        'description' => 'required|max:191',
        'country_id' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'image_url' => 'required',
      ]);

      // Prepare image for upload
      $image = request()->image_url;
      $new_name = time().$image->getClientOriginalName();
      $image->move('uploads/', $new_name);

      // Send data to database
      $wine = Wine::create([
        'country_id' => request()->country_id,
        'name' => request()->name,
        'description' => request()->description,
        'price' => request()->price,
        'stock' => request()->stock,
        'image_url' => 'uploads/' . $new_name
      ]);

      // Onscreen message
      Session::flash('success', 'New wine was added to the store');

      // Route back to the same page
      return redirect()->back();
    }

    public function edit(Wine $wine)
    {
      $countries = Country::all();

      return view('admin.wines.edit')->with('wine', $wine)->with('countries', $countries);
    }

    public function update($id)
    {
      $this->validate(request(), [
        'name' => 'required|max:30',
        'description' => 'required',
        'country_id' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'image_url' => 'required'
      ]);
      // Create image details
      $image = request()->image_url;
      $new_name = time().$image->getClientOriginalName();
      $image->move('uploads/', $new_name);

      // Find id from database
      $wine = Wine::findOrFail($id);
      // Enter in new values
      $wine->name = request()->name;
      $wine->description = request()->description;
      $wine->country_id = request()->country_id;
      $wine->price = request()->price;
      $wine->stock = request()->stock;
      $wine->image_url = request()->image_url;
      // Save to database
      $wine->save();

      // Show message
      Session::flash('success', 'Wine details were updated!');

      // redirect user to all wines page
      return redirect()->route('wine.show');
    }

    public function delete($id)
    {
      $wine = Wine::findOrFail($id);
      $wine->delete();

      Session::flash('success', 'Wine deleted successfully');

      return redirect()->route('wine.show');
    }

}
