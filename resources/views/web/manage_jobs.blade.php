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

							<div class="job-bx clearfix">

								<div class="job-bx-title clearfix">

									<h5 class="font-weight-700 pull-left text-uppercase">Manage jobs</h5>

									{{--<div class="float-right">

										<span class="select-title">Sort by freshness</span>

										<select>

											<option>All</option>

											<option>None</option>

											<option>Read</option>

											<option>Unread</option>

											<option>Starred</option>

											<option>Unstarred</option>

										</select>

									</div>--}}

								</div>

								<table class="table-job-bx cv-manager company-manage-job" id="myTable">

									<thead>

										<tr>

											{{--<th class="feature">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" id="check12" class="custom-control-input selectAllCheckBox" name="example1">

													<label class="custom-control-label" for="check12"></label>

												</div>

											</th>--}}

											<th>#</th>
											<th>Job Title</th>

											<th>Applications</th>

											<th>Status</th>
											
											<th>Date</th>

											{{--<th>Applicants</th>--}}

											<th>Action</th>

										</tr>

									</thead>
									@php
									$iii = 1;
									@endphp
									<tbody class="post-job-bx">
										@foreach ($Jobs as $i => $job)
										<tr class="recent-jobs">

											<td class="feature">
												{{$iii}}
												{{--<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="check1" name="example1">

													<label class="custom-control-label" for="check1"></label>

												</div>--}}

											</td>
					
											<td class="job-name">

												<a href="javascript:void(0);">{{$job->job_title}}</a>

												<ul class="job-post-info">

													<li><i class="fa fa-map-marker"></i> {{$job->job_state}}, {{$job->job_city}}</li>

													<li><i class="fa fa-bookmark-o"></i> {{$job->job_type}}</li>

													<li><i class="fa fa-filter"></i>{{$job->job_industry}}</li>

												</ul>

											</td>

											<td class="application text-primary">
												<a href="{{ URL::to('applicants-profiles/'.$job->job_m_id) }}">({{$job->applicant_count}}) Applications</a>	
											</td>

											<td class="expired pending">{{$job->job_status}} </td>
											@php
                                                if(isset($job->created_at)){
                                                    $date = date('d M Y',strtotime($job->created_at));
                                                }else{
                                                    $date = null;
                                                }
                                            @endphp
											<td class="expired pending">{{$date}} </td>
											{{--<td>
												<a href="{{ URL::to('applicants-profiles/'.$job->job_m_id) }}">Hired</a>
												<a href="{{ URL::to('pending-profiles/'.$job->job_m_id) }}">Pending</a>
											</td>--}}
											<td class="job-links">
												<a href="{{ URL::to('job-details/'.$job->job_m_id) }}"><i class="fa fa-eye"></i></a>
												<a href="{{ URL::to('deletejobpost/'.$job->job_m_id) }}"><i class="ti-trash"></i></a>

											</td>

										</tr>
										@php 
											$iii++
										@endphp
										@endforeach
										
									</tbody>

								</table>
									<div id="pagination-container-jobs"></div>

								
								</div>

								<!-- Modal -->

								<div class="modal fade modal-bx-info" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

									<div class="modal-dialog" role="document">

										<div class="modal-content">

											<div class="modal-header">

												<div class="logo-img">

													<img alt="" src="images/logo/icon2.png">

												</div>

												<h5 class="modal-title">Company Name</h5>

												<button type="button" class="close" data-dismiss="modal" aria-label="Close">

													<span aria-hidden="true">&times;</span>

												</button>

											</div>

											<div class="modal-body">

												<ul>

													<li><strong>Job Title :</strong><p> Web Developer – PHP, HTML, CSS </p></li>

													<li><strong>Experience :</strong><p>5 Year 3 Months</p></li>

													<li><strong>Deseription :</strong>

														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since.</p></li>

												</ul>

											</div>

											<div class="modal-footer">

												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											</div>

										</div>

									</div>

								</div>

								<!-- Modal End -->

							</div>

						</div>

					</div>

				</div>

			</div>

            <!-- Browse Jobs END -->

		</div>

    </div>

    <!-- Content END-->

	<!-- Modal Box -->

	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

				<div class="modal-body row m-a0 clearfix">

					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">

						<div class="form-info text-white align-self-center">

							<h3 class="m-b15">Login To You Now</h3>

							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>

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

									<input value="" class="form-control" placeholder="Name"/>

								</div>	

								<div class="form-group">

									<input value="" class="form-control" placeholder="Mobile Number"/>

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