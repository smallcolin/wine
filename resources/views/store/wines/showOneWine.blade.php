@extends('customers/main')

@section('content')
  <div class="row">
    <div class="col-sm-6 text-center">
      <img style="width: 100%; height: auto; margin-top: 10px;" src="{{URL($wine->image_url)}}" alt="">
    </div>
    <div class="col-sm-6">
      <ul class="list-group">
        <li class="list-group-item">
          Name:
          <h3>{{ $wine->name }}</h3>
        </li>
        <li class="list-group-item">
          <p>Description:<br />
            {{ $wine->description }}
          </p>
        </li>
        <li class="list-group-item">Price: {{ $wine->price }}</li>
        <li class="list-group-item">Country: {{ $wine->country->name }}</li>
        <li class="list-group-item">Status:
          @php
            $stock = $wine->stock;
            if ($wine->stock > 0) {
              echo 'In Stock';
            } else {
              echo 'Unavailable at this time';
            }
          @endphp
        </li>
        <li class="list-group-item">
          <a href="" class="btn btn-danger">
            Add to cart
          </a>
        </li>
      </ul>
    </div>
  </div>
  <hr />

  <h3>Comments</h3>
@endsection
