@extends('customers/main')

@section('customer-content')
  <h3>My Orders</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Wines</th>
        <th>Total Cost</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td>
            <ul style="list-style:none;padding:0;">
              @foreach ($order->wines as $wine)
                <li>
                  <a href="{{route('wine.showOne', ['id' => $order->wine_id])}}">
                    {{$wine->name}}
                  </a>
                </li>
              @endforeach
            </ul>
          </td>
          <td>{{$order->wines()->sum('price')}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
