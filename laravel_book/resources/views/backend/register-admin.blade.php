<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/png" href="asset('srtdash-admin-dashboard-master/srtdash/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('srtdash-admin-dashboard-master/srtdash/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
  <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="post">
                     @csrf
                     @if($errors->any())
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join with Us</p>
                    </div>
                    
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="name">Full Name</label>
                            <input type="text" name="name">
                            <i class="ti-user"></i>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enerror
                        </div>
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="email" name="email">
                            <i class="ti-email"></i>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enerror
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="remember_token">Confirm Password</label>
                            <input type="password" name="remember_token">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{ url('admin/login')}}">Sign in</a></p>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

     <!-- jquery latest version -->
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/jquery.slicknav.min.js')}}"></script>
    
    <!-- others plugins -->
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/plugins.js')}}"></script>
    <script src="{{asset('srtdash-admin-dashboard-master/srtdash/assets/js/scripts.js')}}"></script>
</body>

</html>