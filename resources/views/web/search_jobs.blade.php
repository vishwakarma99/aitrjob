@include("layouts.webheader")
	<!-- Content -->

		<div class="page-content bg-white">

			<!-- inner page banner -->

			<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">

				<div class="container">

					<div class="dez-bnr-inr-entry">

						<h1 class="text-white">Jobs Search</h1>

						<!-- Breadcrumb row -->

						<div class="breadcrumb-row">

							<ul class="list-inline">

								<li><a href="#">Airt Jobs</a></li>

								<li>Jobs List</li>

							</ul>

						</div>

						<!-- Breadcrumb row END -->

					</div>

				</div>

			</div>

			<!-- inner page banner END -->

			@include("web.search")

			<!-- contact area -->

			<div class="content-block">

				<!-- Browse Jobs -->

				<div class="section-full browse-job p-b50">

					<div class="container">

						<div class="row">

							<div class="col-xl-9 col-lg-8 col-md-7">

								<div class="job-bx-title clearfix">

									<h5 class="font-weight-700 pull-left text-uppercase">{{count($Jobs)}} Jobs Found</h5>

								</div>

								<ul class="post-job-bx">
									
									@foreach ($Jobs as $i => $jobs)
									<li class="recent-jobs">

										<div class="post-bx">

											<div class="d-flex m-b30">

											{{--	<div class="job-post-company">

													<a href="javascript:void(0);"><span>

															<img alt="" src="images/logo/icon1.png" />

														</span></a>

												</div>--}}

												<div class="job-post-info">

													<h4><a href="{{ URL::to('job-details/'.$jobs->job_id) }}">{{$jobs->job_title}}</a></h4>
													<p>{{$jobs->company_name}}</p>

													<ul>

														<li><i class="fa fa-map-marker"></i> {{$jobs->job_state}}, {{$jobs->job_city}}</li>
														<li><i class="fa fa-th-large"></i> {{$jobs->job_industry}}</li>


														<li><i class="fa fa-rupee"></i> {{$jobs->min_salary}}-{{$jobs->max_salary}} Years</li>


													</ul>
													<ul style="    padding: 20px 0px 10px 0px;">
														<li><i class="fa fa-bookmark-o"></i> {{$jobs->job_type}}</li>

														<li><i class="ti-shield"></i>{{$jobs->work_exp_from}}-{{$jobs->work_exp_to}} Experience</li>
														{{--<li><i class="fa fa-clock-o"></i> Published 11 months ago</li>--}}
													</ul>

												</div>
												<div class="salary-bx" style="margin-left: auto;align-self: self-end;" >
													<a class="site-button text-white applyforjob" data-item="{{ $jobs->job_id }}" style="color: white;">Apply This Job</a>
												</div>

											

											</div>

											
											@if(Session::get('Auth_Uid_AirtrJobs'))
									            <button class="job_favorite like-btn favor" data-item="{{ $jobs->job_id }}">
									                @if($jobs->favourite_status == 1)
									                	<i class="iconify fillheart" data-icon="mdi:heart"></i>
									                @else
									                    <i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>
									                @endif
									            </button>
									        @else
									            <button class="job_favorite like-btn favor" data-item="{{ $jobs->job_id }}">
									                <i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>
									            </button>
									        @endif

										</div>

									</li>
									@endforeach
								</ul>

								<div id="pagination-container-jobs"></div>

							</div>

							@include("web.sidebar")

						</div>

					</div>

				</div>

				<!-- Browse Jobs END -->

			</div>

		</div>

		<!-- Content END-->

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

								<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting
									industry has been the industry.</p>

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