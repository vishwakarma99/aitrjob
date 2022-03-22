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

                        $profileImg = session()->get('Auth_Profile_AirtrJobs');
                    @endphp
                    
                    <a  href="javascript:void(0);">
                        <img alt="" id="profileImg" name="profileImg" src="{{ URL::asset('../storage/app/'.$profileImg) }}">

                    </a>

                    <div class="upload-link" title="update" data-toggle="tooltip" data-placement="right">
                            <form class="needs-validation" method="post" enctype="multipart/form-data" id="imageForm">
                                <input type="file" id="profile_image" name="profile_image" class="update-flie">
                            </form>
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

                <li><a href="{{ URL::to('myProfile') }}">

                        <i class="fa fa-user-o" aria-hidden="true"></i>

                        <span>My Profile </span></a></li>
                        
                <li><a href="{{ URL::to('myprofile.html') }}">

                        <i class="fa fa-user-o" aria-hidden="true"></i>

                        <span>Profile Details</span></a></li>

                <li><a href="{{ URL::to('myplan') }}">

                        <i class="fa fa-pencil" aria-hidden="true"></i>

                        <span>Subscription Packages</span></a></li>
                @if(session()->get('Auth_Role_AirtrJobs') == 1)
                <li><a href="{{ URL::to('saved-jobs') }}">

                        <i class="fa fa-heart-o" aria-hidden="true"></i>

                        <span>Saved Jobs</span></a></li>
                <li><a href="{{ URL::to('recommended-jobs') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Recommended Jobs</span></a></li>

                <li><a href="{{ URL::to('applied-jobs') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Applied Jobs</span></a></li>

                @elseif (session()->get('Auth_Role_AirtrJobs') == 2)
                <li><a href="{{ URL::to('post-new-job') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Post a Job</span></a></li>

                {{--<li><a href="{{ URL::to('applied-jobs') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Applied Jobs</span></a></li>--}}
                <li><a href="{{ URL::to('manage-jobs') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Manage Jobs</span></a></li>
                                        
                {{--<li><a href="{{ URL::to('hired-profiles') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Hired Profiles</span></a></li>

                <li><a href="{{ URL::to('pending-profiles') }}">

                        <i class="fa fa-briefcase" aria-hidden="true"></i>

                        <span>Pending Profiles</span></a></li>--}}
                @endif
                {{--<li><a href="{{ URL::to('profile.html/1') }}">

                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span>Add Personal Details</span></a></li>

                <li><a href="{{ URL::to('profile.html/2') }}">

                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span>Add Work History</span></a></li>

                <li><a href="{{ URL::to('profile.html/3') }}">

                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span>Add Educational Details</span></a></li>

                <li><a href="{{ URL::to('profile.html/4') }}">

                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span>Add Other Details</span></a></li>

                <li><a href="{{ URL::to('profile.html/5') }}">

                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span>Add Resume</span></a></li>--}}

                {{--<li><a href="jobs-change-password.html">

                        <i class="fa fa-key" aria-hidden="true"></i>

                        <span>Change Password</span></a></li>--}}

                <li><a href="{{ URL::to('logout') }}">

                        <i class="fa fa-sign-out" aria-hidden="true"></i>

                        <span>Log Out</span></a></li>

            </ul>

        </div>

    </div>

</div>