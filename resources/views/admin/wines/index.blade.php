@extends('admin/main')

@section('admin-content')
  <h3>All the Wines</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Country</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Customer</th>
        <th>Approved</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($wines as $wine)
        <tr>
          <td>
            <img class="img-rounded" style="width: 50px; height: 35px;" src="{{URL($wine->image_url)}}">
          </td>
          <td><a href="{{route('wine.showOne', ['id' => $wine->id])}}">{{$wine->name}}</a></td>
          <td>{{$wine->country->name}}</td>
          <td>{{$wine->price}}</td>
          <td>{{$wine->stock}}</td>
          <td>{{$wine->customer->name}}</td>
          <td>
            @if ($wine->approved == 1)
              Yes
              @else
              No
            @endif
          </td>
          <td>
            <a class="btn-sm btn-info" href="{{route('wine.edit', ['wine' => $wine->id])}}">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="{{route('wine.delete', ['id' => $wine->id])}}">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
