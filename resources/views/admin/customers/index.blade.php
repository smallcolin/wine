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
          <a class="btn-sm btn-info" href="{{route('customer.edit', ['id' => $customer->id])}}">
            Edit
          </a>
        </td>
        <td>
          <a class="btn-sm btn-danger" href="{{route('customer.delete', ['id' => $customer->id])}}">
            Delete
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
