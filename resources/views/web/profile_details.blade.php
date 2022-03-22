@include("layouts.webheader")

        <div class="page-content">

            <!-- inner page banner -->

            <div class="overlay-black-dark profile-edit p-t50 p-b20"
                style="background-image:url(images/banner/bnr1.jpg);">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-8 col-md-7 candidate-info">

                            <div class="candidate-detail">

                                <div class="canditate-des text-center">

                                    <a href="javascript:void(0);">

                                        <img alt="" src="images/team/pic1.jpg">

                                    </a>

                                    <div class="upload-link" title="update" data-toggle="tooltip"
                                        data-placement="right">

                                        <input type="file" class="update-flie">

                                        <i class="fa fa-camera"></i>

                                    </div>

                                </div>

                                <div class="text-white browse-job text-left">

                                    <h4 class="m-b0">Jaya Nayan

                                        <a class="m-l15 font-16 text-white" data-toggle="modal"
                                            data-target="#profilename" href="#"><i class="fa fa-pencil"></i></a>

                                    </h4>

                                    <!-- <p class="m-b15">Freelance Senior PHP Developer at various agencies</p> -->

                                    <ul class="clearfix">

                                        <li><i class="ti-location-pin"></i> Maharashtra </li>

                                        <li><i class="ti-mobile"></i> 675798650555</li>

                                        <li><i class="fa fa-globe"></i> 1993-01-08</li>

                                        <li><i class="ti-email"></i>jayanayan01@gmail.com</li>

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
                                        <a href="" class="site-button" style="background: #ED893E;">Send message </a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="clearfix m-b20">
                                        <a href="" class="site-button" style="background: #6A9457;"><i class="fa fa-share"></i> Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p style="color: #6A9457;">Shortlist</p>
                                </div>
                                <div class="col-md-3">
                                    <p style="
                                    color: #E65239;">Reject</p>
                                </div>
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



                                            <li><a class="scroll-bar nav-link" href="#it_skills_bx">

                                                    <span>Education</span></a></li>

                                           
                                            <li><a class="scroll-bar nav-link" href="#personal_details_bx">

                                                    <span>Basic Info</span></a></li>
  
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">



                                <div id="personal_details_bx" class="job-bx bg-white m-b30">

                                    <div class="d-flex">

                                        <h5 class="m-b30">Basic Info</h5>

                                    </div>



                                    <!-- Details -->

                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">Full Name </label>

                                                <span class="clearfix font-13">Jaya Nayan</span>

                                            </div>

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">Email id</label>

                                                <span class="clearfix font-13">jayanayan01@gmail.com</span>

                                            </div>

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">Date of birth</label>

                                                <span class="clearfix font-13">1993-01-08</span>

                                            </div>

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">Phone number</label>

                                                <span class="clearfix font-13">67548390574</span>

                                            </div>

                                            <div class="clearfix m-b20">

                                                <label class="m-b0">About me </label>

                                                <span class="clearfix font-13">Hello, Myself Jaya, looking for a job in
                                                    chemistry
                                                    faculty Iit Jee / Neet. I have 1 year experience from
                                                    Prathibha Institute of pune. </span>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Details End -->

                                </div>
                                <div id="key_skills_bx" class="job-bx bg-white m-b30">
                                    <div class="d-flex">
                                        <h5 class="m-b15">Work Area</h5>
                                    </div>

                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Skills</label>

                                        <div class="job-time mr-auto">

                                            <a href="javascript:void(0);"><span>Organic Chemistry</span></a>

                                            <a href="javascript:void(0);"><span>Faculty</span></a>

                                            <a href="javascript:void(0);"><span>Strong understanding</span></a>

                                            <a href="javascript:void(0);"><span>multitask</span></a>
                                        </div>
                                    </div>

                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Industry</label>
                                        <span class="clearfix font-13">Iit Jee / Neet</span>
                                    </div>

                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Functional Area</label>
                                        <span class="clearfix font-13">Chemistry</span>
                                    </div>

                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Employment type</label>
                                        <span class="clearfix font-13">Full time</span>
                                    </div>
                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Desired Job type</label>
                                        <span class="clearfix font-13">Permanent</span>
                                    </div>

                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Prefered shift</label>
                                        <span class="clearfix font-13">Day</span>
                                    </div>
                                    <div class="clearfix m-b20">
                                        <label class="m-b0">Expected salary</label>
                                        <span class="clearfix font-13">20,000- 30,000 pm</span>
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

                                                <th>Specialization</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td> 10th</td>

                                                <td>Pune institute</td>

                                                <td>76.8%</td>

                                                <td>1993</td>

                                                <td></td>

                                            </tr>

                                            <tr>

                                                <td> 10th</td>

                                                <td>Pune institute</td>

                                                <td>76.8%</td>

                                                <td>1993</td>

                                                <td></td>

                                            </tr>
                                            <tr>

                                                <td> 10th</td>

                                                <td>Pune institute</td>

                                                <td>76.8%</td>

                                                <td>1993</td>

                                                <td></td>

                                            </tr>



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
                                            class="clearfix font-13">https://www.linkedin.com/jobs/view/2685149448/</span>

                                    </div>
                                    <div class="clearfix m-b20">

                                        <label class="m-b0">Link to video</label>

                                        <span
                                            class="clearfix font-13">https://www.linkedin.com/jobs/view/2685149448/</span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="clearfix m-b20">
                                                <a href="" class="site-button" style="background: #6A9457;">Download resume </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="clearfix m-b20">
                                                <a href="" class="site-button" style="background: #6A9457;">Play Intro video</a>
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
		<!-- Modal Box End -->

@include("layouts.webfooter")