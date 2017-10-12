@extends('admin/main')

@section('admin-content')
  <h2>All countries</h2>
  <table class="">
    <thead>
      <tr>
        <th>Country</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($countries as $country)
        <tr>
          <td>{{$country->name}}</td>
          <td>
            <a class="btn-sm btn-info" href="{{route('country.edit', ['id' => $country->id])}}">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="{{route('country.delete', ['id' => $country->id])}}">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
