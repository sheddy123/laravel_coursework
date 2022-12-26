<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-[#881337]" style="background: #881337" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-white">Core</div>
                <a class="nav-link text-white" href="{{url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading text-white">Interface</div>
                <a class="nav-link collapsed text-white" href="#category" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-white" href="{{url('admin/add-category')}}">Add Category</a>
                        <a class="nav-link text-white" href="{{url('admin/category')}}">View Category</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed text-white" href="#posts" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Articles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-white" href="{{url('admin/add-post')}}">Add Article</a>
                        <a class="nav-link text-white" href="{{url('admin/posts')}}">View Article</a>
                    </nav>
                </div>

                <a class="nav-link collapsed text-white {{ Request::is('admin/users') ? 'active' : ''}}" href="{{url('admin/users')}}" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- <a class="nav-link text-white" href="{{url('admin/add-user')}}">Add User</a> --}}
                        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-white" href="{{url('login')}}">Login</a>
                                <a class="nav-link text-white" href="{{url('register')}}">Register</a>
                                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <a class="nav-link text-white" href="{{ route('password.request') }}">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link text-white" href="{{url('admin/users')}}">View Users</a>
                    </nav>
                </div>

                {{-- <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> --}}
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                      
                        {{-- <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> --}}
                    </nav>
                </div>
                {{-- <div class="sb-sidenav-menu-heading text-white">Addons</div>
                <a class="nav-link text-white" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link text-white" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer text-white">
            <div class="small text-white font-bold">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>