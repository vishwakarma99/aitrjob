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

                                        <h5 class="font-weight-700 pull-left text-uppercase">{{$JobMaster->job_title}}</h5>

                                        <a href="{{ URL::to('manage-jobs') }}"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                        <h5 class="m-b0"><a>Candidates</a></h5>
                                        </div>
                                    </div>
                                    <br>
                                    <ul class="post-job-bx browse-job-grid post-resume row">
                                        {{--<li class="col-lg-12 col-md-12">
                                            <h5 class="m-b0"><a href="{{ URL::to('job-details/'.$job->job_id) }}">Company</a></h5>
                                            <br>

                                            <div class="post-bx">


                                                <div class="d-flex m-b20">

                                                    <div class="job-post-info">

                                                        <h5 class="m-b0"><a href="{{ URL::to('manage-jobs') }}">{{$JobMaster->company_name}}</a>
                                                        </h5>

                                                        <p class="m-b5 font-13">

                                                            <a href="javascript:void(0);" class="text-primary"><i
                                                                    class="fa fa-suitcase"></i> {{$JobMaster->job_title}}</a>
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </li>--}}
                                            
                                        @foreach($Jobs as $key => $job)
                                        <li class="col-lg-6 col-md-6 recent-jobs">
                                            

                                            <div class="post-bx">

                                                <div class="d-flex m-b20">

                                                    <div class="job-post-info">

                                                        <h5 class="m-b0"><a href="{{ URL::to('job-details/'.$job->job_id) }}">{{$job->full_name}}</a>
                                                        </h5>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <p>Status</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$job->job_status}}</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>Schedule Test</p>
                                                            </div>
                                                            @php
                                                                if(isset($job->schedule_for)){
                                                                    $date = date('d M Y',strtotime($job->schedule_for));
                                                                }else{
                                                                    $date = null;
                                                                }
                                                            @endphp
                                                            <div class="col-lg-6">
                                                                <p>{{$date}}</p>
                                                            </div>
                                                            @php
                                                                $online_test = '';
                                                                if($job->online_test == 1){
                                                                    $online_test = 'Yes';
                                                                }
                                                            @endphp
                                                            <div class="col-lg-6">
                                                                <p>Online Test</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$online_test}}</p>
                                                            </div>
                                                            @php
                                                                $offline_test = '';
                                                                if($job->offline_test == 1){
                                                                    $offline_test = 'Yes';
                                                                }
                                                            @endphp
                                                            <div class="col-lg-6">
                                                                <p>Offline Test</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$offline_test}}</p>
                                                            </div>
                                                            @php
                                                                if(isset($job->interview_by)){
                                                                    $date = date('d M Y',strtotime($job->interview_by));
                                                                }else{
                                                                    $date = null;
                                                                }
                                                            @endphp
                                                            <div class="col-lg-6">
                                                                <p>Interview By</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$job->interview_by}}</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>Joining Date</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$job->joining_date}}</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>Phone Number</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$job->mobile_number}}</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>Email</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{$job->email}}</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <a href="{{ URL::to('applicant-profile/'.$job->job_id.'/'.$job->user_id) }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Details</a>
                                                        {{--<a href="{{ URL::to('profile.html/1') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Schedule Test</a>--}}
                                                    </div>

                                                </div>

                                            </div>

                                        </li>
                                        @endforeach

                                    </ul>
                                    <div id="pagination-container-jobs"></div>

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