@extends('master')

@section('content')
  <h1>Admin Area</h1>
  <div class="row">
    <div class="col-md-9">
      @yield('admin-content')
    </div>
    <div class="col-md-3">
      <ul style="position:fixed;">
        <li class="list-group-item">
          <a href="{{route('countries.index')}}">Countries</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('countries.create')}}">Create a Country</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('wines.index')}}">Wines</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('customers.index')}}">Customers</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('comments.index')}}">Comments</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('orders.index')}}">Orders</a>
        </li>
        <li class="list-group-item">
          <a href="/export">Export</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('adminImages.show')}}">Gallery</a>
        </li>
      </ul>
    </div>
  </div>

@endsection
