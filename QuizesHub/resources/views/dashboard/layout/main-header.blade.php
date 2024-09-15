{{-- @if(empty(Auth::user()->role) || Auth::user()->role != 'admin' )
    @php
        header("Location: " . URL::to('/login'), true, 302);
        exit();
    @endphp
@endif --}}

<div class="header-menu">
    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
                <form class="search-form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>



        </div>
    </div>


    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(!empty(Auth::user()->image_path) && file_exists('storage/'.Auth::user()->image_path))
                    <img class="user-avatar rounded-circle" src="{{ asset('storage/'.Auth::user()->image_path) }}" alt="User Avatar">
                @else
                    <img class="user-avatar rounded-circle" src="{{ asset('dashboard/assets/images/default.jpg') }}" alt="User Avatar">
                @endif
                {{-- <img class="user-avatar rounded-circle" src="" alt="User Avatar"> --}}
            </a>

            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="#"><i class="fa fa-user"></i> {{ Auth::user()->fname }}</a>
                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a>

            </div>
        </div>


    </div>








</div>
