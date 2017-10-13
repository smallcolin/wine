@extends('customers/main')

@section('content')
  <div class="row">
    <div class="col-sm-6 text-center">
      <img style="width: 100%; height: auto; margin-top: 10px;" src="{{URL($wine->image_url)}}" alt="">
      <div class="panel panel-default">
        <div class="panel-body">
          Average Rating:
          @php
          echo $rating;
          @endphp
        </div>
      </div>
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
            if ($stock > 0) {
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

  <div class="row">
    <div class="col-sm-6">
      <h3>Comments</h3>
      @foreach ($comments as $comment)
          <ul style="list-style: none;padding:0;">
            <li><strong>{{$comment->title}}</strong></li>
            <li>{{$comment->body}}</li>
            <li>Written by {{$comment->customer->name}}</li>
            <li>Wine reviewed: {{$comment->wine->name}}</li>
          </ul>
          <hr />
      @endforeach
    </div>
    <div class="col-sm-6">
      <h3>Leave a comment…</h3>
      <form action="{{route('comment.store')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="wine_id" value="{{$wine->id}}">
        <div class="form-group">
          <label for="customer_id">Name</label>
          <input type="text" class="form-control" name="customer_id">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
          <label for="body">Your words?</label>
          <textarea class="form-control" name="body" rows="2" cols="50"></textarea>
        </div>

        <div class="form-group">
          <label for="grade">Grade</label>

          @php
            for ($i=1; $i < 6; $i++) {
              echo '<label class="checkbox-inline">';
              echo '<input name="grade" type="radio" value="';
              echo $i;
              echo '">' . ' ' . $i . ' ';
              echo '</label>';
            }
          @endphp

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
