
@extends('site.layout.master')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('website/assets')}}/img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Exams</h5>
                            <h1 class="display-3 text-white animated slideInDown">The Best Online Exams Platform</h1>
                            <p class="fs-5 text-white mb-4 pb-2">you can learn from anywhere and anytime with our Quizs and Exams.</p>
                            <a href="{{route('site.ReadMore')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" wire:navigate>Read More</a>
                            <a href="{{route('newexams.create')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" wire:navigate>Add Exam</a>
                            @guest
                            <a href=" {{ route('register') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight" wire:navigate>Join Now</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('website/assets')}}/img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Exams</h5>
                            <h1 class="display-3 text-white animated slideInDown">Get Exams Online From Your Home</h1>
                            <p class="fs-5 text-white mb-4 pb-2">our exams are designed to help you improve your skills.</p>
                            <a href="{{route('site.ReadMore')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" wire:navigate>Read More</a>
                            <a href="{{route('newexams.create')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" wire:navigate>Add Exam</a>
                            @guest
                            <a href=" {{ route('register') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight" wire:navigate>Join Now</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
@auth
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
            <h1 class="mb-5">Courses Categories</h1>
        </div>
        </div>
</div>
<!-- Service Start -->
 <!--========================================================================== -->

<!--========================================================================== -->

@if(count(Auth::user()->courses()) != 0)

@php
$courses = [];
foreach(Auth::user()->courses() as $course){
$courses[] = App\Models\Admin\course::where('id',$course->course_id)->first();
}
@endphp

@foreach ($courses as $course)
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <a href="{{ route('CourseExams',$course->id) }}" class="dropdown-item" wire:navigate>{{ $course->name }}</a>
                        <p>Start {{ $course->name }} Exams Now</p>
                    </div>
                </div>
            </div>
    @endforeach
@endif
@endauth
<!-- Testimonial Start -->
<!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('website/assets')}}/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('website/assets')}}/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('website/assets')}}/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('website/assets')}}/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <caption>Top Users @QuizzesHub</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Who</th>
                <th scope="col">Points</th>
              </tr>
            </thead>
            <tbody>
                @if($top_users->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No users yet.</td>
                </tr>
                @else 
                @foreach($top_users as $index => $user)
                    <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $user->fname . ' ' . $user->lname }}</td>
                    <td>{{ $user->score }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
@endsection
