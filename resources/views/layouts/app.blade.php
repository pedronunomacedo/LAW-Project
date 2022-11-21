<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <script type="text/javascript" src={{ asset('js/app.js') }} defer>
  </script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 5em">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Tech4You</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse position-absolute end-0" id="navbarColor02">
            <form class="d-flex mx-2">
              <input class="form-control sm-2" type="text" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mx-2">
              @if (Auth::check())
                @if (Auth::user()->isAdmin())
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">Profile</a>
                      <a class="dropdown-item" href="/adminManageUsers">Manage Users</a>
                      <a class="dropdown-item" href="/adminManageProducts">Manage Products</a>
                      <a class="dropdown-item" href="/adminManageOrders">Manage Orders</a>
                      <a class="dropdown-item" href="/adminManageFAQs">Manage FAQs</a>
                      <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                  </li>
                @else
                  <li class="nav-item">
                  <a class="nav-link active" href="#"><i class="fas fa-shopping-bag"></i></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="{{route('profile', [Auth::id()])}}">Profile</a>
                      <a class="dropdown-item" href="#">Wishlist</a>
                      <a class="dropdown-item" href="#">Orders</a>
                      <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                  </li>
                @endif
              @else
                <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section id="content">
      @yield('content')
    </section>
  </body>
</html>
