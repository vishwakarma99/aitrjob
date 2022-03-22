<div class="col-xl-3 col-lg-4 col-md-5">

								<div class="sticky-top">

									
									<h6 class="widget-title style-1"> Popular Category</h6>
									<ul class="company-logo-wg sidebar bg-white job-bx m-b30 clearfix">
										@foreach ($categories as $i => $category)
										<li class="brand-logo">

											<a href="javascript:void(0);">
												<img src="{{ URL::asset('../storage/app/'.$category->category_image) }}" alt="">
											</a>

										</li>
										@endforeach

									</ul>
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