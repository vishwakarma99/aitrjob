@include("layouts.webheader")
        <!-- Content -->

        <div class="page-content bg-white">

            <!-- inner page banner -->

            <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">

                <div class="container">

                    <div class="dez-bnr-inr-entry">

                        <h1 class="text-white">Job Detail</h1>

                        <!-- Breadcrumb row -->

                        <div class="breadcrumb-row">

                            <ul class="list-inline">

                                <li><a href="#">AitrJobs</a></li>

                                <li>Job Detail</li>

                            </ul>

                        </div>

                        <!-- Breadcrumb row END -->

                    </div>

                </div>

            </div>

            <!-- inner page banner END -->

            <!-- contact area -->

            <div class="content-block">

                <!-- Job Detail -->

                <div class="section-full content-inner-1">

                    <div class="container">


                        
                        <div class="row">

                            <div class="col-lg-4">

                                <div class="sticky-top">

                                    <div class="row">

                                        <div class="col-lg-12 col-md-6">

                                            <div class="m-b30">

                                                <img src="images/blog/grid/pic1.jpg" alt="">

                                            </div>

                                        </div>

                                        <div class="col-lg-12 col-md-6">

                                            <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">

                                                <h4 class="text-black font-weight-700 p-t10 m-b15">Job Details</h4>

                                                <ul>

                                                    <li><i class="ti-location-pin"></i><strong
                                                            class="font-weight-700 text-black">Company Name</strong><span
                                                            class="text-black-light"> {{$Job->company_name}} </span></li>

                                                    <li><i class="ti-money"></i><strong
                                                            class="font-weight-700 text-black">Salary</strong> INR {{$Job->min_salary}}-{{$Job->max_salary}}  
                                                        Per Year</li>

                                                    <li><i class="ti-shield"></i><strong
                                                            class="font-weight-700 text-black">Experience</strong>{{$Job->work_exp_from}}-{{$Job->work_exp_to}} Year  </li>

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-8">
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
                                <div class="job-info-box">

                                    <h3 class="m-t0 m-b10 font-weight-700 title-head">

                                        <a href="javascript:void(0);" class="text-secondry m-r30">{{$Job->job_title}}</a>

                                    </h3>

                                    <ul class="job-info">

                                        <!-- <li><strong>Education</strong> Web Designer</li>

									<li><strong>Deadline:</strong> 25th January 2018</li> -->

                                        <li style="color: #161c2d"><i class="ti-location-pin text-black m-r5"></i>
                                            {{$Job->location_name}}, {{$Job->job_state}}, {{$Job->job_city}} </li>

                                    </ul>
                                    <p style="    color: #2f55d4 !important;">INR {{$Job->min_salary}}-{{$Job->max_salary}}  
                                                        Per Monthy </p>

                                    @if(session()->get('Auth_Role_AitrJobs') == 1)
                                        <a href="{{ URL::to('applyForJob/'.$Job->job_id) }}" class="site-button" style="    float: right;
                                        margin: -100px 0px 0px 0px;">Apply For Job</a>
                                    @endif


                                    <style>
                                        .job_details_view {
                                            /* padding: 0px 30px; */
                                            display: flex;
                                            flex-wrap: wrap;
                                            column-gap: 20px;
                                        }

                                        .job_details_view .widget {
                                            width: calc(100% / 3 - 20px);
                                            margin-top: 0px !important;
                                            /* padding-bottom: 15px; */
                                        }
                                        body{
                                            color: #161c2d;
                                        }
                                    </style>
                                    <div class="job_details_view">

                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Job Type:</h6>
                                                <p class="text-primary mb-0">{{$Job->job_type}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0"> Location:</h6>
                                                <p class="text-primary mb-0"> {{$Job->location_name }}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Post Date</h6>
                                                <p class="text-primary mb-0">{{date("d M Y", strtotime($Job->created_at))}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Qualifications:</h6>
                                                <p class="text-primary mb-0">{{$Job->education_required}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Job Industry:</h6>
                                                <p class="text-primary mb-0">{{$Job->job_industry}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Job Functional Area:</h6>
                                                <p class="text-primary mb-0">{{$Job->job_functional_area}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Job Skils:</h6>
                                                <p class="text-primary mb-0">{{$Job->job_skill}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Vacancy:</h6>
                                                <p class="text-primary mb-0">{{$Job->current_vacancy}}</p>
                                            </div>
                                        </div>
                                        <div class="media widget align-items-center">
                                            <div class="media-body">
                                                <h6 class="widget-title mb-0">Hiring:</h6>
                                                <p class="text-primary mb-0">{{$Job->company_hiring_for}}</p>
                                            </div>
                                        </div>
                                    </div>

                                

                                    <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>

                                    <h5 class="font-weight-600">Job Description</h5>

                                    <!-- <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div> -->

                                    <p>{{$Job->job_desc}}</p>

                                    {{--<h5 class="font-weight-600">How to Apply</h5>

                                    <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages.</p>

                                    <h5 class="font-weight-600">Job Requirements</h5>

                                    <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>

                                    <ul class="list-num-count no-round">

                                        <li>The DexignZone Privacy Policy was updated on 25 June 2018.</li>

                                        <li>Who We Are and What This Policy Covers</li>

                                        <li>Remaining essentially unchanged It was popularised in the 1960s </li>

                                        <li>Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s,</li>

                                        <li>DexignZone standard dummy text ever since</li>

                                    </ul>--}}

                                    <!-- <a href="jobs-applied-job.html" class="site-button">Apply This Job</a> -->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Job Detail -->

                <!-- Our Jobs -->

                <div class="section-full content-inner">

               
                </div>

                <!-- Our Jobs END -->

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