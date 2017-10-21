@extends('admin/main')

@section('admin-content')
  <h2>All countries</h2>
  <table class="table">
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
            <a class="btn btn-sm btn-info" href="{{route('countries.edit', ['id' => $country->id])}}">
              Edit
            </a>
          </td>
          <td>
            <form action="{{route('countries.destroy', ['id' => $country->id])}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input class="btn btn-sm btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$countries->links()}}
@endsection
