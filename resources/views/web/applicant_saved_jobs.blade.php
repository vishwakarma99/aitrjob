@include("layouts.webheader")
<style>
    .job_favorite svg{
        font-size: 25px;
    }
</style>
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

                                <div class="job-bx save-job table-job-bx clearfix">

                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">{{count($Jobs)}} Saved Jobs</h5>


                                    </div>


                                    <!-- Saved Jobs -->
                                    <style>
                                        .job-box {
                                            margin: 8px 0px 8px 0px;
                                        }
                                        
                                        .like-btn{
                                            top: 0px;
                                        }
                                    </style>
                                    <div class="post-job-bx">
                                        
                                        @foreach ($Jobs as $i => $job)

                                        <div class="card job-box rounded recent-jobs shadow border-0 ">
                                            <div class="card-body ">
                                                <h5 class="mb-0">

                                                    <a href="#" class="text-dark">
                                                        {{$job->job_title}}</a>
                                                        
                                                    <button class="job_favorite like-btn favor" data-item="{{ $job->job_id }}">
        								                @if($job->favourite_status == 1)
        								                	<i class="iconify fillheart" data-icon="mdi:heart"></i>
        								                @else
        								                    <i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>
        								                @endif
        								            </button>
            								        
                                                </h5>

                                                <ul class="job-facts list-unstyled  mt-3">
                                                    <li class="list-inline-item text-muted pr-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-check fea icon-sm text-success mr-1">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg> &nbsp; {{$job->work_exp_from}}-{{$job->work_exp_to}} Year</li>
                                                    <li class="list-inline-item text-muted pr-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-check fea icon-sm text-success mr-1">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg> &nbsp; INR {{$job->min_salary}}-{{$job->max_salary}}  
                                                            Per Year</li>
                                                    <li class="list-inline-item text-muted pr-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-check fea icon-sm text-success mr-1">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg> &nbsp; {{$job->job_state}} <span> </span></li>
                                                    <li class="list-inline-item text-muted pr-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-check fea icon-sm text-success mr-1">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg> {{$job->job_city}} </li>
                                                </ul>
                                                <br>
                                                <div class="list-inline-item text-muted">
                                                    <a href="{{ URL::to('job-details/'.$job->job_id) }}" style="padding: 8px 10px 8px 10px;" class="btn-primary">More
                                                        detail</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <br>
                                    <div id="pagination-container-jobs"></div>

                                </div>

                                <!-- Modal -->

                                <div class="modal fade modal-bx-info" id="exampleModalLong" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <div class="logo-img">

                                                    <img alt="" src="images/logo/icon2.png">

                                                </div>

                                                <h5 class="modal-title">Company Name</h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">

                                                    <span aria-hidden="true">&times;</span>

                                                </button>

                                            </div>

                                            <div class="modal-body">

                                                <ul>

                                                    <li><strong>Job Title :</strong>
                                                        <p> Web Developer – PHP, HTML, CSS </p>
                                                    </li>

                                                    <li><strong>Experience :</strong>
                                                        <p>5 Year 3 Months</p>
                                                    </li>

                                                    <li><strong>Deseription :</strong>

                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry has been the industry's standard dummy
                                                            text ever since.</p>
                                                    </li>

                                                </ul>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- Modal End -->

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