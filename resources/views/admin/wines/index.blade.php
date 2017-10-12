@extends('admin/main')

@section('admin-content')
  <h2>All the Wines</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Country</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($wines as $wine)
        <tr>
          <td>
            <img class="img-rounded" style="width: 100px; height: 70px;" src="{{URL($wine->image_url)}}">
          </td>
          <td>{{$wine->name}}</td>
          <td>{{$wine->description}}</td>
          <td>{{$wine->country->name}}</td>
          <td>{{$wine->price}}</td>
          <td>{{$wine->stock}}</td>
          <td>
            <a class="btn-sm btn-info" href="">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
