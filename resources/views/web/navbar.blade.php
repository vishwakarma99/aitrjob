
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

						<div class="extra-nav">

							<div class="extra-cell">

								<a href="{{ URL::to('signup') }}" class="site-button"> job seeker</a>

								<a href="#"> <i class="fa fa-bell" aria-hidden="true" style="font-size: 30px;
									margin: 0px 10px 0px 18px;"></i> </a>
								<a href="#"> <i class="fa fa-envelope" aria-hidden="true"
										style="font-size: 30px;margin: 0px 10px 0px 18px;"></i> </a>
							</div>

						</div>

						<!-- main nav -->

						<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">

							<ul class="nav navbar-nav">
								<li class="active">
									<a href="{{ URL::to('/') }}">Home <i class="fa fa-chevron"></i></a>
								</li>
								<li>
									<a href="{{ URL::to('posted-jobs') }}">Jobs </a>
								</li>
								<li>
									<a href="{{ URL::to('companies') }}">Companies <i class="fa fa-chevron"></i></a>
								</li>
								<li>
									<a href="{{ URL::to('signup') }}">Employer </a>
								</li>
								<li>
									<a href="{{ URL::to('blogs') }}">Blog <i class="fa fa-chevron"></i></a>
								</li>
								{{--<li>
									<a href="#">Subjects <i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="Acadamic_Faculty.html" class="dez-page">
												Acadamic Faculty<span class="new-page">New</span></a></li>

										<li><a href="NTSE-Olympiard.html" class="dez-page">
												NTSE-Olympiard
												<span class="new-page">New</span></a></li>
									</ul>
								</li>--}}
							</ul>

						</div>

					</div>

				</div>

			</div>

			<!-- main header END -->

		</header>

		<!-- header END -->