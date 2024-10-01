<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('site.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img src="{{asset('website/assets')}}/img/QH.png" class="logo" alt="">QuizzesHub</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

  

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        @auth


            <a href="{{ route('site.index') }}" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                <div class="dropdown-menu fade-down m-0">
                    @if(!empty($Courses))
                 @foreach ($Courses as $course)
                   <a href="#" class="dropdown-item">{{ $course->name }}</a>
                   @endforeach
                    
                   @else
                   <span class="dropdown-item">No Course</span>
                   @endif
                    
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Settings</a>
                <div class="dropdown-menu fade-down m-0">

                    <a href="{{ route('profile.edit') }}" class="dropdown-item">profile</a>
                    {{-- <a href="{{ route('logout') }}" class="dropdown-item">logout</a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                            this.closest('form').submit();"> Logout</a>

                    </form>
                </div>
            </div>

        </div>


        @endauth
        @guest
        <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        @endguest

    </div>
</nav>
