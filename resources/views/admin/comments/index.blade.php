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
          <td><a href="{{route('wine.showOne', ['id' => $comment->wine_id])}}">{{$comment->wine->name}}</a></td> <!--names needed-->
          <td>{{$comment->title}}</td>
          <td>{{$comment->body}}</td>
          <td>{{$comment->customer->name}}</td> <!--names needed-->
          <td>{{$comment->grade}}</td>
          <td>
            <a class="btn-sm btn-info" href="{{route('comment.edit', ['comment' => $comment->id])}}">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="{{route('comment.delete', ['id' => $comment->id])}}">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
