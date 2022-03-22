@include("layouts.webheader")
   <div class="page-content bg-white">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full bg-white browse-job p-t50 p-b20">

                    <div class="container">

                        <div class="row">

                            @include("web.applicantsidebar")

                            <div class="col-xl-9 col-lg-8 m-b30">

                                <div class="job-bx job-profile">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Personal Information</h5>

                                        <a href="{{ URL::to('myprofile.html') }}"
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

                                            @php
                                                $readonly = '';
                                                $email = '';
                                                if($userData['personal_details'] == ''){
                                                    if($userData['user_details']->email != ''){
                                                        $email = $userData['user_details']->email;
                                                        $readonly = 'readonly';
                                                    }
                                                }else{
                                                    $email = $userData['personal_details']->email;
                                                    if($userData['user_details']->email != ''){
                                                        $readonly = 'readonly';
                                                    }
                                                }
                                            @endphp

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Email Address:</label>

                                                    <input type="email" class="form-control"
                                                        value="{{isset($email) ? $email : null}}" name="email" id="email" placeholder="info@example.com" {{$readonly}} required>

                                                </div>

                                            </div>
                                            @php
                                                $readonly = '';
                                                $mobilenumber = '';
                                                if($userData['personal_details'] == ''){
                                                    if($userData['user_details']->mobile_number != ''){
                                                        $mobilenumber = $userData['user_details']->mobile_number;
                                                        $readonly = 'readonly';
                                                    }
                                                }else{
                                                    $mobilenumber = $userData['personal_details']->phone_no;
                                                    if($userData['user_details']->mobile_number != ''){
                                                        $readonly = 'readonly';
                                                    }
                                                }
                                            @endphp
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Phone:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($mobilenumber) ? $mobilenumber : null}}" name="phone_no" id="phone_no" placeholder="Enter Phone" {{$readonly}} required>

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

                                        
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>
@include("layouts.webfooter")