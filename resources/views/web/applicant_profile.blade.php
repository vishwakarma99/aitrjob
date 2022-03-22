@include("layouts.webheader")

        <!-- Content -->

        <div class="page-content">

            <!-- inner page banner -->

            <div class="overlay-black-dark profile-edit p-t50 p-b20"
                style="background-image:url(images/banner/bnr1.jpg);">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-8 col-md-7 candidate-info">

                            <div class="candidate-detail">
                                @php
                                    $profileimage = '';
                                    if(isset($userData['personal_details']->profile_image)){

                                        $profileimage = $userData['personal_details']->profile_image;
                                    }

                                    $profileImg = session()->get('Auth_Profile_AirtrJobs');
                                @endphp

                                <div class="canditate-des text-center">

                                    <a href="javascript:void(0);">

                                        <img alt="" src="{{ URL::asset('../storage/app/'.$profileImg) }}">

                                    </a>

                                    <div class="upload-link" title="update" data-toggle="tooltip"
                                        data-placement="right">

                                        <input type="file" class="update-flie">

                                        <i class="fa fa-camera"></i>

                                    </div>

                                </div>

                                <div class="text-white browse-job text-left">

                                    <h4 class="m-b0">{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}

                                    </h4>

                                    <!-- <p class="m-b15">Freelance Senior PHP Developer at various agencies</p> -->

                                    <ul class="clearfix">

                                        {{--<li><i class="ti-location-pin"></i> Maharashtra </li>--}}

                                        <li><i class="ti-mobile"></i> {{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}}</li>

                                        {{--<li><i class="fa fa-globe"></i> 1993-01-08</li>--}}

                                        <li><i class="ti-email"></i>{{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}</li>

                                    </ul>

                                    <div class="progress-box m-t10">
                                        <!-- 
									<div class="progress-info">Profile Strength (Average)<span>70%</span></div>

									<div class="progress">

										<div class="progress-bar bg-primary" style="width: 80%" role="progressbar"></div>

									</div> -->

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-5">
                         
                          
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="clearfix m-b20">
                                        {{--<a href="" class="site-button" style="background: #ED893E;">Send message </a>--}}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="clearfix m-b20">
                                        {{--<a href="" class="site-button" style="background: #6A9457;"><i class="fa fa-share"></i> Share</a>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-8">
                                    <h5 class="text-white">Update Job Status</h5>
                                    <input type="hidden" value="{{$userData['user_details']->uid}}" class="form-control" id="user_id" placeholder="Name" />
                                    <input type="hidden" value="{{$job_id}}" class="form-control" id="job_id" placeholder="Name" />
                                    <select class="form-control" id="applicantStatus" name="applicantStatus" value="">
                                        <option value="">Select Option</option>
                                        <option value="under_review" {{$jobStatus == "under_review" ? "selected" : "" }}>Under Review</option>
                                        <option value="shortlist" {{$jobStatus == "shortlist" ? "selected" : "" }}>ShortList</option>
                                        <option value="hired" {{$jobStatus == "hired" ? "selected" : "" }}>Hired</option>
                                        <option value="reject" {{$jobStatus == "reject" ? "selected" : "" }}>Reject</option>
                                    </select>
                                </div>
                                {{--<div class="col-md-3">
                                    <p style="
                                    color: #E65239;">Reject</p>
                                </div>--}}
                            </div>
                            
                        </div>

                    </div>

                </div>

                <!-- Modal -->

                <div class="modal fade browse-job modal-bx-info editor" id="profilename" tabindex="-1" role="dialog"
                    aria-labelledby="ProfilenameModalLongTitle" aria-hidden="true">

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

                                                            <input type="radio" class="custom-control-input"
                                                                id="fresher" name="example1">

                                                            <label class="custom-control-label"
                                                                for="fresher">Fresher</label>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" class="custom-control-input"
                                                                id="experienced" name="example1">

                                                            <label class="custom-control-label"
                                                                for="experienced">Experienced</label>

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

                                                <input type="text" class="form-control"
                                                    placeholder="Select Your Country">

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

                                                        <input type="text" class="form-control"
                                                            placeholder="Country Code">

                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">

                                                        <input type="text" class="form-control" placeholder="Area Code">

                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">

                                                        <input type="text" class="form-control"
                                                            placeholder="Phone Number">

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


                                          
                                            <li><a class="scroll-bar nav-link" href="#key_skills_bx">

                                                    <span>Work Area</span></a></li>

                                            <li><a class="scroll-bar nav-link" href="#employment_bx">

                                                    <span>Other Details</span></a></li>
                                            
                                            <li><a class="scroll-bar nav-link" href="#certificates_bx">

                                                    <span>Certificates</span></a></li>
                                            
                                            <li><a class="scroll-bar nav-link" href="#videos_bx">

                                                    <span>Video</span></a></li>


                                            <li><a class="scroll-bar nav-link" href="#it_skills_bx">

                                                    <span>Education</span></a></li>

                                           
                                            <li><a class="scroll-bar nav-link" href="#personal_details_bx">

                                                    <span>Basic Info</span></a></li>
  
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

                                <div id="" class="job-bx bg-white m-b30">

                                    <div class="d-flex">

                                        <h5 class="m-b30">Schedule Test</h5>

                                    </div>

                                    <div class="row">
                                        <form class="needs-validation" method="post" action="{{ URL::to('updateJobSchedule') }}">
                                                @csrf
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <input type="hidden" value="{{$userData['user_details']->uid}}" name="uid" class="form-control"  />
                                                        <input type="hidden" value="{{$Jobs->job_id}}" name="job_id" class="form-control"  />
                                                        
                                                        <div class="clearfix m-b20">

                                                            <label class="m-b0">Interview By </label>

                                                            <input type="text" value="{{isset($Jobs->interview_by) ? $Jobs->interview_by : null}}" class="form-control" min="" name="interview_by" placeholder="Name" required />

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                                        <div class="clearfix m-b20">

                                                            <label class="m-b0">Joining Date </label>
                                                            
                                                            @php
                                                                $minDate = date("Y-m-d");
                                                                if(isset($Jobs->joining_date)){
                                                                    $date = date('Y-m-d',strtotime($Jobs->joining_date));
                                                                }else{
                                                                    $date = null;
                                                                }
                                                            @endphp
                                                            {{$minDate}}
                                                            <input type="date" value="{{$date}}" min="{{$minDate}}" class="form-control" name="joining_date" placeholder="Name" required />

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mt-2">
                                                        <button type="submit" class="site-button add-btn button-sm"> Schedule Interview</button>
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </form>
                                    </div>


                                    <!-- Details End -->

                                    
                                </div>

                                <div id="personal_details_bx" class="job-bx bg-white m-b30">

                                    <div class="d-flex">

                                        <h5 class="m-b30">Basic Info</h5>

                                    </div>



                                    <!-- Details -->

                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">

                                                    <div class="clearfix m-b20">

                                                        <label class="m-b0">Full Name </label>

                                                        <span class="clearfix font-13">{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}</span>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="clearfix m-b20">

                                                        <label class="m-b0">Email id</label>

                                                        <span class="clearfix font-13">{{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}</span>

                                                    </div>
                                                </div>

                                                @php
                                                    if(isset($userData['personal_details']->dob)){
                                                        $date = date('d M Y',strtotime($userData['personal_details']->dob));
                                                    }else{
                                                        $date = null;
                                                    }
                                                @endphp
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="clearfix m-b20">

                                                    <label class="m-b0">Date of birth</label>

                                                    <span class="clearfix font-13">{{$date}}</span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="clearfix m-b20">

                                                    <label class="m-b0">Phone number</label>

                                                    <span class="clearfix font-13">{{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}}</span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="clearfix m-b20">

                                                    <label class="m-b0">Profession</label>

                                                    <span class="clearfix font-13">{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}</span>

                                                </div>
                                            </div>
                                        </div>

                                            @php
                                                $app_skills = '';
                                                if($userData['personal_details']->skills != ''){
                                                    $skills = $userData['personal_details']->skills ;
                                                    $app_skills = explode(',',$skills);
            
                                                } 
                                            @endphp

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Skills</label>

                                                <div class="job-time mr-auto">
                                                    @foreach ($app_skills as $i => $skill)
                                                    <a href="javascript:void(0);"><span>{{$skill}}</span></a>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">About me </label>

                                                <span class="clearfix font-13">{{isset($userData['personal_details']->about_me) ? $userData['personal_details']->about_me : null}}</span>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Details End -->

                                </div>
                                <div id="key_skills_bx" class="job-bx bg-white m-b30">
                                    <div class="d-flex">
                                        <h5 class="m-b15">Work Area</h5>
                                    </div>                                                     
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Company Name</label>
                                                <span class="clearfix font-13">{{isset($userData['work_history']->name_of_company) ? $userData['work_history']->name_of_company : null}}</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Employment type</label>
                                                <span class="clearfix font-13">{{isset($userData['work_history']->work_status) ? $userData['work_history']->work_status : null}}</span>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Industry</label>
                                                <span class="clearfix font-13">{{isset($userData['work_history']->industry_type) ? $userData['work_history']->industry_type : null}}</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Functional Area</label>
                                                <span class="clearfix font-13">{{isset($userData['work_history']->functional_area) ? $userData['work_history']->functional_area : null}}</span>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Annual salary</label>
                                                <span class="clearfix font-13">{{isset($userData['work_history']->annual_salary) ? $userData['work_history']->annual_salary : null}} Per Year</span>
                                            </div>
                                        </div>

                                </div>
                            </div>


                                <div id="it_skills_bx" class="job-bx table-job-bx bg-white m-b30">

                                    <div class="d-flex">

                                        <h5 class="m-b15">Education</h5>

                                    </div>

                                    <table>

                                        <thead>

                                            <tr>
                                                <th>Course</th>
                                                <th>Name of Institue</th>

                                                <th>Marks \percentage</th>

                                                <th>Passing year</th>

                                                {{--<th>Specialization</th>--}}
                                            </tr>

                                        </thead>

                                        <tbody>
                                            @if(count($userData['educational_details']) > 0)
                                            @foreach ($userData['educational_details'] as $i => $education)
                                            <tr>

                                                <td>
                                                 {{isset($education->qualification) ? $education->qualification : null}}
                                             </td>

                                                <td>
                                                    {{isset($education->university) ? $education->university : null}}
                                                </td>

                                                <td>
                                                    {{isset($education->marks) ? $education->marks : null}}%
                                                </td>

                                                <td>
                                                    {{isset($education->passout_yr) ? $education->passout_yr : null}}
                                                </td>

                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>

                                                <td>
                                              No Data Added
                                             </td>
                                         </tr>
                                         @endif

                                        </tbody>

                                    </table>

                                </div>


                                <div id="employment_bx" class="job-bx bg-white m-b30 ">
                                    <div class="d-flex">
                                        <h5 class="m-b15">Other Details</h5>
                                    </div>

                                    <div class="clearfix m-b20">

                                        <label class="m-b0">Linkedin</label>

                                        <span
                                            class="clearfix font-13">{{ isset($userData['other_details']->linkedin_url) ? $userData['other_details']->linkedin_url : null}}</span>

                                    </div>

                                    <div class="clearfix m-b20">

                                        <label class="m-b0">Facebook</label>

                                        <span
                                            class="clearfix font-13">{{ isset($userData['other_details']->facebook_url) ? $userData['other_details']->facebook_url : null}}</span>

                                    </div>
                                    <div class="clearfix m-b20">

                                        <label class="m-b0">Youtube</label>

                                        <span
                                            class="clearfix font-13">{{ isset($userData['other_details']->youtube_url) ? $userData['other_details']->youtube_url : null}}</span>

                                    </div>
                                    <div class="clearfix m-b20">

                                        <label class="m-b0">Twitter</label>

                                        <span
                                            class="clearfix font-13">{{ isset($userData['other_details']->twitter_url) ? $userData['other_details']->twitter_url : null}}</span>

                                    </div>
                                    
                                </div>
                                <div id="certificates_bx" class="job-bx bg-white m-b30 ">
                                    <div class="d-flex">
                                        <h5 class="m-b15">Certificates</h5>
                                    </div>
                                    <div class="row">
                                        @if($userData['upload_certificates'] != '')
                                            @foreach ($userData['upload_certificates'] as $i => $certificate)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <embed src="{{ URL::asset('../storage/app/'.$certificate->certificate1) }}#toolbar=0" width="300px" height="200px" type="application/pdf" style="width: 100%; height: 600%; border: none; overflow: hidden; min-height: 50vh;" scrolling="no"></embed>
                                                    <a href="{{ asset('../storage/app/'.$certificate->certificate1) }}" class="site-button" download="{{ 'certificate'.$i++ }}" style="background: #6A9457;">Download Certificate </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="videos_bx" class="job-bx bg-white m-b30 ">
                                    <div class="d-flex">
                                        <h5 class="m-b15">Videos</h5>
                                    </div>
                                    <div class="row">
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
                                        
                                    </div>
                                </div>
                                @php
                                    $resume = isset($userData['upload_resume']->upload_resume) ? $userData['upload_resume']->upload_resume : null
                                @endphp
                                
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="clearfix m-b20">
                                                                                   
                                                <a href="{{ asset('../storage/app/'.$resume) }}" class="site-button" download="{{ $userData['personal_details']->full_name }}" style="background: #6A9457;">Download Resume </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                            </div>



                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

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

                                        <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                    class="fa fa-facebook"></i></a></li>

                                        <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                    class="fa fa-google-plus"></i></a></li>

                                        <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                    class="fa fa-linkedin"></i></a></li>

                                        <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                    class="fa fa-instagram"></i></a></li>

                                        <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                    class="fa fa-twitter"></i></a></li>

                                    </ul>

                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 p-a0">

                                <div class="lead-form browse-job text-left">

                                    <form>

                                        <h3 class="m-t0">Personal Details</h3>

                                        <div class="form-group">

                                            <input type="text" value="" class="form-control"
                                                placeholder="E-Mail Address" />

                                        </div>

                                        <div class="form-group">

                                            <input type="password" value="" class="form-control"
                                                placeholder="Password" />

                                        </div>

                                        <div class="clearfix">

                                            <button type="button" class="btn-primary site-button btn-block">Submit
                                            </button>

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