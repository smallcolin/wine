@extends('master')

@section('content')
  <h3>Shop</h3>
  <h5>Wines from {{$country->name}}</h5>
  {{-- Country Filter --}}
  <ul class="text-center">
    <a style="margin-bottom:5px;"  class="btn btn-sm btn-danger" href="/">
      <li style="display:inline-block; padding: 0 5px;"><strong>Show All</strong></li>
    </a>
    @foreach ($countries as $countryFilter)
      <a style="margin-bottom:5px;" class="btn btn-sm btn-outline-danger" href="{{route('wine.filter', ['countryFilter' => $countryFilter->id])}}">
        <li style="display:inline-block; padding: 0 5px;">
          {{$countryFilter->name}}
        </li>
      </a>
    @endforeach
  </ul>

  <div class="row">
    @foreach ($country->wines as $wine)
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
              <a href="{{route('cart.addItem', $wine->id)}}" class="btn btn-outline-success">
                Add to Cart
              </a>
            </li>
          </ul>
        </div>
      @endif
    @endforeach
  </div>
@endsection
