<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'dashboard') ? '' : 'collapsed'}}" href="{{route('admin-dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'users') ? '' : 'collapsed'}}" href="{{route('users.index')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'ServiceStation') ? '' : 'collapsed'}}" href="{{route('service-stations.index')}}">
          <i class="bi bi-wrench"></i>
          <span>Service Stations</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{(isset($menu) && $menu == 'profile') ? '' : 'collapsed'}}" href="{{route('profile.index')}}">
          <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li>

    </ul>

  </aside>