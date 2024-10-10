@extends('site.layout.master')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                <img class="img-fluid position-absolute w-100 h-100" src="{{asset('website/assets')}}/img/course-1.jpg" alt="">
                </div>
            </div>
            
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">More Information</h6>
                
                <p class="mb-4">Online Exams is a comprehensive platform that offers a wide range of online tests. It offers a variety of test types, including multiple choice, true/false, and short answer.</p>
                <p class="mb-4">if you are looking for an online test platform that offers a wide range of tests, then Online Exams is the right choice.</p>
                <p class="mb-4">To take an online test, you need to following this following options:</p>
                <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Go To Your Profile</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Select University</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Select Faculty and Major</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Select Your level</p>
                    </div>
                   <p>Your Courses will Appear immediately</p>
                </div>
                <a href="{{route('profile.edit')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lets Do This</a>
            </div>
        </div>
    </div>
</div>            
@endsection