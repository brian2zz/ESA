<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login ESA</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<link rel="stylesheet" type="text/css" href='vendor/bootstrap-select/dist/css/bootstrap-select.min.css'>
<!--===============================================================================================-->

</head>
<body>
    
</div>

	<div class="limiter">  
        <div class="col">
            @if(isset(Auth::user()->username))
                <script>
                    window.location="/index";
                </script>
            @endif
            @if($message = Session::get('error'))
            <div class="container p-t-3">
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    
                            <strong>{{$message}}</strong>
                     
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="fa fa-close"></i></span>
                                      </button>
                  </div>
            </div>
            @endif
            @if(count($errors)>0)
            <div class="container p-t-3">
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    
                        @foreach($errors->all() as $error)
                           <strong>{{$error}}</strong>
                        @endforeach
                    
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="fa fa-close"></i></span>
                                      </button>
                  </div>
            </div>
            @endif

            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        <span class="login100-form-title">
                            Sign In
                        </span>
                    <form method="post" action="/login">
                        {{ csrf_field() }}
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input class="input100" type="password" name="pass" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>
    
                        {{-- <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Forgot
                            </span>
    
                            <a href="#" class="txt2">
                                Username / Password?
                            </a>
                        </div> --}}
    
                        <div class="container-login100-form-btn p-t-40">
                            <button class="login100-form-btn">
                                Sign in
                            </button>
                        </div>
                    </form>
                        <div class="flex-col-c p-t-170 p-b-40">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
	
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>