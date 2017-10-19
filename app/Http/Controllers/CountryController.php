<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Wine;
use Session;

class CountryController extends Controller
{
  public function index()
  {
    // Get all countries from table
    $countries = Country::paginate(10);
    // Direct to show all countries page
    return view('admin.countries.index')->with('countries', $countries);
  }

  public function create()
  {
    // Show form to create a country
    return view('admin.countries.create');
  }

  public function store()
  {
    // Validate form data
    $this->validate(request(), [
      'name' => 'required|string'
    ]);

    // Prepare data and save to table
    $country = new Country;
    $country->name = request()->name;
    $country->save();

    // Display a message
    Session::flash('success', 'Country was successfully created!');

    // redirect to show all countries
    return redirect('/countries');
  }

  public function edit(Country $country)
  {
    // Show the form to edit a country
    return view('admin.countries.edit')->with('country', $country);
  }

  public function update($id)
  {
    // Validate form data
    $this->validate(request(), [
      'name' => 'required|string|max:40'
    ]);

    // Prepare data and save to table
    $country = Country::findOrFail($id);
    $country->name = request()->name;
    $country->save();

    // Display a message
    Session::flash('success', 'Country was updated');

    // Redirect admin back to show all countries
    return redirect()->route('country.show');
  }

  public function delete($id)
  {
    // Search database for id
    $country = Country::findOrFail($id);

    // SQL search to find any use of id in Wine table
    $winesWithCountry = Wine::where('country_id', $id)->get();

    // Disable delete if country is associated with a wine
    if (count($winesWithCountry) > 0) {
      Session::flash('error', 'You can\'t delete a country that is attached to a wine!');
      return redirect()->back();
    }

    // Delete database entry
    $country->delete();

    // Display a message
    Session::flash('success', 'You have deleted the country!');

    // redirect to all countries page
    return redirect()->route('country.show');
  }

}
