<!-- Filters Search -->

			<div class="section-full browse-job-find">

				<div class="container">
					
						<div class="find-job-bx">

							<form class="dezPlaceAni" method="get" action="{{ URL::to('filter') }}">
                    			<div class="row">
									
									@if(isset($company_id))
									<input type="hidden" name="company_id" id="company_id" value="{{$company_id}}">
									@endif
									<div class="col-lg-3 col-md-6">

										<div class="form-group">
											<select id="filter_category" name="filter_category" class="filterSearch">
												<option value="">Select Job Category</option>
												@foreach ($categories as $i => $category)
												<option value="{{$category->category_name}}" {{ (isset($filterData['filter_category']) && $filterData['filter_category'] == $category->category_name ? "selected" : '') }}>{{$category->category_name}}</option>
												@endforeach
											</select>

										</div>

									</div>

									<div class="col-lg-3 col-md-6">

										<div class="form-group">
											<select id="filter_industry_type" name="filter_industry_type" class="filterSearch">
												<option value="">Select Industry Type</option>
												@foreach ($job_industry as $i => $industry)
												<option value="{{$industry->job_industry_name}}" {{ (isset($filterData['filter_industry_type']) && $filterData['filter_industry_type'] == $industry->job_industry_name ? "selected" : '') }}>{{$industry->job_industry_name}}</option>
												@endforeach
											</select>

										</div>

									</div>

									<div class="col-lg-3 col-md-6">

										<div class="form-group">

											<select id="filter_job_type" name="filter_job_type" class="filterSearch">

												<option value="">Select Job Type</option>

												@foreach ($job_type as $i => $type)
												<option value="{{$type->job_type_name}}" {{ (isset($filterData['filter_job_type']) && $filterData['filter_job_type'] == $type->job_type_name ? "selected" : '') }}>{{$type->job_type_name}}</option>
												@endforeach
											</select>

										</div>

									</div>
									<div class="col-lg-3 col-md-6">

										<div class="form-group">


											<select id="filter_experiance" name="filter_experiance" class="filterSearch">

												<option value="">Select Experience</option>
												@foreach ($job_experiance as $i => $experiance)
												@php
													$exp = $experiance->experiance_from.'-'.$experiance->experiance_to;
												@endphp
												<option value="{{$experiance->experiance_from}}-{{$experiance->experiance_to}}" {{ (isset($filterData['filter_experiance']) && $filterData['filter_experiance'] == $exp ? "selected" : '') }}>{{$experiance->experiance_from}}-{{$experiance->experiance_to}} Year</option>
												@endforeach
											</select>

										</div>

									</div>
									<div class="col-lg-3 col-md-6">

										<div class="form-group">

											<label></label>

											<select id="filter_salary" name="filter_salary" class="filterSearch">

												<option value="">Select Salary</option>

												@foreach ($job_salary as $i => $salary)
												@php 
													$sal = $salary->job_min_salary.'-'.$salary->job_max_salary;
												@endphp
												<option value="{{$salary->job_min_salary}}-{{$salary->job_max_salary}}" {{ (isset($filterData['filter_salary']) && $filterData['filter_salary'] == $sal ? "selected" : '') }}>{{$salary->job_min_salary}}-{{$salary->job_max_salary}}</option>
												@endforeach
											</select>

										</div>

									</div>
									<div class="col-lg-3 col-md-6">

										<div class="form-group">

											<select id="filter_state" name="filter_state" class="filterSearch">

												<option value=""> Jobs By State</option>

												@foreach ($states as $i => $sta)
												<option value="{{$sta->state}}" {{ (isset($filterData['filter_state']) && $filterData['filter_state'] == $sta->state ? "selected" : '') }}>{{$sta->state}}</option>
												@endforeach
											</select>

										</div>

									</div>
									<div class="col-lg-3 col-md-6">

										<div class="form-group">

											<select id="filter_month" class="filterSearch" name="filter_month">

											<option value="">Sort by freshness</option>

											<option value="60" {{ (isset($filterData['filter_month']) && $filterData['filter_month'] == 60 ? "selected" : '') }} >Last 2 Months</option>

											<option value="30" {{ (isset($filterData['filter_month']) && $filterData['filter_month'] == 30 ? "selected" : '') }} >Last Months</option>

											<option value="7" {{ (isset($filterData['filter_month']) && $filterData['filter_month'] == 7 ? "selected" : '') }} >Last Weeks</option>

											<option value="3" {{ (isset($filterData['filter_month']) && $filterData['filter_month'] == 3 ? "selected" : '') }} >Last 3 Days</option>

										</select>


										</div>

									</div>

									

								</div>

							</form>

						</div>

				</div>

			</div>

			<!-- Filters Search END -->
