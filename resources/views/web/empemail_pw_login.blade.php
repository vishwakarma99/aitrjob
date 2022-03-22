<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="keywords" content="" />

	<meta name="author" content="" />

	<meta name="robots" content="" />

	<meta name="description" content="Aitrjobs" />

	<meta property="og:title" content="Aitrjobs" />

	<meta property="og:description" content="Aitrjobs" />

	<meta property="og:image" content="Aitrjobs" />

	<meta name="format-detection" content="telephone=no">



	<!-- FAVICONS ICON -->

	<link rel="icon" href="{{ asset('/web-assets/images/favicon.ico')}}" type="image/x-icon" />

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/web-assets/images/favicon.png')}}" />


	<!-- PAGE TITLE HERE -->

	<title>Aitrjobs</title>



	<!-- MOBILE SPECIFIC -->

	<meta name="viewport" content="width=device-width, initial-scale=1">



	<!--[if lt IE 9]>

	<script src="js/html5shiv.min.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->

<meta name="csrf-token" content="{{ csrf_token() }}" />	

	<!-- STYLESHEETS -->

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/plugins.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/templete.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/simplePagination.css')}}">

	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/skin/skin-1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('logintesting/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('logintesting/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

</head>
<script>
    var App_URL = {!! json_encode(url('/')) !!}
</script>
<style type="text/css">
	
		.or_line1 {
			position: absolute;
			width: 8%;
			height: 2px;
			background: #6f6f6f;
			border-radius: 4px;
			margin: 13px 0px 0px -150px;
		}

		.or_line2 {
			position: absolute;
			width: 8%;
			height: 2px;
			background: #6f6f6f;
			border-radius: 4px;
			margin: 13px 0px 0px 28px;
		}

		.site-button {
			border-radius: 10px;
		}

		.m-b30 {
			margin-bottom: 30px;
			margin-top: 20px;
		}

		.signup_insocail {
			background: #FDFDFD;
			border: 1px solid #676767;
			box-sizing: border-box;
			box-shadow: 0px 4px 4px rgb(232 232 232 / 25%);
			border-radius: 5px;
			padding: 8px 10px;
			text-align: center;
		}
		
		.hrtext{
            display:flex;
            align-items:center;
        }
        .hrbefore,.hrafter{
            flex:auto;
        }
        .hrcontent{
            text-align:center;
        }
								
</style>
<body id="bg">

	<div class="page-wrapoer">

		<div id="loading-area"></div>

		<!-- Content -->

		<div class="browse-job login-style3">

			<!-- Coming Soon -->

			<div class="bg-img-fix " style="background-image:url('{{ asset('web-assets/images/background/registration.png') }}'); height: 100vh;">

				<div class="row">
					<div class="col-md-12 m-b30">
						<div class="p-a30 job-bx max-w500 radius-sm bg-white m-auto" style="text-align: right;">
							<a class="text-right text-dark" href="{{ URL::to('/emp_signup') }}">X <i class="fa fa-chevron"></i></a>
							<div class="tab-content">
								<form class="tab-pane active" id="emailLoginForm" method="post">
                                    @csrf
									<div class="logo">
										<a href="#"><img style=" display: block;
										margin: 0 auto;" src="{{ asset('web-assets/images/logo.png') }}" alt=""></a>
									</div>
									<h3 class="m-b10 text-center">Employer Login</h3>
									@if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
							
									<div class="form-group">
										<input id="hidden" name="role" required="" class="form-control" type="hidden" value="2">
										<input id="email" name="email" class="form-control"
											placeholder="Enter your email" type="email" required>
										<span class="field_error" id="email_error" style="text-align: left;display: block;"></span>
									</div>
                                    
                                    <div class="form-group">
										<input id="password" name="password" class="form-control"
											placeholder="Enter your password" type="password" onclick="showpw(idShowPassword)" required>
										<span class="field_error" id="password_error" style="text-align: left;display: block;"></span>
									</div>
									<div style="display: flex;margin-left: 20px;" class="form-group">
									    <div style="display: flex;"><input type="checkbox" class="form-check-input" id="idShowPassword" onclick="showpw(idShowPassword)">show</div>
                                        
                                        									
									<a style="margin-left: auto;"  href="{{ url('forget-password') }}">
                                        <small style="font-size: 14px;">Forgot Password?</small>
                                    </a>

                                    </div>

									<div class="text-center">
										<button type="button" id="emailSubmit" class="site-button">Sign In</button>
									</div>
									    
									<div class="hrtext">
                                          <div class="hrbefore">
                                            <hr>
                                          </div>
                                          <div class="hrcontent">
                                            <h5>OR</h5>
                                          </div>
                                          <div class="hrafter">
                                            <hr>
                                          </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="javascript:;" id="facebookLogin" class="btn-face m-b-20">
                						<i class="fa fa-facebook-official"></i>
                						Facebook
                    					</a>
                    
                    					<a href="javascript:;" id="googleLogin" class="btn-google m-b-20">
                    						<img src="{{ url('logintesting/images/icons/icon-google.png')}}" alt="GOOGLE">
                    						Google
                    					</a>
    
                                    </div>
									
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Full Blog Page Contant -->

		</div>

		<!-- Content END-->

	</div>

	<!-- JAVASCRIPT FILES ========================================= -->

	<script src="{{ asset('web-assets/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script><!-- FORM JS -->

	<script src="{{ asset('web-assets/plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->

	<script src="{{ asset('web-assets/plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->

	<script src="{{ asset('web-assets/plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->

	<script src="{{ asset('web-assets/plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->

	<script src="{{ asset('web-assets/plugins/masonry/masonry-3.1.4.js') }}"></script><!-- MASONRY -->

	<script src="{{ asset('web-assets/plugins/masonry/masonry.filter.js') }}"></script><!-- MASONRY -->

	<script src="{{ asset('web-assets/plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->

	<script src="{{ asset('web-assets/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ asset('web-assets/js/jquery.simplePagination.js') }}"></script><!-- CUSTOM FUCTIONS  -->

	<script src="{{ asset('web-assets/js/dz.carousel.js') }}"></script><!-- SORTCODE FUCTIONS  -->

	<script src="{{ asset('web-assets/js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->
	
	<script src="{{ asset('web-assets/plugins/scroll/scrollbar.min.js') }}"></script><!-- PARTICLES  -->

    <!-- Firebase files -->
	<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

	<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

	<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

	<!-- Add Firebase products that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>

	<script type="text/javascript" src="{{ url('logintesting/js/firebase-conf.js') }}"></script>

    <script type="text/javascript" src="{{ url('logintesting/js/facebook-emp.js') }}"></script>
	

	<!-- google provider -->
	<script type="text/javascript" src="{{ url('logintesting/js/google-emp.js') }}"></script>

	<!-- phone number -->
	<script type="text/javascript" src="{{ url('logintesting/js/phone.js') }}"></script>
	
	<!-- mail -->
	<script type="text/javascript" src="{{ url('logintesting/js/mail-emp.js') }}"></script>
		
	<script>

		jQuery(document).ready(function () {

			jQuery('.winHeight').css('height', $(window).height());

		});
		
		function showpw(idShowPassword)
        {
            if(!idShowPassword.checked)
            {
                document.getElementById("password").setAttribute("type", "password") ;
            }
            else
            {
                document.getElementById("password").setAttribute("type", "text") ;
            }
        }
    
		
	</script>

</body>

</html>