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
								@if (Session::has('error_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('error_message') }}
                                        </div>
                                    @endif
							<div class="tab-content">
								<form class="tab-pane active" method="post" action="{{ URL::to('admin/verify-email-otp') }}">
                                    @csrf
									<div class="form-group">
										<input id="verify_otp" name="verify_otp" required="" class="form-control"
											placeholder="Enter Otp" type="text" required>
									</div>


									<div class="text-center">
										<button type="submit" class="site-button">Verify OTP</button>
										
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

		jQuery(document).ready(function () {

			jQuery('.winHeight').css('height', $(window).height());

		});

	</script>

</body>

</html>