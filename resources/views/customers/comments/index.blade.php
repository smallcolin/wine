@extends('customers/main')

@section('customer-content')
  <h3>My Comments</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Words</th>
        <th>Wine</th>
        <th>Rating</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
        <tr>
          <td>{{$comment->title}}</td>
          <td>{{$comment->body}}</td>
          <td>
            <a href="{{route('wine.showOne', ['id' => $comment->wine->id])}}">
              {{$comment->wine->name}}
            </a>
          </td>
          <td>{{$comment->rating}}</td>
          <td>
            <a class="btn btn-sm btn-info" href="{{route('comments.edit', ['comment' => $comment->id])}}">
              Edit
            </a>
          </td>
          <td>
            <form action="{{route('comments.destroy', ['id' => $comment->id])}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input class="btn btn-sm btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$comments->links()}}
@endsection
