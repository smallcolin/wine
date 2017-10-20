<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wines</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/92a37b560d.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            a {
              color: crimson;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      @include('notifi')
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                  @php
                  // dd(Auth::user());
                  @endphp
                    @if(Auth::user() || Auth::guard('customer')->user()) <!-- customer guard problem -->
                      @if (Auth::user())
                        Admin: {{ Auth::user()->name }}
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      @else
                        Customer: {{ Auth::guard('customer')->user()->name }} <!-- customer guard problem -->
                          <a href="{{ route('customers.logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('customers.logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      @endif
                    @else
                        <a href="{{ route('customers.login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div>
            <div class="container">
              <div class="row text-center">
                <a href="/">
                  <h1>WINE</h1>
                </a>
              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-2">
                  <div class="list-group text-center">
                    <ul>

                      <a href="{{route('store.wines.showAll')}}">
                        <li class="list-group-item">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          Shop
                        </li>
                      </a>
                      <a href="/gallery">
                        <li class="list-group-item">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                          Gallery
                        </li>
                      </a>
                    @auth
                      <a href="/admin">
                        <li class="list-group-item">
                          <i class="fa fa-user-plus" aria-hidden="true"></i>
                          Admin
                        </li>
                      </a>
                    @endauth
                    @auth ('customer')
                      <a href="/customer">
                        <li class="list-group-item">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          Customer
                        </li>
                      </a>
                      <a href="{{route('cart.index')}}">
                        <li class="list-group-item">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          Cart
                          <span class="alert badge"></span> <!-- Would be nice to show Cart::count() here -->
                        </li>
                      </a>
                    @endauth
                    </ul>
                  </div>
                </div>
                  <div class="col-md-10">
                    @yield('content')
                  </div>
              </div>
            </div>
    </body>
</html>
