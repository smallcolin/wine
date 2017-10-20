<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
  public function wines()
  {
    return $this->belongsToMany(Wine::class);
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class)->withDefault();
  }

  protected $fillable = ['customer_id', 'order_id', 'total'];

  // Create a function to create an order
  public static function createOrder()
  {
    // Get the customer
    $customer = Auth::guard('customer')->user();

    // Create the order & add the total
    $order = $customer->orders()->create([
      'total' => Cart::total(),
    ]);

    // Get all the wines and add their details to the order
    $cartItems = Cart::content();

    foreach ($cartItems as $cartItem) {
      $order->wines()->attach($cartItem->id, [
        'qty'=> $cartItem->qty,
        'total'=> $cartItem->qty * $cartItem->price,
      ]);
      // Update stock levels when purchase
      $wine = Wine::find($cartItem->id);
      $wine->stock -= $cartItem->qty;
      $wine->save();
    }
  }

}
