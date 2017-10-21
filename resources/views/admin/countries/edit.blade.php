@extends('admin/main')

@section('admin-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Edit Country
    </div>
    <div class="panel-body">
      <form class="" action="{{route('countries.update', ['id' => $country->id])}}" method="post">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{$country->name}}" class="form-control">
        </div>

        <div class="form-group">
          <input class="btn btn-sm btn-info" type="submit" value="Update">
        </div>
      </form>

    </div>
  </div>
@endsection
