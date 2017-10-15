@extends('admin/main')

@section('admin-content')
  <h3>Export CSV</h3>
  <p>Choose the database table you want to export and click the button.</p>
  <form class="" method="post" action="{{route('export.createCsvFile')}}">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control" name="tableToExport">
            <option value="1">Comments</option>
            <option value="2">Countries</option>
            <option value="3">Customers</option>
            <option value="4">Orders</option>
            <option value="5">Wines</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <button class="btn btn-primary">Download</button>
        </div>
      </div>
    </div>
  </form>
@endsection
