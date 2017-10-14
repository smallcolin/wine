@extends('master')

@section('content')
  <h3>Shop</h3>
  <h5>Filter by Country</h5>


  <div class="row">
    @foreach ($wines as $wine)
      @if ($wine->approved == 1)
        <div class="col-md-3">
          <ul class="list-group" style="margin: 20px 0;">
            <li class="list-group-item">
              <img style="width: 100%; height: auto;" src="{{URL($wine->image_url)}}" alt="">
            </li>
            <li class="list-group-item">{{$wine->name}}</li>
            <li class="list-group-item">{{$wine->price}} kr</li>
            <li class="list-group-item">
              <a href="{{route('wine.showOne', ['id' => $wine->id])}}" class="btn btn-outline-danger">
                Read More
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="btn btn-outline-success">
                Add to Cart
              </a>
            </li>
          </ul>
        </div>
      @endif
    @endforeach
  </div>
@endsection
