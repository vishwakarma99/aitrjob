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

							<div class="job-bx submit-resume">
								@if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif


								<div class="job-bx-title clearfix">

									<h5 class="font-weight-700 pull-left text-uppercase">Post A Job</h5>

									<a href="{{ URL::to('myProfile') }}" class="site-button right-arrow button-sm float-right">Back</a>

								</div>

								 <form class="needs-validation" method="post" id="idNewJobPostForm" name="idNewJobPostForm">
                                        @csrf

									<div class="row">

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job Title</label>
												<input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter Job Title">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job describtiption</label>
												<input type="text" id="job_desc" name="job_desc" class="form-control" placeholder="Enter Job describtiption">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Job Skill</label>

												<input type="text" id="job_skill" name="job_skill" class="form-control tags_input"placeholder="Enter Skills" value=""/>

											</div>

										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job Category</label>
												<select id="category" name="category" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($categories as $i => $category)
                                                        <option data-id="{{$category->id}}" value="{{$category->category_name}}">{{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Experience</label>

												<select id="work_experiance" name="work_experiance" class="form-control"  >
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_experiance as $i => $experiance)
                                                    <option value="{{$experiance->experiance_from}}-{{$experiance->experiance_to}}">{{$experiance->experiance_from}}-{{$experiance->experiance_to}}</option>
                                                    @endforeach
                                                </select>
											</div>

										</div>

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Current vacancy number</label>
												<input type="text" id="current_vacancy" name="current_vacancy" class="form-control" placeholder="Enter numbers">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>State</label>
												<select id="state" name="state" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($states as $i => $state)
                                                        <option data-id="{{$state->id}}" value="{{$state->state}}">{{$state->state}}</option>
                                                        @endforeach
                                                    </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>City</label>
												
												<select id="city" name="city" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        {{--@foreach ($cities as $i => $city)
                                                        <option data-id="{{$city->id}}" value="{{$city->city}}">{{$city->city}}</option>
                                                        @endforeach--}}
                                                    </select>

											</div>
										</div>
										

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Location your hiring for</label>
												<input type="text" id="location_name" name="location_name" class="form-control tags_input" value="" placeholder="Enter Location" />

											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Company hiring for</label>
												<input type="text" id="company_hiring_for" name="company_hiring_for" class="form-control" placeholder="Enter comapny Hiring for">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job Industry </label>
												<select id="industry_type" name="industry_type" class="form-control">
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_industry as $i => $industry)
                                                    <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}">{{$industry->job_industry_name}}</option>
                                                    @endforeach
                                                </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job functional area</label>
												<select id="p-functional_area" name="functional_area" class="form-control"  >
                                                    <option value="">Please select an option</option>
                                                </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Role of job</label>
												<input type="text" id="job_role" name="job_role" class="form-control" placeholder="Enter the role hiring for">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job type</label>
												<select id="job_type" name="job_type" class="form-control"  >
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_type as $i => $type)
                                                    <option data-id="{{$type->id}}" value="{{$type->job_type_name}}">{{$type->job_type_name}}</option>
                                                    @endforeach
                                                
                                                </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Education required</label>
												<select id="education_required" name="education_required" class="form-control"  >
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_education as $i => $education)
                                                    <option value="{{$education->educational_name}}">{{$education->educational_name}}</option>
                                                    @endforeach
                                                
                                                </select>
											</div>
										</div>




										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Annual Salary ($):</label>

												<select id="annual_salary" name="annual_salary" class="form-control"  >
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_salary as $i => $salary)
                                                    <option value="{{$salary->job_min_salary}}-{{$salary->job_max_salary}}">{{$salary->job_min_salary}}-{{$salary->job_max_salary}}</option>
                                                    @endforeach
                                                </select>

											</div>

										</div>

										<div class="col-lg-12 col-md-12">

											<div class="form-group">

												<label>Describe about candidate profile</label>

												<input type="text" id="candidate_pofile_desc" name="candidate_pofile_desc" class="form-control" placeholder="" required>

											</div>

										</div>
										
										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Job Payment</label>

												<select id="job_payment" name="job_payment" class="selectpicker form-control"  required="required">
                                                    <option value="">Please select an option</option>
                                                    @foreach ($job_pay as $i => $pay)
                                                    <option value="{{$pay->payment_method}}">{{$pay->payment_method}}</option>
                                                    @endforeach
                                                </select>

											</div>

										</div>
										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Job Live</label>

												<input type="text" id="job_live" name="job_live" class="form-control" placeholder="Number of days your post remains live">

											</div>

										</div>
										
										<div class="col-lg-6 col-md-6">

											<div class="form-group">

												<label>Link to Job</label>

												<input type="text" id="job_link" name="job_link" class="form-control" placeholder="Company Website">

											</div>

										</div>
										

									</div>

									<button type="button" id="idNewJobPostFormBtn" name="idNewJobPostFormBtn" class="site-button m-b30">Upload</button>

								</form>

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
	<script type="text/javascript">

    $('#idNewJobPostFormBtn').click(function() {
        $('span.error_msg').remove();
        
        var data = new FormData($('#idNewJobPostForm')[0]);

        var job_title = $('#job_title').val();
        if(job_title == ''){
            alert('Please enter job title');
            return false;
        }
        var job_desc = $('#job_desc').val();
        if(job_desc == ''){
            alert('Please enter job description');
            return false;
        }
        var job_skill = $('#job_skill').val();
        if(job_skill == ''){
            alert('Please Enter Skills');
            return false;
        }

        var category = $('#category').val();
        if(category == ''){
            alert('Please select Category');
            return false;
        }

        var work_experiance = $('#work_experiance').val();
        if(work_experiance == ''){
            alert('Please select work experiance');
            return false;
        }

        var current_vacancy = $('#current_vacancy').val();
        if(current_vacancy == ''){
            alert('Please enter current vacancy');
            return false;
        }

        var state = $('#state').val();
        if(state == ''){
            alert('Please select State');
            return false;
        }
		
		var city = $('#city').val();
        if(city == ''){
            alert('Please select City');
            return false;
        }

		var location_name = $('#location_name').val();
        if(location_name == ''){
            alert('Please Enter Location');
            return false;
        }

		var company_hiring_for = $('#company_hiring_for').val();
        if(company_hiring_for == ''){
            alert('Please Enter Company Hiring For');
            return false;
        }

        var industry_type = $('#industry_type').val();
        if(industry_type == ''){
            alert('Please select industry type');
            return false;
        }

        var functional_area = $('#p-functional_area').val();
        if(functional_area == ''){
            alert('Please select functional area');
            return false;
        }

        
        var education_required = $('#education_required').val();
        if(education_required == ''){
            alert('Please select Education Required');
            return false;
        }

        var annual_salary = $('#annual_salary').val();
        if(annual_salary == ''){
            alert('Please select Annual Salary');
            return false;
        }

        var candidate_pofile_desc = $('#candidate_pofile_desc').val();
        if(candidate_pofile_desc == ''){
            alert('Please Enter candidate pofile desc');
            return false;
        }

        var job_payment = $('#job_payment').val();
        if(job_payment == ''){
            alert('Please select Job payment');
            return false;
        }

        var job_live = $('#job_live').val();
        if(job_live == ''){
            alert('Please Enter Number of Days Job Live');
            return false;
        }


        $.ajax({
            url: '/addNewJobPost',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            async: false,
            datatype: 'JSON',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            }
        });
    });


</script>