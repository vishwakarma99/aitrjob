@include("layouts.webheader")
        <!-- Content -->

        <div class="page-content">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full browse-job content-inner-2">

                    <div class="container">

                        <div class="row">

                            @include("web.applicantsidebar")

                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

                                <div id="personal_details_bx" class="job-bx bg-white m-b30">
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
                           
                                    <div class="d-flex">

                                        <h5 class="m-b30">Basic Info</h5>

                                        <a href="{{ URL::to('myprofile.html') }}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
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
                                                if($userData['personal_details'] != ''){
                                                    if($userData['personal_details']->skills != ''){
                                                        $skills = $userData['personal_details']->skills ;
                                                        $app_skills = explode(',',$skills);
                
                                                    } 
                                                }
                                            @endphp

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Skills</label>

                                                <div class="job-time mr-auto">
                                                    @if ($app_skills != '')
                                                    @foreach ($app_skills as $i => $skill)
                                                    <a href="javascript:void(0);"><span>{{$skill}}</span></a>
                                                    @endforeach
                                                    @endif
                                                    
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
        