@extends('admin/main')

@section('admin-content')
  <h3>All Customers</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
      <tr>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
        <td>
          <a class="btn btn-sm btn-info" href="{{route('customers.edit', ['id' => $customer->id])}}">
            Edit
          </a>
        </td>
        <td>

          <form action="{{route('customers.destroy', ['id' => $customer->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{$customers->links()}}
@endsection
