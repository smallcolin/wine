<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Cart;
use App\Order;
use App\Customer;
use App\Wine;
use Session;

class OrderController extends Controller
{
    // Show all orders (admin)
    public function index()
    {
      $orders = Order::paginate(5);

      return view('admin.orders.index')->with('orders', $orders);
    }

    // Show all orders (customer)
    public function showMyOrders()
    {
      // Collect customer from tables
      $id = Auth::guard('customer')->user()->id;
      $customer = Customer::findOrFail($id);

      // Find orders made by that customer
      $orders = $customer->orders()->with('customer')->latest()->paginate(5);

      // Show results
      return view('customers.orders.index')->with('orders', $orders);
    }

    // Delete an order
    public function destroy($id)
    {
      // Search database for id
      $order = Order::findOrFail($id);

      // Delete database entry
      $order->delete();

      // Delete pivot table entries
      $order->wines()->detach();

      // Display a message
      Session::flash('success', 'You have deleted the order!');

      // redirect to all countries page
      return redirect('/admin/orders');
    }
}
