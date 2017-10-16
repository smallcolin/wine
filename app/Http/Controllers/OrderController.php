<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use Session;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
      $orders = Order::all();

      return view('admin.orders.index')->with('orders', $orders);
    }

    // Show all orders
    public function checkoutIndex()
    {
      $id = 4;
      // Find wine based on id
      $order = Order::findOrFail($id);

      return view('store.checkout.index')->with('order', $order);
    }

    // Create an order
    public function create()
    {
        //
    }

    // Save an order
    public function store(Request $request)
    {
        //
    }

    // Show an indivual order
    public function showOneOrder(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    // Delete an order
    public function delete($id)
    {
      // Search database for id
      $order = Order::findOrFail($id);

      // Delete database entry
      $order->delete();

      // Display a message
      Session::flash('success', 'You have deleted the order!');

      // redirect to all countries page
      return redirect()->route('order.show');
    }
}
