<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wine;
use App\Order;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display the payment checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Redirect to checkout page
      return view('checkout.index');
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder()
    {
      // Call static function to create order
      Order::createOrder();

      // Payment type
      $payment = request()->payment;

      // Onscreen message
      Session::flash('success', 'Order has been processed');
      // Show purchase complete page
      return view('checkout.complete')->with('payment', $payment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
