@extends ('customers/main')

@section ('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Congratulations {{Auth::guard('customer')->user()->name}}</h1>
      <p>
        Your paid <h3>${{round($total)}}</h3> with <h3>{{$payment}}</h3>
      </p>
      <p>
        Thank you for your custom.  Have a nice day!
      </p>
      <a class="btn btn-danger" href="/">Back to Shop</a>
    </div>
  </div>

@endsection
