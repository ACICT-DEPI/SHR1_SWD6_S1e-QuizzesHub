
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



        <!-- Sing in  Form -->
        <section class="sign-in">
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
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('auth/assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('auth/assets') }}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

