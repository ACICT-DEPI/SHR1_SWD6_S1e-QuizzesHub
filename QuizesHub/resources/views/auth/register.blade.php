
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('exam.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Font Icon -->

    <link rel="stylesheet" href="{{ asset('auth/assets') }}/fonts/material-icon/css/material-design-iconic-font.min.css">

   <!-- livewire:css -->

     <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/selectFX/css/cs-skin-elastic.css">
     <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/style.css">


    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/assets') }}/css/style.css">



    <!-- Scripts -->
    @vite([/*'resources/css/app.css',*/ 'resources/js/app.js'])



</head>
<body>


    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname"  placeholder="Your first name" value="{{ old('fname') }}"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('fname')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname"  placeholder="Your last name" value="{{ old('lname') }}"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('lname')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your username" value="{{ old('username') }}"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('username')" class="mt-2" /></div>



                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" id="email" class="block mt-1 w-full" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Your Email"/>
                            </div>
                            <div ><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password" />
                            </div>
                            <div ><x-input-error :messages="$errors->get('password')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"/>
                            </div>
                            <div ><x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="gender"><i class=""></i>Gender</label>
                                <div class="">
                                    <div class="">
                                        <input type="radio" class="" id="male" name="gender"
                                            value="M" @if (old('gender') == 'M') checked @endif style="margin:2px" />
                                        <label class=" " style="left: 200px; top:10px;" for="male">Male</label>
                                    </div>
                                    <div class="" >
                                        <input type="radio" class="" id="female" name="gender"
                                            value="F" @if (old('gender') == 'F') checked @endif style="margin-left:2px" />
                                        <label class="" style="left: 200px; top:25px;" for="female">Female</label>
                                    </div>
                                    <div ><x-input-error :messages="$errors->get('gender')" class="mt-2" /></div>
                                </div>
                            </div>
                               @livewire('CreateUserForm')
                            <!-- {{-- <livewire:create-user-form /> --}} -->


                            <div class="form-group" style="margin-top: 20px;">
                                <label class=" form-control-label" for="level_id">Levels</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                    <select class="form-control @error('level_id') is-invalid @enderror" name="level_id" id="level_id">
                                        <option value="">Select Level</option>
                                        @foreach ($Levels as $level)
                                        <option value="{{ $level->id }}" @selected(old('level_id')==$level->id)>
                                            {{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('website/assets/img/QH.png')}}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('auth/assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('auth/assets') }}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
