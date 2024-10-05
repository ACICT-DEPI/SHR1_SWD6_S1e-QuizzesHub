<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('site.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img src="{{asset('website/assets')}}/img/QH.png" class="logo" alt="">QuizzesHub
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-right: 3%;">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @auth

                @if(Auth::user()->email_verified_at == null)
                    <a href="{{ route('verification.notice') }}" class="nav-item nav-link active">Verify Email</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Settings</a>
                        <div style="min-width: 0px !important; width:110px;" class="dropdown-menu fade-down m-0">

                            <form  method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a>

                            </form>
                        </div>
                    </div>
                @else


                    <a href="{{ route('site.index') }}" class="nav-item nav-link active"><i class="fa fa-home"></i> Home</a>
                    @if(request()->path() != 'AboutUs')
                    <a href="{{ route('site.about') }}" class="nav-item nav-link"><i class="fa fa-user" style="color: #06BBCC"></i>  About</a>
                    @endif

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book" style="color: #06BBCC"></i> Courses</a>
                        <div class="dropdown-menu fade-down m-0">
                            @if(!empty(Auth::user()->courses()))
                            @php
                            $courses = [];
                            foreach(Auth::user()->courses() as $course){
                            $courses[] = App\Models\Admin\course::where('id',$course->course_id)->first();
                            }
                            @endphp

                            @foreach ($courses as $course)
                            <a href="{{ route('CourseExams',$course->id) }}" class="dropdown-item">{{ $course->name }}</a>
                            @endforeach

                            @else
                            <span class="dropdown-item">No Course</span>
                            @endif

                        </div>
                    </div>

                    @if(request()->path() != 'contact')
                    <a href="{{ route('site.contact') }}" class="nav-item nav-link"><i class="fa fa-phone-alt" style="color: #06BBCC"></i> Contact</a>
                    @endif

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user" style="color: #06BBCC"></i><span></span> Settings</a>
                        <div style="min-width: 0px !important; width:110px;" class="dropdown-menu fade-down m-0">
                            @php
                            $image = Auth::user()->image_path;
                            @endphp
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">@if($image != null)<img src="{{asset('storage/'.$image)}}" class="rounded-circle" style="width: 30px; height: 30px;" alt="">@else <img src="{{asset('website/assets')}}/img/user.jpg" class="rounded-circle" style="width: 30px; height: 30px;" alt="">@endif  profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();"><i class="fa fa-sign-out-alt" style="margin-right: 5%; margin-left: 5%;"></i>Logout</a>

                            </form>
                        </div>
                    </div>

                </div>
            @endif
        @endauth

        @guest
        <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                class="fa fa-arrow-right ms-3"></i></a>
        @endguest

    </div>
</nav>
@section('styles')
<style>
    body {
        overflow-x: hidden;
    }
</style>
@endsection
