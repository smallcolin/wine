@extends('master')

@section('content')
  <h1>Customer </h1>
  <div class="row">
    <div class="col-md-9">
      @yield('customer-content')
    </div>
    <div class="col-md-3">
      <ul style="position:fixed;">
        <li class="list-group-item">
          <a href="">My Orders</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('customerComment.show')}}">My Comments</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('wine.create')}}">Add a wine</a>
        </li>
      </ul>
    </div>
  </div>

@endsection
