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

	<meta name="csrf-token" content="{{ csrf_token() }}" />	

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
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/plugins.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/pnotify.custom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/pnotify.custom.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/templete.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/simplePagination.css')}}">

	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('/web-assets/css/skin/skin-1.css')}}">

	<link type="text/css" rel="stylesheet" href="{{ asset('/web-assets/css/firebase-ui-auth.css')}}" />
	
	<script src="{{ asset('web-assets/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->

</head>
<style>
    .jobbtn{
        display: block;
    }
    
    .jobbtnmobile{
        display: none!important;
    }
    
    @media (max-width: 992px){
        .jobbtn{
            display: none;
        }
        
        .jobbtnmobile{
            display: block!important;
        }
    }

</style>
<script>
    var App_URL = {!! json_encode(url('/')) !!}
    
    checkMendatoryData();
    		
	function checkMendatoryData(){
		var sess = "{{Session::get('Auth_Uid_AirtrJobs')}}";
		
		if(sess != ''){
			$.ajax({
			    url: App_URL+"/checkLogin/" + sess,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                	string = response.redirect;
                	
	           		if (response.redirect) {
	           			window.location.href = response.redirect;
				    } 

                },
	    	});	
		}
		
	}
    
</script>

<body id="bg">

	<!-- <div id="loading-area"></div> -->

	<div class="page-wraper">

		<!-- header -->

		<header class="site-header mo-left header fullwidth">

			<!-- main header -->

			<div class="sticky-header main-bar-wraper navbar-expand-lg">

				<div class="main-bar clearfix">

					<div class="container clearfix">

						<!-- website logo -->

						<div class="logo-header mostion">

							<a href="{{ URL::to('/') }}"><img src="{{ asset('web-assets/images/logo.png') }}" class="logo" alt=""></a>

						</div>

						<!-- nav toggle button -->

						<!-- nav toggle button -->

						<button class="navbar-toggler collapsed navicon justify-content-end" type="button"
							data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
							aria-expanded="false" aria-label="Toggle navigation">

							<span></span>

							<span></span>

							<span></span>

						</button>
						<input type="hidden" name="auth" id="auth" value="{{ Session::get('Auth_Uid_AirtrJobs') }}">
						<!-- extra nav -->

						<div class="extra-nav" style="margin-top: 15px;">

							<div class="extra-cell">
                                @if(session()->get('Auth_Role_AitrJobs') == 1)
                                    {{--<a href="{{ URL::to('emp_signup') }}" class="site-button"> Employer</a>--}}
                                    <a href="{{ URL::to('logout') }}" class="site-button"> Logout</a>

								@elseif (session()->get('Auth_Role_AitrJobs') == 2)
									{{--<a href="{{ URL::to('signup') }}" class="site-button"> job seeker</a>--}}
									<a href="{{ URL::to('logout') }}" class="site-button"> Logout</a>
								@else
									<a href="{{ URL::to('signup') }}" class="site-button jobbtn"> job seeker</a>
									
								@endif
								

								{{--<a href="#"> <i class="fa fa-bell" aria-hidden="true" style="font-size: 30px;
									margin: 0px 10px 0px 18px;"></i> </a>
								<a href="#"> <i class="fa fa-envelope" aria-hidden="true"
										style="font-size: 30px;margin: 0px 10px 0px 18px;"></i> </a>--}}
							</div>

						</div>

						<!-- main nav -->

						<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown" style="margin-top: 0px;">

							<ul class="nav navbar-nav">
							    
								@if(session()->get('Auth_Role_AirtrJobs') != 2)
								<li class="{{  request()->is('/') ? 'active' : ''}}">
									<a href="{{ URL::to('/') }}">Home <i class="fa fa-chevron"></i></a>
								</li>
								<li class="{{  request()->is('posted-jobs') ? 'active' : ''}}">
									<a href="{{ URL::to('posted-jobs') }}">Jobs </a>
								</li>
								<li class="{{  request()->is('companies') ? 'active' : ''}}">
									<a href="{{ URL::to('companies') }}">Coachings <i class="fa fa-chevron"></i></a>
								</li>
								@endif
								@if(session()->get('Auth_Role_AirtrJobs') == 1)
                                    <li><a href="#">Dashboard <i class="fa fa-chevron-down"></i></a>
	                                    <ul class="sub-menu">
	                                        <li><a href="{{ URL::to('myProfile') }}" class="dez-page">Profile</a></li>
	                                        <li><a href="{{ URL::to('myprofile.html') }}" class="dez-page">Profile Detail
	                                            </a></li>

	                                            <li><a href="{{ URL::to('saved-jobs') }}" class="dez-page">Saved Jobs
	                                            </a></li>
	                                            {{--<li><a href="" class="dez-page">Recommended Jobs
	                                            </a></li>--}}
	                                            <li><a href="{{ URL::to('applied-jobs') }}" class="dez-page">Applied Jobs
	                                            </a></li>
	                                    </ul>
                                	</li>
								@elseif (session()->get('Auth_Role_AirtrJobs') == 2)
									<li><a href="#">Dashboard <i class="fa fa-chevron-down"></i></a>
	                                    <ul class="sub-menu">
	                                        <li class="{{  request()->is('myProfile') ? 'active' : ''}}"><a href="{{ URL::to('myProfile') }}" class="dez-page">Profile</a></li>
	                                        <li class="{{  request()->is('myprofile.html') ? 'active' : ''}}"><a href="{{ URL::to('myprofile.html') }}" class="dez-page">Profile Detail
	                                            </a></li>
	                                        <li class="{{  request()->is('post-new-job') ? 'active' : ''}}"><a href="{{ URL::to('post-new-job') }}" class="dez-page"> Post New Job</a></li>
	                                        <li class="{{  request()->is('manage-jobs') ? 'active' : ''}}"><a href="{{ URL::to('manage-jobs') }}" class="dez-page">Manage Jobs</a></li>
	                                        {{--<li class="{{  request()->is('companies') ? 'active' : ''}}"><a href="{{ URL::to('hired-profiles') }}" class="dez-page">Hired Profile</a></li>
	                                        <li class="{{  request()->is('companies') ? 'active' : ''}}"><a href="{{ URL::to('pending-profiles') }}" class="dez-page">Pending Profile</a></li>--}}
	                                            
	                                        {{--<li class="{{  request()->is('companies') ? 'active' : ''}}"><a href="employer_change_password.html" class="dez-page">Change Password</a>
	                                        </li>--}}
	                                    </ul>
	                                </li>
								@else
									<li><a href="{{ URL::to('emp_signup') }}">Employer </a></li>
								    <li><a href="{{ URL::to('signup') }}" class="jobbtnmobile" > job seeker</a>
									</li>
								@endif
                            	@if(session()->get('Auth_Role_AirtrJobs') != 2)
								<li {{  request()->is('blogs') ? 'active' : ''}}>
									<a href="{{ URL::to('blogs') }}">Blog <i class="fa fa-chevron"></i></a>
								</li>
								<li>
									<a href="#">Subjects <i class="fa fa-chevron-down"></i></a>
									@php
						            	$categories = \App\Models\categories::get()->take(5);
						        	@endphp
        
									<ul class="sub-menu">
										@foreach ($categories as $i => $category)
										<li><a href="{{ URL::to('jobcategory/'.$category->category_name) }}" class="dez-page">
												{{$category->category_name}}</a></li>
										@endforeach
									</ul>
								</li>
								
								@endif
							</ul>

						</div>

					</div>

				</div>

			</div>

			<!-- main header END -->

		</header>

		<!-- header END -->