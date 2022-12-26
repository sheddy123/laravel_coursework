<nav class="flex justify-between items-center mb-4 ">
    <a href="{{url('/')}}"><img class="w-24 mt-1 md:px-4" src="{{ asset('assets/images/skynet.png') }}" alt="" class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        <li>
            <a href="{{url('register')}}" class="hover:text-[#881337]">
                <span class="text-sm"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp; Register</a></span>
        </li>
        <li>
            @if (Auth::check())
                <a class="hover:text-[#881337] text-sm" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                   <span class="text-sm"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;{{ __('Logout') }}</span> 
                </a><br/>
                <span class="hover:text-[#881337] text-sm">Hi!   {{ Auth::user()->name }}</span>
            @endif
            @if (!Auth::check())
                <a href="{{ url('login') }}" class="hover:text-[#881337]"><i
                        class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            @endif



        </li>
    </ul>
</nav>


{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @php
                    $categories = App\Models\Category::where('navbar_status', '0')
                        ->where('status', '0')
                        ->get();
                @endphp
                @foreach ($categories as $category)
                    <li class="nav-item"><a href="{{url('tutorial/'.$category->id)}}" class="nav-link">{{$category->name}}</a></li>
                @endforeach
            </ul>
           
        </div>
    </div>
</nav> --}}
