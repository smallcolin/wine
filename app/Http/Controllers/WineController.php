<?php

namespace App\Http\Controllers;

use App\Wine;
use App\Country;
use App\Comment;
use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use Session;

class WineController extends Controller
{
    public function index()
    {
      // Get all data from table
      $wines = Wine::paginate(5);
      // Show the list
      return view('admin.wines.index')->with('wines', $wines);
    }

    // Show all wines (customer shop)
    public function showAll()
    {
      // Get all data from table
      $wines = Wine::all();
      // Get all data for a country filter list
      $countries = Country::all();

      // Show the list and send some data with…
      return view('store.wines.showAll')->with('wines', $wines)->with('countries', $countries);
    }

    // Show an individual wine
    public function showOne($id)
    {
      // Find wine based on id
      $wine = Wine::findOrFail($id);

      // Get all comments associated with a particular wine
      $comments = $wine->comments()->with('customer')->latest()->paginate(5);

      // Get the average rating for each wine
      $rating = $wine->comments()->with('customer')->avg('rating');

      // Show the data
      return view('store.wines.showOneWine')->with('wine', $wine)->with('comments', $comments)->with('rating', $rating);
    }

    // Filter wines
    public function filterWine(Country $country)
    {
      // Get all data from countries table
      $countries = Country::all();
      // Redirect browser
      return view('store.wines.showAllFilter')->with('countries', $countries)->with('country', $country);
    }


    // Create new wine
    public function create()
    {
      // Show a form
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
        'customer_id' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'image_url' => 'required|mimes:jpeg,jpg,png',
      ]);

      // Prepare image for upload
      $image = request()->image_url;
      $new_name = time().$image->getClientOriginalName();
      $image->move('uploads/', $new_name);

      // Send data to database
      $wine = Wine::create([
        'country_id' => request()->country_id,
        'customer_id' => request()->customer_id,
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
      // Get all the data from table
      $countries = Country::all();
      // Display it onscreen
      return view('admin.wines.edit')->with('wine', $wine)->with('countries', $countries);
    }

    public function update($id)
    {
      // Validate entered data
      $this->validate(request(), [
        'name' => 'required|max:30',
        'description' => 'required',
        'country_id' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'approved' => 'required',
      ]);

      // Create image details
      if (request()->image_url) {
        $image = request()->image_url;
        $new_name = time().$image->getClientOriginalName();
        $image->move('uploads/', $new_name);
      }

      // Find id from database
      $wine = Wine::findOrFail($id);
      // Enter in new values
      $wine->name = request()->name;
      $wine->description = request()->description;
      $wine->country_id = request()->country_id;
      $wine->price = request()->price;
      $wine->stock = request()->stock;
      $wine->approved = request()->approved;
      if (request()->image_url) {
        $wine->image_url = 'uploads/' . $new_name;
      }
      // Save to database
      $wine->save();

      // Show message
      Session::flash('success', 'Wine details were updated!');

      // redirect user to all wines page
      return redirect('/admin/wines');
    }

    public function destroy($id)
    {
      // Find a wine via its id
      $wine = Wine::findOrFail($id);

      // Check if wine exists on an order
      if ($wine->orders()->count()) {
        // Display a message
        Session::flash('error', 'You can\'t delete a wine that is attached to an order!');
        // Redirect to same page
        return redirect()->back();
      }

      // Delete from table
      $wine->delete();

      // Display a message
      Session::flash('success', 'Wine deleted successfully');

      // Redirect user to wines page
      return redirect('/admin/wines');
    }

}
