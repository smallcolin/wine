<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wine;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Get the contents of the cart
      $cartItems = Cart::content();
      // show the contents of the cart
      return view('cart.index')->with('cartItems', $cartItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    }

    // Add Item to Cart
    public function addItem($id)
    {
      // Locate wine by id
      $wine = Wine::find($id);

      // Add wine to cart
      if ($wine->stock > 0) {
        Cart::add($id, $wine->name, 1, $wine->price);
      } else {
        Session::flash('error', 'This wine is unavailable at this time');
        return redirect()->back();
      }
      // Print message
      Session::flash('success', 'Wine added to cart');
      // Return viw to store
      return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      // Find chosen field to update
      Cart::update($id, request()->qty);
      // Return user to cart
      return redirect()->back();
    }

    /**
     * Remove the wine from the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cart::remove($id);

      return redirect()->back();
    }
}
