@extends('admin/main')

@section('admin-content')
  <h3>All Comments</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Wine</th>
        <th>Title</th>
        <th>Words</th>
        <th>Customer</th>
        <th>Grade</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
        <tr>
          <td><a href="{{route('wine.showOne', ['id' => $comment->wine_id])}}">{{$comment->wine->name}}</a></td>
          <td>{{$comment->title}}</td>
          <td>{{$comment->body}}</td>
          <td>{{$comment->customer->name}}</td>
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
