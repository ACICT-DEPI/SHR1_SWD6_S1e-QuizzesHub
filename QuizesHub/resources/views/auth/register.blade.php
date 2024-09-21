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
    <title>Register</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('exam.ico') }}"
    />
    <!-- Custom CSS -->
    <!-- <link href="{{ asset('dashboard/assets') }}/css/style.min.css" rel="stylesheet" /> -->
    <link href="{{ asset('dashboard/assets') }}/css/style2.css" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets') }}/css/all.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>
    <!-- <div class="main-wrapper"> -->
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
        "
      > -->
        <!-- <div class="auth-box border-top border-secondary">
            @if (!empty($errors->all()))
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            </div> -->
            <div class="wrapper" >
    <div class="container1">
 <div class="sign-container"> 
           
            <!-- Form -->
            <form
              id="register-form"
              action="{{ route('handleRegister') }}"
              method="post"
              novalidate
            >
            @csrf

            <h1>
                  Quiz<span style="color:#ee3b24;font-size: 30px">Hub</span></h1>
                  <h3 style="font-family:Cursive">Register</h3> 
                  <!-- <i class="fa-regular fa-circle-user"></i> -->
               
             
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          placeholder="fName"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          required=""
                          name="fname"
                        />
                     
                 
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          placeholder="lName"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          required=""
                          name="lname"
                        />
                      
                      
                        <input
                          type="text"
                          class="form-control form-control-lg"
                          placeholder="username"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          required=""
                          name="username"
                        />
                    <input
                      type="email"
                      class="form-control form-control-lg"
                      placeholder="Email"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required=""
                      name="email"
                    />
                    <input
                      type="password"
                      class="form-control form-control-lg"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required=""
                      name="password"
                    />
                  
                         <select name="gender" class="form-control form-control-lg">

                            <option value="M">Male</option>
                            <option value="F">Female</option>

                         </select>
                            
                            @livewire('create-user-form')
               
                      <button
                      class="form_btn"
                        type="submit"
                      >
                      <i class="fa-solid fa-id-card" id="reg-icon"></i>
                      Register
                      </button>
                  
            </form>
            </div>
              <div class="overlay-container">
                <!-- <div class="overlay-left">
                    <h1>Welcome Back</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="overlay_btn" id="signIn">Sign In</button>
                </div> -->
                <div class="overlay-right">
                   <img src="{{ asset('storage/loginimages/logo.png') }}"id="img1">
                </div>
              </div>
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
    </div>
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
