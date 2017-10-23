@extends('admin/main')

@section('admin-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Edit Customer
    </div>
    <div class="panel-body">
      <form class="" action="{{route('customers.update', ['id' => $customer->id])}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{$customer->name}}" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
