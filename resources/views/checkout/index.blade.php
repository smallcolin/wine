@extends('customers/main')

@section('content')
  <h3>Checkout</h3>
  <hr />
  <div class="row">
    <p>
      Chose the form of payment you wish to use today and then confirm you order by pressing the "Purchase" button.
    </p>
    <div class="col-sm-6">
      <form action="{{route('checkout.createOrder')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
        <input type="hidden" name="total" value="{{Cart::total()}}">
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
