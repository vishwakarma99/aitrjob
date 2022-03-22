@include("layouts.webheader")
    <!-- Content -->

    <div class="page-content">

        <!-- inner page banner -->

        <div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image:url(images/banner/bnr1.jpg);">

            <div class="container">

                <div class="row">

					<div class="col-lg-8 col-md-7 candidate-info">

						<div class="candidate-detail">

							<div class="canditate-des text-center">
                                @php
                                    $profileimage = '';
                                    if(isset($userData['personal_details']->profile_image)){

                                        $profileimage = $userData['personal_details']->profile_image;
                                    }
                                @endphp
                                <a href="javascript:void(0);">
                                    <img alt="" id="profileImg" name="profileImg" src="{{ URL::asset('../storage/app/'.$profileimage) }}">

                                </a>
								<div class="upload-link" title="update" data-toggle="tooltip" data-placement="right">
								<form class="needs-validation" method="post" enctype="multipart/form-data" id="imageForm">
									<input type="file" id="profile_image" name="profile_image" class="update-flie">
								</form>
									<i class="fa fa-camera"></i>

								</div>

							</div>
                            
							<div class="text-white browse-job text-left">
                            
								<h4 class="m-b0">{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}

									{{--<a class="m-l15 font-16 text-white" data-toggle="modal" data-target="#profilename" href="#"><i class="fa fa-pencil"></i></a>--}}

								</h4>

								<p class="m-b15">{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}</p>

								<ul class="clearfix">

									{{--<li><i class="ti-location-pin"></i> Sacramento, California</li>--}}

									<li><i class="ti-mobile"></i> {{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}} </li>


									<li><i class="ti-email"></i> {{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}</li>

									<li><i class="ti-briefcase"></i> {{ (isset($userData['work_history']->work_status) ? $userData['work_history']->work_status : null)}}</li>
								</ul>

								<div class="progress-box m-t10">

									<div class="progress-info">Profile Strength (Average)<span> {{$profile_percent}}%</span></div>

									<div class="progress">

										<div class="progress-bar bg-primary" style="width: {{$profile_percent}}%" role="progressbar"></div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="col-lg-4 col-md-5">
						@if($profile_percent != 100)
						<a href="javascript:void(0);">

							<div class="pending-info text-white p-a25">

								<h5>Pending Action</h5>

								<ul class="list-check secondry">
                                    @if($dataCount['personal_details'] == 0)
                                        <li>Add Personal details</li>
                                    @endif
                                    @if($dataCount['education_details'] == 0)
                                        <li>Add Educational details</li>
                                    @endif
                                    @if($dataCount['work_details'] == 0)
                                        <li>Add Work History details</li>
                                    @endif
                                    @if($dataCount['media_details'] == 0)
                                        <li>Add Social Media links</li>
                                    @endif
                                    @if($dataCount['document_details'] == 0)
                                        <li>Add Resume</li>
                                    @endif
								</ul>

							</div>

						</a>
						@endif

					</div>

				</div>

            </div>

			<!-- Modal -->

			<div class="modal fade browse-job modal-bx-info editor" id="profilename" tabindex="-1" role="dialog" aria-labelledby="ProfilenameModalLongTitle" aria-hidden="true">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<h5 class="modal-title" id="ProfilenameModalLongTitle">Basic Details</h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

							</button>

						</div>

						<div class="modal-body">

							<form>

								<div class="row">

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<label>Your Name</label>

											<input type="email" class="form-control" placeholder="Enter Your Name">

										</div>

									</div>

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<div class="row">

												<div class="col-lg-6 col-md-6 col-sm-6 col-6">

													<div class="custom-control custom-radio">

														<input type="radio" class="custom-control-input" id="fresher" name="example1">

														<label class="custom-control-label" for="fresher">Fresher</label>

													</div>

												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-6">

													<div class="custom-control custom-radio">

														<input type="radio" class="custom-control-input" id="experienced" name="example1">

														<label class="custom-control-label" for="experienced">Experienced</label>

													</div>

												</div>

											</div>

										</div>

									</div>

									<div class="col-lg-6 col-md-6">

										<div class="form-group">

											<label>Select Your Country</label>

											<select>

												<option>India</option>

												<option>Australia</option>

												<option>Bahrain</option>

												<option>China</option>

												<option>Dubai</option>

												<option>France</option>

												<option>Germany</option>

												<option>Hong Kong</option>

												<option>Kuwait</option>

											</select>

										</div>

									</div>

									<div class="col-lg-6 col-md-6">

										<div class="form-group">

											<label>Select Your Country</label>

											<input type="text" class="form-control" placeholder="Select Your Country">

										</div>

									</div>

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<label>Select Your City</label>

											<input type="text" class="form-control" placeholder="Select Your City">

										</div>

									</div>

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<label>Telephone Number</label>

											<div class="row">

												<div class="col-lg-4 col-md-4 col-sm-4 col-4">

													<input type="text" class="form-control" placeholder="Country Code">

												</div>

												<div class="col-lg-4 col-md-4 col-sm-4 col-4">

													<input type="text" class="form-control" placeholder="Area Code">

												</div>

												<div class="col-lg-4 col-md-4 col-sm-4 col-4">

													<input type="text" class="form-control" placeholder="Phone Number">

												</div>

											</div>

										</div>

									</div>

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<label>Email Address</label>

											<h6 class="m-a0 font-14">info@example.com</h6>

											<a href="#">Change Email Address</a>

										</div>		

									</div>		

								</div>

							</form>

						</div>

						<div class="modal-footer">

							<button type="button" class="site-button" data-dismiss="modal">Cancel</button>

							<button type="button" class="site-button">Save</button>

						</div>

					</div>

				</div>

			</div>

			<!-- Modal End -->

        </div>

        <!-- inner page banner END -->

		<!-- contact area -->

        <div class="content-block">

			<!-- Browse Jobs -->

			<div class="section-full browse-job content-inner-2">

				<div class="container">

					<div class="row">

						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 m-b30">

							<div class="sticky-top bg-white">

								<div class="candidate-info onepage">

									<ul>
										<li><a class="scroll-bar nav-link" href="#personal_details_bx">

											<span>Personal Details</span></a></li>

										<li><a class="scroll-bar nav-link" href="#educational_details_bx">

											<span>Educational Details</span></a></li>
										
										<li><a class="scroll-bar nav-link" href="#employment_bx">

											<span>Employment</span></a></li>

										<li><a class="scroll-bar nav-link" href="#accomplishments_bx">

											<span>Accomplishments</span></a></li>

										
										<li><a class="scroll-bar nav-link" href="#attach_resume_bx">

											<span>Attach Resume</span></a></li>			
											
										<li><a class="scroll-bar nav-link" href="#attach_certificates_bx">

											<span>Attach Certificate</span></a></li>			
										
										<li><a class="scroll-bar nav-link" href="#attach_video_bx">

											<span>Attach Video</span></a></li>			
										
									</ul>

								</div>

							</div>

						</div>

						<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

                            <div id="personal_details_bx" class="job-bx bg-white m-b30">

								<div class="d-flex">

									<h5 class="m-b30">Personal Details</h5>

									<a href="{{ URL::to('profile.html/1') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>

								</div>

								<!-- Details -->

								<div class="row">

									<div class="col-lg-6 col-md-6 col-sm-6">

										<div class="clearfix m-b20">

											<label class="m-b0">Date of Birth</label>

											@php
												if(isset($userData['personal_details']->dob)){
													$date = date('d M Y',strtotime($userData['personal_details']->dob));
												}else{
													$date = null;
												}
											@endphp
											
											<span class="clearfix font-13">{{$date}}</span>

										</div>

									</div>

									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">

											<label class="m-b0">Profession</label>

											<span class="clearfix font-13">{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}</span>

										</div>

									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">

											<label class="m-b0">Skills</label>

											<span class="clearfix font-13">{{isset($userData['personal_details']->skills) ? $userData['personal_details']->skills : null}}</span>

										</div>

									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">

											<label class="m-b0">About</label>

											<span class="clearfix font-13">{{isset($userData['personal_details']->about_me) ? $userData['personal_details']->about_me : null}}</span>

										</div>

									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">

											<label class="m-b0">Desired Location</label>

											<span class="clearfix font-13">{{isset($userData['personal_details']->desired_location) ? $userData['personal_details']->desired_location : null}}</span>

										</div>

									</div>

								</div>

								<!-- Details End -->

							</div>
							<div id="educational_details_bx" class="job-bx bg-white m-b30">

								<div class="d-flex">

									<h5 class="m-b30">Educational Details</h5>

									<a href="{{ URL::to('profile.html/3') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>


								</div>

								<!-- Details -->

								<div class="row">
									@foreach ($userData['educational_details'] as $i => $education)
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="clearfix m-b20">

												<label class="m-b0">{{isset($education->qualification) ? $education->qualification : null}}</label>

												<span class="clearfix font-13">{{isset($education->university) ? $education->university : null}}</span>

											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="clearfix m-b20">

												<label class="m-b0">{{isset($education->passout_yr) ? $education->passout_yr : null}}</label>

												<span class="clearfix font-13">{{isset($education->marks) ? $education->marks : null}}%</span>

											</div>
										</div>
									</div>

									</div>
									
									@endforeach
								</div>

								<!-- Details End -->

							</div>
							<div id="employment_bx" class="job-bx bg-white m-b30 ">

								<div class="d-flex">

									<h5 class="m-b15">Employment</h5>

									<a href="{{ URL::to('profile.html/2') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>


								</div>

								<h6 class="font-14 m-b0">{{isset($userData['work_history']->name_of_company) ? $userData['work_history']->name_of_company : null}}</h6>

								<p class="m-b0">{{isset($userData['work_history']->industry_type) ? $userData['work_history']->industry_type : null}} , {{isset($userData['work_history']->functional_area) ? $userData['work_history']->functional_area : null}}</p>

								<p class="m-b0">{{isset($userData['work_history']->annual_salary) ? $userData['work_history']->annual_salary : null}}</p>

								<p class="m-b0">{{isset($userData['work_history']->achivements) ? $userData['work_history']->achivements : null}}</p>
							</div>

							<div id="accomplishments_bx" class="job-bx bg-white m-b30">

								<h5 class="m-b10">Accomplishments</h5>

								<div class="list-row">

									<div class="list-line">

										<div class="d-flex">

											<h6 class="font-14 m-b5">Online Profile</h6>

											<a href="{{ URL::to('profile.html/4') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>


										</div>

										<p class="m-b0">Add link to Online profiles (e.g. Linkedin, Facebook etc.).</p>
										
										<h5 class="font-14 m-b5 d-flex">Facebook url : <p style="margin: 0"> {{ isset($userData['other_details']->facebook_url) ? $userData['other_details']->facebook_url : null}}</p></h5>
										<h5 class="font-14 m-b5 d-flex">Youtube url : <p style="margin: 0"> {{ isset($userData['other_details']->youtube_url) ? $userData['other_details']->youtube_url : null}}</p></h5>
										<h5 class="font-14 m-b5 d-flex">Twitter url : <p style="margin: 0"> {{ isset($userData['other_details']->twitter_url) ? $userData['other_details']->twitter_url : null}}</p></h5>
										<h5 class="font-14 m-b5 d-flex">LinkedIn url : <p style="margin: 0"> {{ isset($userData['other_details']->linkedin_url) ? $userData['other_details']->linkedin_url : null}}</p></h5>
										
									</div>

								</div>

							</div>
								<div id="attach_resume_bx" class="job-bx bg-white m-b30">
									<div class="d-flex">

										<h5 class="m-b10">Attach Resume</h5>
								
										<a href="{{ URL::to('profile.html/5') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>

									</div>
								
								<p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
								
								


								<h5 class="font-14 m-b5 d-flex">Link of Resume : <p  style="font-weight: 400; margin: 2px 5px;"> {{ isset($userData['upload_resume']->link_of_resume) ? $userData['upload_resume']->link_of_resume : null}}</p></h5>

							</div>
							<div id="attach_certificates_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">

									<h5 class="m-b10">Attach Certificates</h5>
							
									<a href="{{ URL::to('profile.html/6') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>

								</div>
                                <p>Add details of Certification you have filed.</p>								
							</div>
							<div id="attach_video_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">

									<h5 class="m-b10">Attach Video</h5>
							    
									<a href="{{ URL::to('profile.html/7') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>

								</div>
                                
                                @php
                                    $video = '';
                                    if($userData['upload_video_link'] != '' && $userData['upload_video_link']->link_of_video != ''){
                                        $video = $userData['upload_video_link']->upload_video;
                                    }
                                @endphp
                                @if($video != '')
                                <video width="400" controls>
                                    <source id="videoUpload" src="{{ asset('../storage/app/'.$video) }}" type="video/mp4">
                                </video>
                                @endif
								<h5 class="font-14 m-b5 d-flex">Link of Video : <p  style="font-weight: 400; margin: 2px 5px;"> {{ isset($userData['upload_video']->link_of_video) ? $userData['upload_video']->link_of_video : null}}</p></h5>

							</div>
							
							
						</div>

					</div>

				</div>

			</div>

            <!-- Browse Jobs END -->

		</div>

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

									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>

									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>

									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>

									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>

									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>

								</ul>

							</div>

						</div>

						<div class="col-lg-6 col-md-6 p-a0">

							<div class="lead-form browse-job text-left">

								<form>

									<h3 class="m-t0">Personal Details</h3>

									<div class="form-group">

										<input type="text" value="" class="form-control" placeholder="E-Mail Address"/>

									</div>	

									<div class="form-group">

										<input type="password" value="" class="form-control" placeholder="Password"/>

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
