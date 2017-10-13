@extends('customers/main')

@section('customer-content')
  <h3>My Comments</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Words</th>
        <th>Wine</th>
        <th>Grade</th>
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
          <td>{{$comment->grade}}</td>
          <td>
            <a class="btn-sm btn-info" href="{{route('customerComment.edit', ['comment' => $comment->id])}}">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="{{route('customerComment.delete', ['id' => $comment->id])}}">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
