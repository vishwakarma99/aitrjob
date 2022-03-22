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

                                            <li><a href="">

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
                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Basic Information</h5>

                                        <a href="index.html"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>

                                    <form class="needs-validation" method="post" action="{{ URL::to('addPersonalDetails') }}">
                                        @csrf
                                        <div class="row m-b30">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Your Name:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}" name="full_name" id="full_name" placeholder="Enter Name" required>

                                                </div>

                                            </div>



                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Email Address:</label>

                                                    <input type="email" class="form-control"
                                                        value="{{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}" name="email" id="email" placeholder="info@example.com" required>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Phone:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}}" name="phone_no" id="phone_no" placeholder="Enter Phone" required>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Date of Birth:</label>

                                                    <input type="date" class="form-control" value="{{isset($userData['personal_details']->dob) ? $userData['personal_details']->dob : null}}" placeholder="" name="dob" id="dob" required>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>About:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->about_me) ? $userData['personal_details']->about_me : null}}" name="about_me" id="about_me" placeholder="About" required>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Profession:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}" placeholder="Profession" name="profession" id="profession" required>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Skills:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->skills) ? $userData['personal_details']->skills : null}}" name="skills" id="skills" placeholder="Skills" required>

                                                </div>

                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Desired Location:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['personal_details']->desired_location) ? $userData['personal_details']->desired_location : null}}" name="desired_location" id="desired_location" placeholder="Location" required>

                                                </div>

                                            </div>
                                           {{-- <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Upload Profile Image</label>
                                                    <div class="custom-file">
                                                        <p class="m-auto align-self-center">
                                                            <i class="fa fa-upload"></i>
                                                            Upload Image
                                                        </p>
                                                        <input type="file" class="site-button form-control"
                                                            id="profile_image" name="profile_image">
                                                    </div>
                                                </div>
                                            </div>--}}
                                        </div>

                                        <button class="site-button m-b30">Save</button>

                                    </form>

                                        <div class="job-bx-title clearfix">

                                            <h5 class="font-weight-700 pull-left text-uppercase">Work History</h5>

                                        </div>
                                    <form class="needs-validation" method="post" action="{{ URL::to('addWorkDetails') }}">
                                        @csrf
                                        <div class="row m-b30">


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Name Of Organisation/Company:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['work_history']->name_of_company) ? $userData['work_history']->name_of_company : null}}" id="name_of_company" name="name_of_company" placeholder="Location" required>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Other Organisation (Optional):</label>

                                                    <input type="text" class="form-control" id="other_company" name="other_company" 
                                                        value="{{isset($userData['work_history']->other_company) ? $userData['work_history']->other_company : null}}" placeholder="Location">

                                                </div>

                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <label>Work Status:</label>
                                                    <div class="row" style="margin: 0 10px;">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <input type="radio" id="customRadioInline3" name="work_status" class="form-check-input" value="Fresher" {{ (isset($userData['work_history']->work_status) && $userData['work_history']->work_status == 'Fresher' ? "checked" : '')}} >

                                                                <label class="form-check-label" for="work_status">Fresher</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                            <input type="radio" id="customRadioInline4" name="work_status" class="form-check-input" value="Experianced" {{ (isset($userData['work_history']->work_status) && $userData['work_history']->work_status == 'Experianced' ? "checked" : '')}}>
                                                            <label class="form-check-label" for="work_status">Experianced</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Director Reference(Optional):</label>

                                                    <input type="text" class="form-control" id="director_reference" name="director_reference" 
                                                        value="{{isset($userData['work_history']->director_reference) ? $userData['work_history']->director_reference : null}}" placeholder="Enter Ref. Number">

                                                </div>

                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label> Job Industry:</label>
                                                    <select id="industry_type" name="industry_type" class="form-control">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_industry as $i => $industry)
                                                        <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}" >{{$industry->job_industry_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('industry_type'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('industry_type') }}
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label> Job Functional Area:</label>

                                                    <select id="p-functional_area" name="functional_area" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        
                                                    </select>
                                                    @if ($errors->has('functional_area'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('functional_area') }}
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Annual Salary:</label>

                                                    <select id="job_salary" name="job_salary" class="form-control" >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_salary as $i => $salary)
                                                        <option value="{{$salary->job_min_salary}}-{{$salary->job_max_salary}}">{{$salary->job_min_salary}}-{{$salary->job_max_salary}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                                <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Date of Joining:</label>

                                                    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining"  value="{{isset($userData['work_history']->date_of_joining) ? $userData['work_history']->date_of_joining : null}}" placeholder="">

                                                </div>

                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Date of Leaving:</label>

                                                    <input type="date" class="form-control" id="date_of_leaving" name="date_of_leaving"  value="{{isset($userData['work_history']->date_of_leaving) ? $userData['work_history']->date_of_leaving : null}}" placeholder="">

                                                </div>

                                            </div>



                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Achievements:</label>

                                                    <input type="text" class="form-control" id="achivements" name="achivements" 
                                                        value="{{isset($userData['work_history']->achivements) ? $userData['work_history']->achivements : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                        </div>
                                        <button class="site-button m-b30">Save</button>
                                    </form>
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Educational Details</h5>
                                        </div>
                                        @if(count($userData['educational_details']) > 0)
                                            @foreach ($userData['educational_details'] as $i => $education)
                                                
                                            <div class="classEducationBlock">
                                            <form>
                                                <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>Qualification:</label>

                                                        <input type="text" class="form-control classQualification" name="qualification[]" id="qualification_1"
                                                            value="{{isset($education->qualification) ? $education->qualification : null}}" placeholder="Enter Qualification">

                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>Year of Pass out:</label>

                                                        <select id="passout_yr_1" name="passout_yr[]" class="form-control classPassoutYear">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($Years as $i => $Year)
                                                            <option value="{{$Year}}" {{$Year == $education->passout_yr ? "selected" : "" }}>{{$Year}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>University/Board Name:</label>

                                                        <input type="text" class="form-control classUniversity" name="university[]" id="university_1"
                                                            value="{{isset($education->university) ? $education->university : null}}" placeholder="Enter University/Board">

                                                    </div>

                                                </div>

                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>Marks:</label>

                                                        <input type="text" class="form-control classMarks" name="marks[]" id="marks_1"
                                                            value="{{isset($education->marks) ? $education->marks : null}}" placeholder="Enter Marks">

                                                    </div>

                                                </div>
                                                <em type="button" class="btn btn-danger classRemoveBtn" id="idRemoveBtnOtherPrice_1" style="display:none" title="Remove"><i class="fa fa-trash"></i></em>
                                                <a type="button" class="btn btn-info classBtnAddAnother" id="idAddNewEducation">Add</a>
                                                
                                            </div>
                                            <button class="site-button m-b30">Save</button>
                                        </form>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="classEducationBlock">
                                        <form>
                                            <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Qualification:</label>

                                                    <input type="text" class="form-control classQualification" name="qualification[]" id="qualification_1"
                                                        value="" placeholder="Enter Qualification">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Year of Pass out:</label>

                                                    <select id="passout_yr_1" name="passout_yr[]" class="form-control classPassoutYear">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($Years as $i => $Year)
                                                        <option value="">{{$Year}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>University/Board Name:</label>

                                                    <input type="text" class="form-control classUniversity" name="university[]" id="university_1"
                                                        value="" placeholder="Enter University/Board">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Marks:</label>

                                                    <input type="text" class="form-control classMarks" name="marks[]" id="marks_1"
                                                        value="" placeholder="Enter Marks">

                                                </div>

                                            </div>
                                            <em type="button" class="btn btn-danger classRemoveBtn" id="idRemoveBtnOtherPrice_1" style="display:none" title="Remove"><i class="fa fa-trash"></i></em>
                                            <a type="button" class="btn btn-info classBtnAddAnother" id="idAddNewEducation">Add</a>
                                            
                                        </div>
                                        <button class="site-button m-b30">Save</button>
                                    </form>
                                        </div>
                                    @endif
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Other Details</h5>
                                        </div>
                                        <form>
                                        <div class="row m-b30">                                        

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Facebook Url:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['other_details']->facebook_url) ? $userData['other_details']->facebook_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Youtube Url:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['other_details']->youtube_url) ? $userData['other_details']->youtube_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Twitter Url:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['other_details']->twitter_url) ? $userData['other_details']->twitter_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>LinkedIn Url:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['other_details']->linkedin_url) ? $userData['other_details']->linkedin_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                        </div>
                                        <button class="site-button m-b30">Save</button>
                                        </form>
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Upload Resume</h5>
                                        </div>
                                        <form>
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Select Updated Resume</label>
                                                    <div class="custom-file">
                                                        <p class="m-auto align-self-center">
                                                            <i class="fa fa-upload"></i>
                                                            Upload Resume
                                                        </p>
                                                        <input type="file" class="site-button form-control"
                                                            id="customFile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Link of Resume:</label>

                                                    <input type="text" class="form-control"
                                                        placeholder="Resume link">

                                                </div>

                                            </div>
                                        </div>
                                            
                                        <button class="site-button m-b30">Save</button>
                                        
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>
@include("layouts.webfooter")