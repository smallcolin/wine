@extends('admin/main')

@section('admin-content')
  <h2>Gallery Images</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($images as $image)
        <tr>
          <td>
            <img class="img-rounded" style="width: 50px; height: 35px;" src="{{URL($image->image_url)}}">
          </td>
          <td>{{$image->name}}</td>
          <td>{{$image->description}}</td>
          <td>
            <a class="btn btn-sm btn-info" href="{{route('images.edit', ['image' => $image->id])}}">
              Edit
            </a>
          </td>
          <td>
            <form action="{{route('images.destroy', ['id' => $image->id])}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input class="btn btn-sm btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$images->links()}}
@endsection
