@extends('admin/main')

@section('admin-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Edit Country
    </div>
    <div class="panel-body">
      <form class="" action="{{route('country.update', ['country' => $country->id])}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{$country->name}}" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
