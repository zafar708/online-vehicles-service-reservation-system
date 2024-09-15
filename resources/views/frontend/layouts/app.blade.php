<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/images/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/font-awesome-6.4.0.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
  @yield('styles')
</head>

<body>
  <nav class="p-3 navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand me-5" href="{{route('index')}}">OVSRS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <form class="d-flex ms-5" action="{{route('search')}}" method="get">
            <input class="form-control me-1" type="search" placeholder="Search Service Station" aria-label="Search" name="search" required>
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link {{(isset($menu) && $menu == 'home') ? 'active' : ''}}" aria-current="page" href="{{route('index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'stations') ? 'active' : ''}}" href="{{route('stations')}}">Service Stations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'services') ? 'active' : ''}}" href="{{route('services')}}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'about') ? 'active' : ''}}" href="{{route('about-us')}}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'contact') ? 'active' : ''}}" href="{{route('contact-us')}}">Contact Us</a>
          </li>
          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'profile') ? 'active' : ''}}" href="{{route('profile')}}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'logout') ? 'active' : ''}}" href="{{route('logout')}}">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'register') ? 'active' : ''}}" href="{{route('register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(isset($menu) && $menu == 'login') ? 'active' : ''}}" href="{{route('login')}}">Login</a>
          </li>
          @endif
          
        </ul>
      </div>
    </div>
  </nav>

  @if(session('error'))
    <div class="container mt-5 alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session('success'))
    <div class="container mt-5 alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @yield('content')
  
    <footer class="footer">
      <div class="bg-dark">
        <div class="container-fluid">
          <div class="row p-5">
            <div class="col-lg-4 col-md-4">
              <h4 class="text-light">Online Vehicle Service Reservation System</h6>
            </div>
            <div class="col-lg-4 col-md-4">
              <h4 class="text-light mb-3">Our Service Stations</h6>
              @php
                $stations = App\Models\ServiceStation::where('status', 'active')->latest()->take(3)->get();
                $services = App\Models\Service::latest()->take(3)->get();
              @endphp
              @foreach($stations as $station)
                <div class="mt-2">
                  <a class="text-light" href="{{route('station-detail', $station->slug)}}">{{$station->name}}</a>
                </div>
              @endforeach
            </div>
            <div class="col-lg-4 col-md-4">
              <h4 class="text-light mb-3">Our Services</h6>
              @foreach($services as $service)
              <div class="mt-2">
                <a class="text-light" href="{{route('service-detail', $service->slug)}}">{{$service->title}}</a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </footer>
    <script src="{{asset('frontend/assets/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>

</html>