<nav class="sb-topnav navbar navbar-expand" style="background: #881337">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-white text-md" href="{{url('/')}}">Sheddy Blogging</a>
    <!-- Sidebar Toggle-->
    <button class=" btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="background: #881337;
    border: #881337;" href="#!"><i class="fas fa-bars text-white"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="z-0 focus:shadow focus:outline-none rounded" type="text" placeholder="" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-default" id="btnNavbarSearch" type="button"><i class="fas fa-search text-white"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-white"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a></li>
            </ul>
        </li>
    </ul>
</nav>