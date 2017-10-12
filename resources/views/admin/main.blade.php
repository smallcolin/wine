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
          <a href="{{route('country.show')}}">Countries</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('country.create')}}">Create a Country</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('wine.show')}}">Wines</a>
        </li>
        <li class="list-group-item">
          <a href="">Customers</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('comment.show')}}">Comments</a>
        </li>
        <li class="list-group-item">
          <a href="">Orders</a>
        </li>
        <li class="list-group-item">
          <a href="">Export</a>
        </li>
      </ul>
    </div>
  </div>

@endsection
