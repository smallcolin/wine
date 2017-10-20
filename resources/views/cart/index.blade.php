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
          <th></th>
        </thead>
        <tbody>
          @foreach ($cartItems as $cartItem)
            <tr>
              <td>{{$cartItem->name}}</td>
              <td>$ {{round($cartItem->price)}}</td>
              <td>
                <form action="{{route('cart.update', $cartItem->rowId)}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <input style="width:3em;" type="number" name="qty" value="{{$cartItem->qty}}">
                  <input class="btn btn-sm btn-default" type="submit" value="Update">
                </form>
              </td>
              <td>{{round($cartItem->price)*($cartItem->qty)}}</td>
              <td>
                <form action="{{route('cart.destroy', $cartItem->rowId)}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Items: {{Cart::count()}}</td>
            <td>
              Tax: $ {{Cart::tax()}}<br />
              Grand Total:<br />
              $ {{Cart::total()}}
            </td>
´          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <hr />
  @if (Cart::count() > 0)
    <a style="float:right;"class="btn btn-success" href="{{route('checkout.index')}}">Go to Checkout</a>
  @else
    <a style="float:right;"class="btn btn-info" href="{{route('store.wines.showAll')}}">Add to items to the cart</a>
  @endif

@endsection
