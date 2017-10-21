@extends('admin/main')

@section('admin-content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Create a new country?
    </div><br />
    <div class="panel-body">
      <form class="" action="{{route('countries.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="name" value="" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Create</button>
        </div>
      </form>
    </div>
  </div>
@endsection
