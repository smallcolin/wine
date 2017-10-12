@extends('master')

@section('content')
  <h1>Admin Area</h1>
  <div class="row">
    <div class="col-md-9">
      @yield('admin-content')
    </div>
    <div class="col-md-3">
      <ul>
        <li class="list-group-item">
          <a href="{{route('country.show')}}">All Countries</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('country.create')}}">Create a Country</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('wine.show')}}">Wines</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('wine.create')}}">Add a Wine</a>
        </li>
      </ul>
    </div>
  </div>

@endsection
