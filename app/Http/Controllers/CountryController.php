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
    $countries = Country::all();

    return view('admin.countries.index')->with('countries', $countries);
  }

  public function create()
  {
    return view('admin.countries.create');
  }

  public function store()
  {
    $this->validate(request(), [
      'name' => 'required|string'
    ]);

    $country = new Country;
    $country->name = request()->name;
    $country->save();

    Session::flash('success', 'Country was successfully created!');

    return redirect('/countries');
  }

  public function edit(Country $country)
  {
    return view('admin.countries.edit')->with('country', $country);
  }

  public function update($id)
  {
    $this->validate(request(), [
      'name' => 'required|string|max:40'
    ]);
    $country = Country::findOrFail($id);
    $country->name = request()->name;
    $country->save();

    Session::flash('success', 'Country was updated');

    return redirect()->route('country.show');
  }

  public function delete($id)
  {
    // Search database for id
    $country = Country::findOrFail($id);

    // SQL search to find any use of id in Wine table
    $winesWithCountry = Wine::where('country_id', $id)->get();

    // Disable delete if any use is found
    if (count($winesWithCountry) > 0) {
      Session::flash('error', 'You can\'t delete a country that is attached to a wine!');
      return redirect()->back();
    }

    //
    $country->delete();

    // Display a message
    Session::flash('success', 'You have deleted the country!');

    // redirect to all countries page
    return redirect()->route('country.show');
  }

}
