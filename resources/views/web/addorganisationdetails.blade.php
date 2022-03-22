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
                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Company Details</h5>

                                        <a href="{{ URL::to('myprofile.html') }}"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>

                                    <form class="needs-validation" method="post" action="{{ URL::to('addCompanyDetails') }}">
                                        @csrf

                                        <div class="row m-b30">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Organisation name</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->company_name) ? $userData['company_details']->company_name : null}}" name="company_name" id="company_name" placeholder="Enter Company Name" required>
                                                    
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Email address</label>

                                                    <input type="email" class="form-control"
                                                        value="{{isset($userData['company_details']->email_address) ? $userData['company_details']->email_address : null}}" name="email_address" id="email_address" placeholder="Enter Company Name" required>
                                                    

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Organisation website</label>
                                                    @if($userData['company_details'] == '')
                                                        <input type="text" class="form-control"
                                                        value="" name="company_website" id="company_website" placeholder="Enter Company website" required>    
                                                    @else
                                                        <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->company_website) ? $userData['company_details']->company_website : null}}" name="company_website" id="company_website" placeholder="Enter Company website" required>
                                                    @endif
                                                    
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Contact no.</label>
                                                    @if($userData['company_details'] == '')
                                                        <input type="text" class="form-control"
                                                        value="" name="company_website" id="company_website" placeholder="Enter Company website" required>
                                                    
                                                    @else
                                                        <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->contact_no) ? $userData['company_details']->contact_no : null}}" name="company_website" id="company_website" placeholder="Enter Company website" required>
                                                    
                                                    @endif
                                                    
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">
                                                    
                                                    <label>State</label>
                                                    @if($userData['company_details'] == '')
                                                        <select id="state" name="state" class="form-control"  >
                                                            <option value="">Please select an option</option>
                                                            @foreach ($states as $i => $state)
                                                            <option data-id="{{$state->id}}" value="{{$state->state}}"  >{{$state->state}}</option>
                                                            @endforeach
                                                        </select>
                                                    
                                                    @else
                                                        <select id="state" name="state" class="form-control"  >
                                                            <option value="">Please select an option</option>
                                                            @foreach ($states as $i => $state)
                                                            <option data-id="{{$state->id}}" value="{{$state->state}}"  {{$userData['company_details']->state ? "selected" : "" }}>{{$state->state}}</option>
                                                            @endforeach
                                                        </select>
                                                    
                                                    @endif
                                                    
                                                    
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>City</label>

                                                    <select id="city" name="city" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($cities as $i => $city)
                                                        <option data-id="{{$city->id}}" value="{{$city->city}}"  {{$city->city == $userData['company_details']->city ? "selected" : "" }}>{{$city->city}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Pincode</label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->pincode) ? $userData['company_details']->pincode : null}}" name="pincode" id="pincode" placeholder="Enter Pincode" required>
                                                    
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Contact person name</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->contact_person_name) ? $userData['company_details']->contact_person_name : null}}" name="contact_person_name" id="contact_person_name" placeholder="Enter Contact Person Name" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Contact person designation</label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->contact_person_designation) ? $userData['company_details']->contact_person_designation : null}}" name="contact_person_designation" id="contact_person_designation" placeholder="Enter Contact Person Designation" required>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Employeer description:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->employee_desc) ? $userData['company_details']->employee_desc : null}}" name="employee_desc" id="employee_desc" placeholder="Enter Employee Desc" required>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Interview address:</label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['company_details']->interview_address) ? $userData['company_details']->interview_address : null}}" name="interview_address" id="interview_address" placeholder="Enter Employee Desc" required>
                                                    
                                                </div>

                                            </div>


                                        </div>                                   
                                            <button type="submit" class="site-button m-b30">Save</button>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>

        <!-- Content END-->



@include("layouts.webfooter")