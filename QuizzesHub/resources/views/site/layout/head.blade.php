<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{{asset('exam.ico')}}" rel="icon">
    <link href ="{{asset('dashboard/assets')}}/css/all.css" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('website/assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('website/assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('website/assets')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('website/assets')}}/css/style.css" rel="stylesheet">

    @livewireStyles
    @yield('styles')
