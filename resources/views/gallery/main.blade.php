@extends('master')

@section('content')
  <h1>Gallery</h1>
  <div class="row">
    @foreach ($images as $image)
      <div class="col-sm-4">
        <img style="width: 100%; height: auto; margin-top: 10px;" src="{{URL($image->image_url)}}" alt="">
      </div>
    @endforeach
  </div>
  <hr />
  @auth('customer')
    <div class="row">
      <form method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="form-group">
          <label for="images">Add some images to the gallery</label>
          <input multiple type="file" class="form-control-file" name="images[]">
        </fieldset>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  @endauth

@endsection
