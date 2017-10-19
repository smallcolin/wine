<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Comment;
use Session;

class CustomerController extends Controller
{
    // Show all customers
    public function index()
    {
      // Get all customers from table
      $customers = Customer::paginate(10);
      // Direct to show all customer page
      return view('admin.customers.index')->with('customers', $customers);
    }

    // Edit a customer
    public function edit(Customer $customer)
    {
      return view('admin.customers.edit')->with('customer', $customer);
    }

    // Update a customer
    public function update($id)
    {
      // Validate any data
      $this->validate(request(), [
        'name' => 'required|string|max:40'
      ]);
      // Find specific entry
      $customer = Customer::findOrFail($id);
      // Prepare data then save to table
      $customer->name = request()->name;
      $customer->save();

      // Display a message
      Session::flash('success', 'Customer name was updated');

      // Redirect back to show all customers
      return redirect()->route('customer.show');
    }

    // Delete a customer
    public function delete($id)
    {
      // Search database for id
      $customer = Customer::findOrFail($id);

      // SQL query to find any comments written by user
      $customersWithComments = Comment::where('customer_id', $id)->get();

      // Disable delete if user has made a comment
      if (count($customersWithComments) > 0) {
        Session::flash('error', 'Not possible to delete a user that has made comments.  Please delete their comments first');
        return redirect()->back();
      }
      // Delete database entry
      $customer->delete();

      // Display a message
      Session::flash('success', 'Customer has been taken care of');

      // redirect to all customers page
      return redirect()->route('customer.show');
    }
}
