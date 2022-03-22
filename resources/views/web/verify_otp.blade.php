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



	<!-- STYLESHEETS -->

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/plugins.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/templete.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/simplePagination.css')}}">

	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/skin/skin-1.css')}}">



</head>
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
								
</style>
<body id="bg">

	<div class="page-wraper">

		<div id="loading-area"></div>

		<!-- Content -->

		<div class="browse-job login-style3">

			<!-- Coming Soon -->

			<div class="bg-img-fix " style="background-image:url('{{ asset('web-assets/images/background/registration.png') }}'); height: 100vh;">

				<div class="row">
					<div class="col-md-12 m-b30" style="margin-top: 15%;">
						<div class="p-a30 job-bx max-w500 radius-sm bg-white m-auto">
								@if (Session::has('error'))
                                        <div class="alert alert-success">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
							<div class="tab-content">
								<form class="tab-pane active" method="post" action="{{ URL::to('verify-otp') }}">
                                    @csrf
									<div class="form-group">
										<input id="session_id" name="session_id" class="form-control" type="hidden" value="{{session()->get('Auth_Session_AirtrJobs')}}">
										<input id="mobile_number" name="mobile_number" class="form-control" type="hidden" value="{{session()->get('Auth_Mobile_AirtrJobs')}}">
										<input id="verify_otp" name="verify_otp" required="" class="form-control"
											placeholder="Enter Otp" type="text" required>
									</div>

									<div class="text-center">
										
										<button type="submit" class="site-button">Verify OTP</button>
										<div>
											<a class="text-right" href="{{ URL::to('resend-otp') }}">Resend Otp <i class="fa fa-chevron"></i></a>
										</div>
										<div>
											<a class="text-right" href="{{ URL::to('back') }}">Back <i class="fa fa-chevron"></i></a>
										</div>
										
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

		      <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
      <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
       <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
      <script>
      // Initialize Firebase
      var firebaseConfig = {
        apiKey: "AIzaSyAEL8PadARMivnc9Zn54Nm-EwO_QddPMzM",
  authDomain: "aitrjobs-8beca.firebaseapp.com",
  projectId: "aitrjobs-8beca",
  storageBucket: "aitrjobs-8beca.appspot.com",
  messagingSenderId: "406874745318",
  appId: "1:406874745318:web:e3c179b535e210f33e0e27",
  measurementId: "G-GTEDH54LSF"
      };
      // firebase.initializeApp(config);
      // var facebookProvider = new firebase.auth.FacebookAuthProvider();
      // var googleProvider = new firebase.auth.GoogleAuthProvider();
      // var facebookCallbackLink = '/login/facebook/callback';
      // var googleCallbackLink = '/login/google/callback';
      // async function socialSignin(provider) {
      //   var socialProvider = null;
      //   if (provider == "facebook") {
      //     socialProvider = facebookProvider;
      //     document.getElementById('social-login-form').action = facebookCallbackLink;
      //   } else if (provider == "google") {
      //     socialProvider = googleProvider;
      //     document.getElementById('social-login-form').action = googleCallbackLink;
      //   } else {
      //     return;
      //   }
      //   firebase.auth().signInWithPopup(socialProvider).then(function(result) {
      //     result.user.getIdToken().then(function(result) {
      //       document.getElementById('social-login-tokenId').value = result;
      //       document.getElementById('social-login-form').submit();
      //     });
      //   }).catch(function(error) {
      //     // do error handling
      //     console.log(error);
      //   });
      // }
      </script>

      <script type="text/javascript">
         window.onload=function () {
           render();
         };
         
         function render() {
             window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
             recaptchaVerifier.render();
         }
         
         function phoneSendAuth() {
                
             var number = $("#mobile_number").val();
               
             firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
                   
                 window.confirmationResult=confirmationResult;
                 coderesult=confirmationResult;
                 console.log(coderesult);
         
                 $("#sentSuccess").text("Message Sent Successfully.");
                 $("#sentSuccess").show();
                   
             }).catch(function (error) {
                 $("#error").text(error.message);
                 $("#error").show();
             });
         
         }
         
         function codeverify() {
         
             var code = $("#verificationCode").val();
         
             coderesult.confirm(code).then(function (result) {
                 var user=result.user;
                 
                 $("#successRegsiter").text("you are register Successfully.");
                 $("#successRegsiter").show();
         
             }).catch(function (error) {
                 $("#error").text(error.message);
                 $("#error").show();
             });
         }
      </script>

	<script>

		jQuery(document).ready(function () {

			jQuery('.winHeight').css('height', $(window).height());

		});

	</script>

</body>

</html>