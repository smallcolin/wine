@extends('admin/main')

@section('admin-content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Edit Gallery Image</h2>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('images.update', ['image' => $image->id])}}" method="post">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" name="name" value="{{$image->name}}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" rows="8" cols="80">{{$image->description}}</textarea>
            </div>
          </div>
        </div>

          <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
          </div>
      </form>
    </div>
  </div>

@endsection
