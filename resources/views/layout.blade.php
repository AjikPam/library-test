<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">
    <title>@yield('title') - Online Library</title>
</head>
<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('books.index') }}">
                  <img alt="Brand" src="{{ asset('images/timedoor-academy-pro-logo-black.png') }}" width="150px">
              </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('books.index') }}">Home</a></li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                  <div>
                    @auth
                        <div>{{ Auth::user()->name }}</div>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-dropdown-link>
                      </form>
                    @else
                        <a href="{{ route('login') }}" >Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                  </div>
                <li><a href="{{ route('books.create') }}">new book</a></li>
              </ul>
            </div>
          </div>
      </nav>
    </div>
  </header>
    
<div class="container">
  @yield('content')

  @section('pagination')
  @show
</div>

<footer>
<!-- footer -->
  <div class="panel panel-default">
    <div class="panel-footer">
    <div class="row">
        <div class="col-sm-12 col-md-4">
        <div class="text-center" id="center-content">
            <img src="{{ asset('images/timedoor-academy-pro-logo-black.png') }}" alt="logo" width="150px">
        </div>
        </div>
        <div class="col-sm-12 col-md-4">
        <div class="text-center">
            <h4>Timedoor Academy Pro - Online Library</h4>
            <p>Copyright 2023 &copy; All Right Reserved</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-4">
        <div class="row" id="center-content">
            <div class="col-sm-4 col-md-1">
            <a href="#"><i class="fab fa-lg fa-facebook"></i></a>
            </div>
            <div class="col-sm-4 col-md-1">
            <a href="#"><i class="fab fa-lg fa-instagram"></i></a>
            </div>
            <div class="col-sm-4 col-md-1">
            <a href="#"><i class="fab fa-lg fa-twitter"></i></a>
            </div>
        </div>
        </div>
    </div>
    </div>
  </div>
</footer>
        


    </div>
</body>
</html>