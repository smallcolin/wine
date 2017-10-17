@extends('customers/main')

@section('content')
  <h3>Checkout</h3>
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
          @foreach ($order->wines as $wine)
            <tr>
              <td>{{$wine->name}}</td>
              <td>{{round($wine->price)}}</td>
              <td>{{count($wine->id)}}</td>
              <td>{{round($wine->price)}}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{round($total)}}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <hr />
  <div class="row">
    <p>
      Please check your order, chose the form of payment you wish to use today and then confirm you order by pressing the "Purchase" button
    </p>
    <div class="col-sm-6">
      <form action="{{route('order.purchase')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
        <input type="hidden" name="order_id" value="1">
        <input type="hidden" name="total" value="{{$total}}">
        <fieldset class="form-group">
          <label for="payment">Payment Method</label>
          <select class="form-control" name="payment">
            <option value="Swish">Swish</option>
            <option value="Klarna">Klarna</option>
          </select>
        </fieldset>
        <button type="submit" class="btn btn-warning">Purchase</button>
      </form>
    </div>
  </div>
@endsection
