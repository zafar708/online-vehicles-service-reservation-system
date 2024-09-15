<div class="col-lg-3 col-md-4 shadow-sm p-5">
  <!-- side bar -->
  <div class="user-dashboard">
    <div>
      <h5 class="fw-bold">{{ucfirst(Auth::user()->name)}}</h5>
    </div>
    <ul>
      <li class="nav-item mt-3">
        <a href="{{route('user-dashboard')}}" class="nav-link {{(isset($menu) && $menu == 'dashboard') ? 'fw-bold' : ''}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="{{route('vehicles.index')}}" class="nav-link {{(isset($menu) && $menu == 'vehicles') ? 'fw-bold' : ''}}">
          <i class="bi bi-car-front"></i>
          <span>Vehicles</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="{{route('all-bookings')}}" class="nav-link {{(isset($menu) && $menu == 'book') ? 'fw-bold' : ''}}">
          <i class="bi bi-calendar-check"></i>
          <span>Bookings</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="{{route('user-profile')}}" class="nav-link {{(isset($menu) && $menu == 'profile') ? 'fw-bold' : ''}}">
          <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="{{route('logout')}}" class="nav-link {{(isset($menu) && $menu == 'logout') ? 'fw-bold' : ''}}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
</div>