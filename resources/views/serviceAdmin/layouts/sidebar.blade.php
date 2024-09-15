<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'dashboard') ? '' : 'collapsed'}}" href="{{route('service-dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'Staff') ? '' : 'collapsed'}}" href="{{route('staff.index')}}">
          <i class="bi bi-person"></i>
          <span>Staff (Mechanics)</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'Services') ? '' : 'collapsed'}}" href="{{route('services.index')}}">
          <i class="bi bi-gear"></i>
          <span>Services</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'ServiceStation') ? '' : 'collapsed'}}" href="{{route('serviceStations.index')}}">
          <i class="bi bi-wrench"></i>
          <span>Service Stations</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'book') ? '' : 'collapsed'}}" href="{{route('bookings')}}">
          <i class="bi bi-calendar-check"></i>
          <span>Bookings</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'profile') ? '' : 'collapsed'}}" href="{{route('profile-service-admin.index')}}">
          <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>

  </aside>