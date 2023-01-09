 @extends("frontend.homepage.layout-trang-trong")

 @section("load-du-lieu")
 <!-- preloader area start -->
 <div id="preloader">
     <div class="loader"></div>
 </div>
 <!-- preloader area end -->
 <!-- login area start -->
 <div class="login-area">
     <div class="container">
         <div class="login-box ptb--100">
             <form method="post">
                 @csrf
                 @if($errors->any())
                 <div class="alert alert-danger alert-dismissible">Vui lòng kiểm tra lại dữ liệu nhập vào</div>
                 @endif
                 <div class="login-form-head">
                     <h4>Sign up</h4>
                     <p>Hello there, Sign up and Join with Us</p>
                 </div>

                 <div class="login-form-body">
                     <div class="form-gp">
                         <label for="name">Full Name</label>
                         <input type="text" name="name" required>
                         <i class="ti-user"></i>
                         @error('name')
                         <div class="text-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-gp">
                         <label for="email">Email address</label>
                         <input type="email" name="email" required>
                         <i class="ti-email"></i>
                         @error('email')
                         <div class="text-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-gp">
                         <label for="email">Phone</label>
                         <input type="number" name="phone" required>
                         <i class="ti-phone"></i>
                         @error('phone')
                         <div class="text-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-gp">
                         <label for="email">Address</label>
                         <input type="text" name="address" required>
                         <i class="ti-address"></i>
                         <div class="text-danger"></div>
                     </div>
                     <div class="form-gp">
                         <label for="password">Password</label>
                         <input type="password" name="password" required>
                         <i class="ti-lock"></i>
                         @error('password')
                         <div class="text-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-gp">
                         <label for="remember_token">Confirm Password</label>
                         <input type="password" name="remember_token" required>
                         <i class="ti-lock"></i>
                         @error('password')
                         <div class="text-danger">{{$message}}</div>
                         @enderror
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
                         <p class="text-muted">Don't have an account? <a href="{{ url('customer/login')}}">Sign in</a></p>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- login area end -->
 @endsection
 @section("title")
 <h5>Register Page</h5>
 @endsection
