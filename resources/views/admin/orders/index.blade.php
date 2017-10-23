@extends('admin/main')

@section('admin-content')
  <h3>All Orders</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Order Number</th>
        <th>Wine(s)</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td>{{$order->customer->name}}</td>
        <td>{{$order->customer->email}}</td>
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
        <td>
          <form action="{{route('orders.destroy', ['id' => $order->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{$orders->links()}}
@endsection
