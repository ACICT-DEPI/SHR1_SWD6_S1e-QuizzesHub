{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}







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
                                <input type="text" name="fname" id="fname" :value="old('fname')" placeholder="Your first name"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('fname')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname" :value="old('lname')" placeholder="Your last name"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('lname')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" :value="old('username')" placeholder="Your username"/>
                            </div>
                            <div><x-input-error :messages="$errors->get('username')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Your Email"/>
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
                                        <input type="radio" class=" " id="male" name="gender"
                                            value="M" @if (old('gender') == 'M') checked @endif />
                                        <label class=" " style="left: 200px; margin-bottom:10px; top:25%;" for="male">Male</label>
                                    </div>
                                    <div class="">
                                        <input type="radio" class="" id="female" name="gender"
                                            value="F" @if (old('gender') == 'F') checked @endif />
                                        <label class="" style="left: 200px; top:85%;" for="female">Female</label>
                                    </div>
                                    <div ><x-input-error :messages="$errors->get('gender')" class="mt-2" /></div>
                                </div>
                            </div>

                            {{-- <livewire:create-user-form /> --}}


                            {{-- <div class="form-group">
                                <label class=" form-control-label" for="level_id">Levels</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                    <select class="form-control @error('level_id') is-invalid @enderror" name="level_id"
                                        id="level_id">
                                        <option value="">Select Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}" @selected(old('level_id') == $level->id)>
                                                {{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

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

        <!-- Sing in  Form -->
        {{-- <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('website/assets/img/QH.png')}}" alt="sing in image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Your Email"/>
                            </div>
                            <div ><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password" />
                            </div>
                            <div ><x-input-error :messages="$errors->get('password')" class="mt-2" /></div>


                            <div class="form-group">
                                <input type="checkbox" name="remember_me" id="remember_me" class="agree-term" />
                                <label for="remember_me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a style="display: inline-block" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <div class="form-button " style="display: inline-block; margin-left:10px">
                                    <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section> --}}

    </div>

    <!-- JS -->
    <script src="{{ asset('auth/assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('auth/assets') }}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
