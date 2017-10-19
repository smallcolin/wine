@extends('customers/main')

@section('content')
  <h3>Cart</h3>
  <div class="row">
    <div class="col-sm-12">
      <p>
        You have added the following items to the cart:
      </p>
      <table class="table">
        <thead>
          <th>Wine</th>
          <th>Price</th>
          <th>Amount</th>
          <th>Total</th>
        </thead>
        <tbody>
          @foreach ($cartItems as $cartItem)
            <tr>
              <td>{{$cartItem->name}}</td>
              <td>$ {{round($cartItem->price)}}</td>
              <td>
                <form action="{{route('cart.update', ['id' => $cartItem->Rowid])}}" method="put">
                  <input style="width:3em;" type="number" name="qty" value="{{$cartItem->qty}}">
                  <button class="btn btn-sm btn-default">update</button>
                </form>
              </td>
              <td>{{round($cartItem->price)*($cartItem->qty)}}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Items: {{Cart::count()}}</td>
            <td>
              Grand Total:<br />
              $ {{round(Cart::total())}}
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <hr />
  <a style="float:right;"class="btn btn-success" href="{{route('checkout.index')}}">Checkout</a>

@endsection
