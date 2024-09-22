<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Login</title>
    <link href="{{ asset('dashboard/assets') }}/css/style2.css" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets') }}/css/all.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  
  </head>

  <body>
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
       </div>
   
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
    <!-- </div> -->


    <body>
  <div class="wrapper">
    <div class="container">
<div class="sign-container">


             <form  action="{{ route('handleLogin') }}"
             method="post">
             @csrf
          
                  <h1>
                  Quiz<span style="color:#ee3b24;font-size: 30px">Hub</span></h1>
                  <!-- <i class="fa-regular fa-circle-user"></i> -->
                <h3 style="font-family:Cursive">Signin</h3>   
                    
                    <input
                      type="email"
                      
                      placeholder="Email"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required=""
                      name="email"
                    />
                 
                 
                    <input
                      type="password"
                      
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required=""
                      name="password"
                    />
                   
                    
                 
                      <button
                        class="form_btn"
                        type="submit"
                      >
                      <i class="fa-solid fa-right-to-bracket"></i>
                       Sign In
                      </button>
                     <br> 
                     <div>Don't have account? <a href="{{ route('register') }}" 
                     style="text-decoration:none;color:#ee3b24;">Register</a>
                    </div>
                  </br>
                    
            </form>

        </div>
              <div class="overlay-container">
                <div class="overlay-right">
                   <img src="{{ asset('storage/loginimages/logo.png') }}"id="img1">
                </div>
              </div>
    </div>
  </div>

            

</body>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('dashboard/assets') }}/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dashboard/assets') }}/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
