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
                                    @if (Session::has('error_message'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error_message') }}
                                        </div>
                                    @endif
                           
                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Company Details</h5>

                                        
                                    </div>

                                    <form>

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

                                        <!-- Contact Information -->

                                        <div class="job-bx-title clearfix">

                                            <h5 class="font-weight-700 pull-left text-uppercase">Personal Details
                                            </h5>

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

                                        <div class="job-bx-title clearfix">

                                            <h5 class="font-weight-700 pull-left text-uppercase">Industry Details</h5>

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


                                        <!-- Social Link -->

                                        <div class="job-bx-title clearfix">

                                            <h5 class="font-weight-700 pull-left text-uppercase">Social link</h5>

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