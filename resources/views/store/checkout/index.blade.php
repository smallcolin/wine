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
      </table>
      <tbody>
        <tr>
          <td></td>  <!--Wine Name-->
          <td></td> <!--Wine Price-->
          <td>{{count($order->wine_id)}}</td>
          <td></td>
        </tr>
      </tbody>
    </div>
  </div>
  <hr />
  <div class="row">
    <p>
      Please check your order, chose the form of payment you wish to use today and then confirm you order by pressing the "Purchase" button
    </p>
    <div class="col-sm-6">
      <form action="" method="post">
        {{csrf_field()}}
        <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
        <input type="hidden" name="wine_id" value="">
        <fieldset class="form-group">
          <label for="payment">Payment Method</label>
          <select class="form-control" id="payment">
            <option>Swish</option>
            <option>Klarna</option>
          </select>
        </fieldset>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="confirm"> I agree to pay…
          </label>
        </div>
        <button type="submit" class="btn btn-warning">Purchase</button>
      </form>
    </div>
  </div>
@endsection
