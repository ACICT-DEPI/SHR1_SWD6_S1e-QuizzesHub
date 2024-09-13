@if(empty(Auth::user()->role) || Auth::user()->role != 'admin' )
    @php
        header("Location: " . URL::to('/login'), true, 302);
        exit();
    @endphp
@endif

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
                <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="#"><i class="fa fa-user"></i>{{ Auth::user()->fname }}</a>

                <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" ><span class="">Logout</span></button>
                  </form>
            </div>
        </div>


    </div>








</div>
