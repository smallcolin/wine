@extends('admin/main')

@section('admin-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit Comment</h3>
    </div>
    <div class="panel-body">
      <form action="{{route('comment.update', ['comment' => $comment->id])}}" method="post">
        {{ csrf_field() }}
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

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
