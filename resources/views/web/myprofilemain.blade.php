@include("layouts.webheader")
   <div class="page-content bg-white">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full bg-white browse-job p-t50 p-b20">

                    <div class="container">

                        <div class="row">

                            <div class="col-xl-3 col-lg-4 m-b30">

                                <div class="sticky-top">

                                    <div class="candidate-info">

                                        <div class="candidate-detail text-center">

                                            <div class="canditate-des">
                                                @php
                                                    $profileimage = '';
                                                    if(isset($userData['personal_details']->profile_image)){

                                                        $profileimage = $userData['personal_details']->profile_image;
                                                    }
                                                @endphp
                                                <a href="javascript:void(0);">

                                                    <img alt="" src="{{ URL::asset('profile/ToPath/'.$profileimage) }}">

                                                </a>

                                                <div class="upload-link" title="update" data-toggle="tooltip"
                                                    data-placement="right">

                                                    <input type="file" class="update-flie">

                                                    <i class="fa fa-camera"></i>

                                                </div>

                                            </div>

                                            <div class="candidate-title">

                                                <div class="">
                                                    <h4 class="m-b5"><a href="javascript:void(0);">{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}</a></h4>

                                                    <p class="m-b0"><a href="javascript:void(0);">{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}</a></p>

                                                </div>

                                            </div>

                                        </div>

                                        <ul>

                                            <li><a href="jobseeker_myforfile.html">

                                                    <i class="fa fa-user-o" aria-hidden="true"></i>

                                                    <span>My Profile</span></a></li>

                                            <li><a href="jobseeker_profile.html">

                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>

                                                    <span>My Resume</span></a></li>

                                            <li><a href="plan_for_subscription.html">

                                                    <i class="fa fa-pencil" aria-hidden="true"></i>

                                                    <span>Subscription Packages</span></a></li>

                                            <li><a href="jobseeker_saved_jobs.html">

                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>

                                                    <span>Saved Jobs</span></a></li>
                                            <li><a href="recommended_jobs.html">

                                                    <i class="fa fa-briefcase" aria-hidden="true"></i>

                                                    <span>Recommended Jobs</span></a></li>

                                            <li><a href="jobseeker_profile.html">

                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>

                                                    <span>Edit Profile</span></a></li>

                                            <li><a href="jobseeker_applied_jobs.html">

                                                    <i class="fa fa-briefcase" aria-hidden="true"></i>

                                                    <span>Applied Jobs</span></a></li>

                                            <!-- <li><a href="jobs-alerts.html">

                                                    <i class="fa fa-bell-o" aria-hidden="true"></i>

                                                    <span>Job Alerts</span></a></li>

                                            <li><a href="jobs-cv-manager.html">

                                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>

                                                    <span>CV Manager</span></a></li> -->

                                            <li><a href="jobs-change-password.html">

                                                    <i class="fa fa-key" aria-hidden="true"></i>

                                                    <span>Change Password</span></a></li>

                                            <li><a href="index.html">

                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                                                    <span>Log Out</span></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-9 col-lg-8 m-b30">

                                <div class="job-bx job-profile">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    <div class="job-bx-title clearfix" style="border-color: blue;">

                                        <a href="index.html"
                                            class="site-button" style="width: 100%">Back</a>

                                    </div>

                                    
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>
@include("layouts.webfooter")