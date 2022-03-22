@include("layouts.header")
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">



                <!-- List DataTable -->
                <div class="row">
                    <div class="col-12">
                        <div class="card invoice-list-wrapper">
                            <div class="card-datatable table-responsive">
                                {{--<div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        <!-- <h6 class="mb-0">DataTable with Buttons</h6> -->
                                    </div>
                                    <div class="dt-action-buttons text-end">
                                        <div class="dt-buttons d-inline-flex">
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-success mb15 ml15"><i
                                                    class="fa fa-thumbs-up"></i>Approved List

                                            </a>
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-warning mb15 ml15"><i
                                                    class=" fa fa-thumbs-down "></i>Unapproved List

                                            </a>
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-danger mb15 ml15"><i
                                                    class=" fa fa-user-times "></i>Suspend List</a>
                                            <button
                                                class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                                tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                aria-haspopup="true">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-share font-small-4 me-50">
                                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                        <polyline points="16 6 12 2 8 6"></polyline>
                                                        <line x1="12" y1="2" x2="12" y2="15"></line>
                                                    </svg>Export
                                                </span>
                                            </button>
                                            <button class="dt-button create-new btn btn-primary" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                                                data-bs-target="#modals-slide-in">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-plus me-50 font-small-4">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>Add New
                                                </span>
                                            </button>

                                        </div>
                                    </div>
                                </div>--}}
                                <!-- Basic Tables start -->
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> Employer Data</h4>
                                            </div>
                                            <div class="card-body">
                                                <p><b>Applicant Name : </b>{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}</p>
                                                <p><b>Plan : </b>{{isset($userData['plan_details']['plan_name']) ? $userData['plan_details']['plan_name'] : null}}</p>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Detail</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="educational-tab" data-toggle="tab" href="#educational" role="tab" aria-controls="educational" aria-selected="false">Social Media Details</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false">Company Details</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="uploaddoc-tab" data-toggle="tab" href="#uploaddoc" role="tab" aria-controls="uploaddoc" aria-selected="false">Sector Details</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent" style="padding:10px 20px;">
                                                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                                        
                                                        @if ($userData['personal_details'] != '')
                                                            <label class="section-label form-label mb-1">Personal Detail</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">
                                                                        <!-- <h6 class="price-title">Price Details</h6> -->
                                                                        <ul class="list-unstyled">
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Full Name :</div>
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Email :</div>
                                                                                <div class="detail-amt">
                                                                                    {{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Profession :</div>
                                                                                <div class="detail-amt">
                                                                                    {{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Phone Number :</div>
                                                                                <div class="detail-amt">
                                                                                {{isset($userData['personal_details']->contact_number) ? $userData['personal_details']->contact_number : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">DOB :</div>
                                                                                <div class="detail-amt">
                                                                                {{isset($userData['personal_details']->dob) ? $userData['personal_details']->dob : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Skills :</div>
                                                                                <div class="detail-amt">
                                                                                    {{isset($userData['personal_details']->skills) ? $userData['personal_details']->skills : null}}    
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Profile Picture :</div>
                                                                                @if(isset($userData['personal_details']->skills) != '')
                                                                                <div class="detail-amt" style="display: contents;">
                                                                                    <img
                                                                                        src="{{ asset('../storage/app/'.$userData['personal_details']['profile_img']) }}"
                                                                                        style="width: 40%;">
                                                                                </div>
                                                                                @else
                                                                                <div class="detail-amt" style="display: contents;">
                                                                                    <img
                                                                                        src=""
                                                                                        style="width: 40%;">
                                                                                </div>
                                                                                @endif
                                                                            </li>

                                                                        </ul>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <h4>No Data Added</h4>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="educational" role="tabpanel" aria-labelledby="educational-tab">
                                                        @if ($userData['social_media_links'] != '')
                                                            <label class="section-label form-label mb-1">Social Media Details</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">
                                                                        <!-- <h6 class="price-title">Price Details</h6> -->
                                                                        <ul class="list-unstyled">
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Facebook :</div>
                                                                                <div class="detail-amt">{{isset($userData['social_media_links']->facebook_url) ? $userData['social_media_links']->facebook_url : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Instagram :</div>
                                                                                <div class="detail-amt">{{isset($userData['social_media_links']->instagram_url) ? $userData['social_media_links']->instagram_url : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Twitter :</div>
                                                                                <div class="detail-amt">{{isset($userData['social_media_links']->twitter_url) ? $userData['social_media_links']->twitter_url : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">LinkedIn :</div>
                                                                                <a class="detail-amt">{{isset($userData['social_media_links']->linkedin_url) ? $userData['social_media_links']->linkedin_url : null}}</a>
                                                                            </li>
                                                                        </ul>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <h4>No Data Added</h4>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
                                                        @if ($userData['company_details'] != '')
                                                            <label class="section-label form-label mb-1">Company Details</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">

                                                                        <ul class="list-unstyled price-details">
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Name of Company : </div>
                                                                                <div class="detail-amt">
                                                                                    {{isset($userData['company_details']->company_name) ? $userData['company_details']->company_name : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Company Website : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->company_website) ? $userData['company_details']->company_website : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Company Email : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['company_details']->email_address) ? $userData['company_details']->email_address : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Company Contact Number : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->contact_no) ? $userData['company_details']->contact_no : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">State : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->state) ? $userData['company_details']->state : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">City : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->city) ? $userData['company_details']->city : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Pincode : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->pincode) ? $userData['company_details']->pincode : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Employee Description : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->employee_desc) ? $userData['company_details']->employee_desc : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Interview Address : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->interview_address) ? $userData['company_details']->interview_address : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Contact Person Name: </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->contact_person_name) ? $userData['company_details']->contact_person_name : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Contact person designation : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['company_details']->contact_person_designation) ? $userData['company_details']->contact_person_designation : null}}
                                                                                </div>
                                                                            </li>
                                                                        </ul>

                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <h4>No Data Added</h4>
                                                        @endif
                                                    </div>

                                                    <div class="tab-pane fade" id="uploaddoc" role="tabpanel" aria-labelledby="uploaddoc-tab">
                                                        @if ($userData['sector_details'] != '')
                                                            <label class="section-label form-label mb-1"> Sector Details</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">
                                                                        <!-- <h6 class="price-title">Price Details</h6> -->
                                                                        <ul class="list-unstyled">
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Industry Hire For : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['sector_details']->industry_hire_for) ? $userData['sector_details']->industry_hire_for : null}}</div>
                                                                            </li>

                                                                            <li class="price-detail">
                                                                                <div class="details-title">Functional Area : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['sector_details']->functional_area) ? $userData['sector_details']->functional_area : null}}
                                                                                </div>
                                                                            </li>

                                                                            <li class="price-detail">
                                                                                <div class="details-title">Skills : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['sector_details']->skills) ? $userData['sector_details']->skills : null}}
                                                                                </div>
                                                                            </li>

                                                                            <li class="price-detail">
                                                                                <div class="details-title">Intervivew will be done between : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['sector_details']->interview_day) ? $userData['sector_details']->interview_day : null}}
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <h4>No Data Added</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic Tables end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ List DataTable -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

@include("layouts.footer")