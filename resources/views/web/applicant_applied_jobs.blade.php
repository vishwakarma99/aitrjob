@include("layouts.webheader")
		<!-- Content -->

		<div class="page-content bg-white">

			<!-- contact area -->

			<div class="content-block">

				<!-- Browse Jobs -->

				<div class="section-full bg-white p-t50 p-b20">

					<div class="container">

						<div class="row">

							@include("web.applicantsidebar")

							<div class="col-xl-9 col-lg-8 m-b30">

								<div class="job-bx-title clearfix">

									<!-- <h5 class="font-weight-700 pull-left text-uppercase">2269 Jobs Found</h5> -->

									
								</div>

								<ul class="post-job-bx browse-job">
									@foreach ($Jobs as $i => $job)
									<li>

										<div class="post-bx">

											<div class="job-post-info m-a0">
												
												<h4><a href="{{ URL::to('job-details/'.$job->job_id) }}">{{$job->job_title}} ({{$job->job_type}})</a></h4>

												<ul>

													<li><a href="{{ URL::to('manage-jobs') }}">{{$job->company_name}}</a></li>

													<li><i class="fa fa-map-marker"></i>{{$job->job_state}}-{{$job->job_city}}</li>
													
													<!-- <li><i class="fa fa-money"></i> 25,000</li> -->

												</ul>
												<br>
												<form class="needs-validation" method="post" action="{{ URL::to('updateJobSchedule') }}">
                                    		    @csrf
                                    		    	@php
                                    		    	    $minDate = date("Y-m-d");
	                                    		    	if(isset($job->schedule_for)){
	                                                        $date = date('Y-m-d',strtotime($job->schedule_for));
	                                                    }else{
	                                                        $date = null;
	                                                    }
                                    		    	@endphp
                                    				<input type="hidden" name="uid" id="auth" value="{{ Session::get('Auth_Uid_AirtrJobs') }}">
													<div class="row">
														<div class="col-lg-3">
															<input type="hidden" value="{{$job->job_id}}" name="job_id" class="form-control"  />
															
															<input type="date" value="{{$date}}" class="form-control" min="{{$minDate}}" name="schedule_date" placeholder="Name" required />
														</div>
													</div>
													<div class="row pl-3 pt-3">
														<div class="col-lg-4 col-md-4">
                                                            <div class="form-group">
                                                                <input type="radio" id="customRadioInline3" name="test_status" class="form-check-input" value="Online" {{ (isset($job->online_test) && $job->online_test == '1' ? "checked" : '') }}>

                                                                <label class="form-check-label" for="test_status">Online Test</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="form-group">
	                                                            <input type="radio" id="customRadioInline4" name="test_status" class="form-check-input" value="Offline" {{ (isset($job->offline_test) && $job->offline_test == '1' ? "checked" : '') }}} required>
	                                                            <label class="form-check-label" for="test_status">Offline Test</label>
	                                                        </div>
														</div>
														@if(isset($job->offline_test) && $job->offline_test == '1'))
															<h6>Your Offline test Schedule for {{$date}}</h6>
														@elseif(isset($job->online_test) && $job->online_test == '1'))
															<h6>Your Online test Schedule for {{$date}}</h6>
														@endif
													</div>
													<div class="row">
														<div class="col-lg-3 mt-2">
															<button type="submit" class="site-button add-btn button-sm"> Schedule Test</button>
														</div>
														
													</div>
														
														
													
												</form>


												
											</div>

										</div>

									</li>
									@endforeach


								</ul>

								<!-- <div class="pagination-bx m-t30">

								<ul class="pagination">

									<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>

									<li class="active"><a href="javascript:void(0);">1</a></li>

									<li><a href="javascript:void(0);">2</a></li>

									<li><a href="javascript:void(0);">3</a></li>

									<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>

								</ul>

							</div> -->

							</div>

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