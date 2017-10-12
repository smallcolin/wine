@extends('admin/main')

@section('admin-content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Edit wine</h2>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('wine.update', ['wine' => $wine->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" name="name" value="{{$wine->name}}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="country_id">Country</label>
              <select class="form-control" name="country_id">
                @foreach ($countries as $country)
                  <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image_url" class="form-control">
          <img style="width: 100px; height: 70px; margin-top: 10px;" src="{{$wine->image_url}}" alt="">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$wine->description}}</textarea>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="number" name="price" value="{{$wine->price}}">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="stock">Stock</label>
              <input class="form-control" type="number" name="stock" value="{{$wine->stock}}">
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
