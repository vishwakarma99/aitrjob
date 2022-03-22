@include("layouts.webheader")
		<!-- Content -->

		<div class="page-content">

			<!-- Section Banner -->
			<div class="dez-bnr-inr dez-bnr-inr-md " style="background-image:url('{{ asset('web-assets/images/main-slider/Group 47.png') }}')">

				<div class="container">

					<div class="dez-bnr-inr-entry align-m text-white">

						<div class=" job-search-form">

							<h2 class="text-center">www.aitrjobs.com</h2>

							<p> INDIA's NO #1 JOB PORTAL FOR COACHING INDUSTRY</p>

							@include("web.minisearch")	
							<h3>JEE NEET FOUNDATION</h3>
						</div>

					</div>

				</div>

			</div>

			<!-- Section Banner END -->

			<!-- About Us -->

			<div class="section-full job-categories content-inner-2 bg-white"
				style="padding-top: 50px;padding-bottom: 50px;">

				<div class="container">

					<div class="section-head text-center">

						<h2 class="m-b5">Popular Categories</h2>

						<h5 class="fw4">Coaching Industries</h5>

					</div>

					<div class="row sp20">
						@foreach ($categories as $i => $category)
						<div class="col-lg-3 col-md-6 col-6">

							<div class="icon-bx-wraper">

								<div class="icon-content">

									<div class="icon-md text-primary m-b20">
										<img src="{{ URL::asset('../storage/app/'.$category->category_image) }}" alt="">
										
									</div>

									<a href="{{ URL::to('jobcategory/'.$category->category_name) }}" class="dez-tilte">{{$category->category_name}}</a>

									<!-- <p class="m-a0">198 Open Positions</p> -->

									<div class="rotate-icon">
										<!-- <i class="fa fa-database"></i> -->
									</div>

								</div>

							</div>

						</div>
						@endforeach


						<div class="col-lg-12 text-center m-t30">
							<a class="site-button radius-xl" href="{{ URL::to('categories') }}">All Categories</a>
							

						</div>

					</div>

				</div>

			</div>

			<!-- About Us END -->

			<!-- Our Job -->

			<div class="section-full bg-white content-inner-2" style="padding-top: 50px;padding-bottom: 50px;">

				<div class="container">

					<div class="d-flex job-title-bx section-head">

						<div class="mr-auto">

							<h2 class="m-b5">Recent Jobs</h2>

							<!-- <h6 class="fw4 m-b0">20+ Recently Added Jobs</h6> -->

						</div>

						<!-- <div class="align-self-end">
							<h3 class="m-b5">Highlighted Jobs</h3>
						</div> -->
					</div>

					<div class="row">

						<div class="col-lg-9">
							@if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

							<ul class="post-job-bx">

								@foreach ($RecentJobs as $i => $jobs)
								
								<li class="recent-jobs">

									<div class="post-bx">

										<div class="d-flex m-b30">

											{{--<div class="job-post-company">

												<a href="javascript:void(0);"><span>

														<img alt="" src="{{ asset('web-assets/images/logo/icon1.png') }}" />

													</span></a>

											</div>--}}

											<div class="job-post-info">

												<h4><a href="{{ URL::to('job-details/'.$jobs->job_id) }}">{{$jobs->job_title}}</a></h4>
								

												<ul>

													<li><i class="fa fa-map-marker"></i> {{$jobs->job_state}}, {{$jobs->job_city}}</li>
													<li><i class="fa fa-th-large"></i> {{$jobs->job_industry}}</li>


													<li><i class="fa fa-rupee"></i> {{$jobs->min_salary}}-{{$jobs->max_salary}} Years</li>


												</ul>
												<ul style="    padding: 20px 0px 10px 0px;">
													<li><i class="fa fa-bookmark-o"></i> {{$jobs->job_type}}</li>

													<li><i class="ti-shield"></i>{{$jobs->work_exp_from}}-{{$jobs->work_exp_to}} Experience</li>
													<li><i class="fa fa-clock-o"></i> 
														{{date("d M Y", strtotime($jobs->created_at))}}
													</li>
												</ul>

											</div>
											<div class="salary-bx" style="margin-left: auto;align-self: self-end;" >
												<a class="site-button text-white applyforjob" data-item="{{ $jobs->job_id }}" style="color: white;">Apply This Job</a>
											</div>

										</div>

										{{--<div class="d-flex">
											<div class="job-time mr-auto">
											<a href="javascript:void(0);"><span>Full Time</span></a>
											</div>
											@if(session()->get('Auth_Role_AirtrJobs') == 1)
											<div class="salary-bx">
												<a class="site-button text-white applyforjob" data-item="{{ $jobs->job_id }}" style="color: white;">Apply This Job</a>
											</div>
											@endif
										</div>--}}
										
										@if(Session::get('Auth_Uid_AirtrJobs'))
								            <button class="job_favorite like-btn favor" data-item="{{ $jobs->job_id }}">
								                @if($jobs->favourite_status == 1)
								                	<i class="iconify fillheart" data-icon="mdi:heart"></i>
								                @else
								                    <i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>
								                @endif
								            </button>
								        @else 
								            <button class="job_favorite favor" data-item="{{ $jobs->job_id }}">
								                <i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>
								            </button>
								        @endif

										{{--<label class="like-btn">

											<input type="checkbox">

											<span class="checkmark"></span>

										</label>--}}

									</div>

								</li>
								@endforeach
							</ul>
							<div id="pagination-container-jobs"></div>
							
						</div>

						<div class="col-lg-3">
							<style>
								@media (max-width: 991px) {
									.download_link {
										display: none;
									}
								}
							</style>
							<div class="sticky-top">
								<div class="candidates-are-sys m-b30 download_link">
									<div class="candidates-bx">
										<div class="testimonial-text" style="margin-bottom: 0px;">
											<h5><a href="#">Search Jobs on the Go!</a>
											</h5>
											<p>Download our App aitrjobs.com for free and search jobs </p>
											<div class="form-group">
												<input type="text" class="form-control"
													placeholder="Enter Mobile Number">
											</div>
											<p><a href="#" class="btn button btn-primary btn-md">
													Send me Download link</a></p>
										</div>
									</div>
								</div>

								<h3 class="m-b5" style="margin: 10px 0px 23px 0px;">Highlighted Jobs</h3>
								@foreach ($HighlightJobs as $i => $jobs)
								<div class="candidates-are-sys m-b30">

									<div class="candidates-bx">


										<div class="testimonial-text" style="margin-bottom: 0px;">
											<h5><a href="{{ URL::to('job-details/'.$jobs->job_id) }}">{{$jobs->job_title}}</a></h5>
											<style>
												.testimonial-text ul li i {
													color: #ce2a12;
												}
											</style>
											<ul class="job-facts list-unstyled clearfix">

												<li style="padding: 4px 0px 4px 0px;"><i class="fa fa-map-marker"></i>
													{{$jobs->job_state}}, {{$jobs->job_city}}</li>
												<li style="padding: 4px 0px 4px 0px;"><i class="fa ti-shield"></i> {{$jobs->work_exp_from}}-{{$jobs->work_exp_to}} Experience</li>
												<li style="padding: 4px 0px 4px 0px;"> <i class="fa fa-clock-o"></i>
														{{date("d M Y", strtotime($jobs->created_at))}}
													</li>
												<li style="padding: 4px 0px 4px 0px;"><i class="fa fa-th-large"></i>
													{{$jobs->job_industry}}</li>
												<li style="padding: 4px 0px 4px 0px;"><i class="fa fa-rupee"></i> {{$jobs->min_salary}}-{{$jobs->max_salary}} Years</li>
												
											</ul>
											
											<div class="salary-bx">
												<p style="text-align: right;">
													<a data-item="{{ $jobs->job_id }}" style="color: white;" 
													class="btn button btn-primary btn-sm applyforjob">
													Apply This Job</a>
												</p>
											</div>
											
											
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- Our Job END -->


			<!-- Call To Action -->

			<div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix"
				style="background-image: url(images/background/bg4.jpg);">

				<div class="container">

					<div class="section-head text-center text-white">

						<h2 class="m-b5">Testimonials</h2>

						<h5 class="fw4">Few words from candidates</h5>

					</div>

					<div class="blog-carousel-center owl-carousel owl-none">
						@foreach ($testimonials as $i => $testimonial)
						<div class="item">

							<div class="testimonial-5">

								<div class="testimonial-text">

									<p>{{$testimonial->review}}</p>

								</div>

								<div class="testimonial-detail clearfix">

									{{--<div class="testimonial-pic radius shadow">

										<img src="{{ asset('web-assets/images/testimonials/pic1.jpg') }}" width="100" height="100" alt="">

									</div>--}}

									<strong class="testimonial-name">{{$testimonial->name}}</strong>

									<span class="testimonial-position">{{$testimonial->profession}}</span>

								</div>

							</div>

						</div>
						@endforeach
						
					</div>

				</div>

			</div>

			<!-- Call To Action END -->



			<!-- Our Latest Blog -->

			<div class="section-full content-inner-2 overlay-white-middle">

				<div class="container">
					<style>
						.owl-next,
						.owl-prev {
							display: none;
						}
					</style>
					<div class="section-head text-center">

						<h2 class="m-b5">Our Partners</h2>

					</div>


					<div
						class="blog-carousel owl-carousel owl-carousel-partner owl-btn-center-lr owl-btn-3 owl-theme owl-btn-center-lr owl-btn-1">

						<div class="item">

							<img src="{{ asset('web-assets/images/logo 1.jpg') }}">

						</div>

						<div class="item">

							<img src="{{ asset('web-assets/images/logo 2.jpg') }}">

						</div>

						<div class="item">

							<img src="{{ asset('web-assets/images/logo 1.jpg') }}">
						</div>

						<div class="item">
							<div class="item">

								<img src="{{ asset('web-assets/images/logo 4.jpg') }}">

							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- Our Latest Blog -->



			<!-- download app -->
			<div class="section-full content-inner bg-gray">
				<div class="container">
					
					<div class="row">
						<div class="col-sm-12 col-md-5 col-lg-5 p-lr0">
							<img src="{{ asset('web-assets/images/mobile-app.jpg') }}">

						</div>
						<!-- margin-bottom: 8px; -->
						<div class="col-sm-12 col-md-6 col-lg-6 p-lr0">
							<h2>Available on Store</h2>
							<p>‘A great job searching app at last!’</p>
							<div style="color:#2e55fa; font-size: 17px;padding: 0px 0px 18px 0px;" class="star1">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<p style="margin-bottom: 8px;"><svg xmlns="http://www.w3.org/2000/svg" width="24"
									height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round"
									class="feather feather-check fea icon-sm text-danger mr-1">
									<polyline points="20 6 9 17 4 12"></polyline>
								</svg>Get instant job notifications</p>
							<p style="margin-bottom: 8px;"><svg xmlns="http://www.w3.org/2000/svg" width="24"
									height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round"
									class="feather feather-check fea icon-sm text-danger mr-1">
									<polyline points="20 6 9 17 4 12"></polyline>
								</svg>Save jobs & searches</p>
							<p>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="feather feather-check fea icon-sm text-danger mr-1">
									<polyline points="20 6 9 17 4 12"></polyline>
								</svg>Appy direct from the job app
							</p>


							<h4 style="color: #cf2b13;margin: 40px 0px 36px 0px;">Download the job app Now</h4>

							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<a href="#" target="_blank">
										<img src="{{ asset('web-assets/images/icon-google-play.png') }}" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">

									<a href="#" target="_blank">
										<img src="{{ asset('web-assets/images/Apple-App-Store-Icon.png') }}" class="img-responsive">
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- end download app -->

		</div>

		<!-- Content End -->

		<!-- Modal Box -->

		<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

					<div class="modal-body row m-a0 clearfix">

						<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0"
							style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">

							<div class="form-info text-white align-self-center">

								<h3 class="m-b15">Login To You Now</h3>

								<p class="m-b15">Aitrjobs provide faculties of JEE Mains-Advanced, NEET,Foundation &
									Board level faculty with pool of all coaching owner and school director of PAN INDIA
									with 15,000 faculty member.</p>

								<ul class="list-inline m-a0">

									<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>

									<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>

									<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>

									<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>

									<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>

								</ul>

							</div>

						</div>

						<div class="col-lg-6 col-md-6 p-a0">

							<div class="lead-form browse-job text-left">

								<form>

									<h3 class="m-t0">Personal Details</h3>

									<div class="form-group">

										<input value="" class="form-control" placeholder="Name" />

									</div>

									<div class="form-group">

										<input value="" class="form-control" placeholder="Mobile Number" />

									</div>

									<div class="clearfix">

										<button type="button" class="btn-primary site-button btn-block">Submit </button>

									</div>

								</form>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Modal Box End -->

@include("layouts.webfooter")