@extends('customers/main')

@section('customer-content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit wine</h3>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('wine.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" name="name" value="">
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
          <input type="file" name="image_url" class="form-control" value="">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="4" cols="40"></textarea>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="price">Price</label>
              <input class="form-control" type="number" name="price" value="">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="stock">Stock</label>
              <input class="form-control" type="number" name="stock" value="">
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
