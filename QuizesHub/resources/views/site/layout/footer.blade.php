<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                @if(request()->path() != 'AboutUs')
                 <a class="btn btn-link" href="{{route('site.about')}}">About Us</a>
               @endif  
                @if(request()->path() != 'contact')
                  <a class="btn btn-link" href="{{ route('site.contact') }}">Contact Us</a>
              @endif
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, Sharqia, Egypt</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+01026660223</p>
                <a href="mailto:quizzeshub@gmail" class="mb-2" ><i class="fa fa-envelope me-3"></i>quizzeshub@gmail.com</a>
              
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('website/assets')}}/img/course-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6"> -->
                <!-- <h4 class="text-white mb-3">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p> -->
                <!-- <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div> -->
            <!-- </div> -->
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
              
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('site.index') }}">Home</a>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
