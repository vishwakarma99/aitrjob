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

                                    </h4>

                                    <!-- <p class="m-b15">Freelance Senior PHP Developer at various agencies</p> -->

                                    <ul class="clearfix">

                                        <li><i class="ti-location-pin"></i> {{isset($userData['company_details']->state) ? $userData['company_details']->state : null}} </li>

                                        <li><i class="ti-mobile"></i> {{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}} </li>

                                        <li><i class="ti-email"></i> {{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}</li>

                                        <li><i class="fa fa-globe"></i> {{isset($userData['company_details']->company_website) ? $userData['company_details']->company_website : null}}</li>

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
                        <!-- 
					<div class="col-lg-4 col-md-5">

						<a href="javascript:void(0);">

							<div class="pending-info text-white p-a25">

								<h5>Pending Action</h5>

								<ul class="list-check secondry">

									<li>Verify Mobile Number</li>

									<li>Add Preferred Location</li>

									<li>Add Resume</li>

								</ul>

							</div>

						</a>

					</div> -->

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

                               
                                        
                                           

                                            <li><a class="scroll-bar nav-link" href="#organisation_bx">

                                                    <span>Organisation Details</span></a></li>
                                            <li><a class="scroll-bar nav-link" href="#personal_details_bx">

                                                    <span>Personal Details</span></a></li>

                                                    <li><a class="scroll-bar nav-link" href="#education_bx">

                                                        <span>Industry Details</span></a></li>
    
                                                    <li><a class="scroll-bar nav-link" href="#employment_bx">

                                                        <span>Social Media Details</span></a></li>
    
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

                             

                                <div id="organisation_bx" class="job-bx bg-white m-b30">

                                    <div class="d-flex">
    
                                        <h5 class="m-b30">Orgainsation Name</h5>
    
                                        <a href="{{ URL::to('profile.html/1') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
    
                                    </div>
    
                      
    
                                    <!-- Details -->
    
                                    <div class="row m-b30">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Organisation name</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->company_name) ? $userData['company_details']->company_name : null}}</span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Email address</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->email_address) ? $userData['company_details']->email_address : null}}</span>


                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Organisation website</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->company_website) ? $userData['company_details']->company_website : null}}</span>


                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Contact no.</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->contact_no) ? $userData['company_details']->contact_no : null}}</span>


                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>State</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->state) ? $userData['company_details']->state : null}}</span>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>City</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->city) ? $userData['company_details']->city : null}}</span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Pincode</label>

                                                    <span class="clearfix font-13">{{isset($userData['company_details']->pincode) ? $userData['company_details']->pincode : null}}</span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Contact person name</label>
                                                    <span class="clearfix font-13">{{isset($userData['company_details']->contact_person_name) ? $userData['company_details']->contact_person_name : null}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Contact person designation</label>
                                                    <span class="clearfix font-13">{{isset($userData['company_details']->contact_person_designation) ? $userData['company_details']->contact_person_designation : null}}</span>

                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Employeer description:</label>

                                                    <p>{{isset($userData['company_details']->employee_desc) ? $userData['company_details']->employee_desc : null}}</p>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Interview address:</label>

                                                    <p>{{isset($userData['company_details']->interview_address) ? $userData['company_details']->interview_address : null}}</p>

                                                </div>

                                            </div>


                                        </div>

    
                                    <!-- Details End -->
    
                                </div>

                                <div id="personal_details_bx" class="job-bx bg-white m-b30">

                                    <div class="d-flex">
    
                                        <h5 class="m-b15">Personal Details</h5>

                                        <a href="{{ URL::to('profile.html/2') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
    
    
                                    </div>
                                     <div class="row m-b30">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Full Name</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Contact number</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['personal_details']->contact_number) ? $userData['personal_details']->contact_number : null}}
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Email address</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}
                                                    </span>

                                                </div>

                                            </div>


                                        </div>
    
                                </div>
                                
                                <div id="education_bx" class="job-bx bg-white m-b30">

                                    <div class="d-flex">
    
                                        <h5 class="m-b15">Industry Details</h5>
    
                                        <a href="{{ URL::to('profile.html/3') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
    
    
                                    </div>
    
                                    
                                    <div class="row">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Industry that i hire for : </label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['sector_details']->industry_hire_for) ? $userData['sector_details']->industry_hire_for : null}}
                                                    </span>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Functional area that i hire for : </label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['sector_details']->functional_area) ? $userData['sector_details']->functional_area : null}}
                                                    </span>

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Skills for which I hire : </label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['sector_details']->skills) ? $userData['sector_details']->skills : null}}
                                                    </span>
                                                    

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Intervivew will be done between </label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['sector_details']->interview_day) ? $userData['sector_details']->interview_day : null}}
                                                    </span>

                                                </div>

                                            </div>

                                        </div>

    
                                </div>
                              

                            
                                <div id="employment_bx" class="job-bx bg-white m-b30 ">

                                    <div class="d-flex">
    
                                        <h5 class="m-b15">Social Media Details</h5>
    
                                        <a href="{{ URL::to('profile.html/4') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
    
    
                                    </div>
    
                                    <div class="row">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Facebook</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['social_media_links']->facebook_url) ? $userData['social_media_links']->facebook_url : null}}
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Twitter</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['social_media_links']->twitter_url) ? $userData['social_media_links']->twitter_url : null}}
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Instagram</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['social_media_links']->instagram_url) ? $userData['social_media_links']->instagram_url : null}}
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Linkedin</label>

                                                    <span class="clearfix font-13">
                                                        {{isset($userData['social_media_links']->linkedin_url) ? $userData['social_media_links']->linkedin_url : null}}
                                                    </span>

                                                </div>

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