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
      $id = 1;
      // Find wines based on order id
      $order = Order::findOrFail($id);

      // Get total cost
      $total = $order->wines()->sum('price');

      // Show page
      return view('store.checkout.index')->with('order', $order)->with('total', $total);
    }

    // Create an order
    public function create()
    {

    }

    // Save an order
    public function store($id)
    {
      $items = Cart::add($id);
      dd($items);
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
