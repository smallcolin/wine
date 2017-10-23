@extends('customers/main')

@section('customer-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit Comment</h3>
    </div>
    <div class="panel-body">
      <form action="{{route('comments.update', ['comment' => $comment->id])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="wine_id" value="{{$comment->wine_id}}">
        <div class="form-group">
          <label for="customer_id">Name</label><br />
          <h5>{{$comment->customer->name}}</h5>
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" value="{{$comment->title}}">
        </div>

        <div class="form-group">
          <label for="body">Your words?</label>
          <textarea class="form-control" name="body" rows="3" cols="50">{{$comment->body}}</textarea>
        </div>

        <div class="form-group">
          <label for="rating">Rating</label>
          @php
            $prevRating = $comment->rating;
            for ($i=1; $i < 6; $i++) {
              if ($i == $prevRating) {
                echo '<label class="checkbox-inline">';
                echo '<input name="rating" type="radio" checked="checked" value="';
                echo $i;
                echo '">' . ' ' . $i . ' ';
                echo '</label>';
              } else {
                echo '<label class="checkbox-inline">';
                echo '<input name="rating" type="radio" value="';
                echo $i;
                echo '">' . ' ' . $i . ' ';
                echo '</label>';
              }
            }
          @endphp

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
