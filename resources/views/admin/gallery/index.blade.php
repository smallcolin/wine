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
            <a class="btn-sm btn-info" href="{{route('galleryImage.edit', ['image' => $image->id])}}">
              Edit
            </a>
          </td>
          <td>
            <a class="btn-sm btn-danger" href="{{route('galleryImage.delete', ['id' => $image->id])}}">
              Delete
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
