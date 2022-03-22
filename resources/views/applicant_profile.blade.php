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
                                                <h4 class="card-title"> Applicant Data</h4>
                                            </div>
                                            <div class="card-body">
                                                <p><b>Applicant Name : </b>{{isset($userData['personal_details']->full_name) ? $userData['personal_details']->full_name : null}}</p>
                                                <p><b>Plan : </b>{{isset($userData['plan_details']['plan_name']) ? $userData['plan_details']['plan_name'] : null}}</p>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Detail</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="educational-tab" data-toggle="tab" href="#educational" role="tab" aria-controls="educational" aria-selected="false">Educational Details</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false">Work Details</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="uploaddoc-tab" data-toggle="tab" href="#uploaddoc" role="tab" aria-controls="uploaddoc" aria-selected="false">Upload Documents</a>
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
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->email) ? $userData['personal_details']->email : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Profession :</div>
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->profession) ? $userData['personal_details']->profession : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Phone Number :</div>
                                                                                <a class="detail-amt">{{isset($userData['personal_details']->phone_no) ? $userData['personal_details']->phone_no : null}}</a>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">DOB :</div>
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->dob) ? $userData['personal_details']->dob : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Skills :</div>
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->skills) ? $userData['personal_details']->skills : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">About :</div>
                                                                                <div class="detail-amt">{{isset($userData['personal_details']->about_me) ? $userData['personal_details']->about_me : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Desired Location :</div>
                                                                                <div class="detail-amt">{{$userData['personal_details']['desired_location']}}</div>
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
                                                        @if ($userData['educational_details'] != '')
                                                            <label class="section-label form-label mb-1"> Educational Details</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">
                                                                        <!-- <h6 class="price-title">Price Details</h6> -->
                                                                        <ul class="list-unstyled">
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Contact Qualification :</div>
                                                                                <div class="detail-amt">{{isset($education->qualification) ? $education->qualification : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Passout Year :</div>
                                                                                <div class="detail-amt">{{isset($education->passout_yr) ? $education->passout_yr : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Contact University :</div>
                                                                                <div class="detail-amt">{{isset($education->university) ? $education->university : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Marks :</div>
                                                                                <a class="detail-amt">{{isset($education->marks) ? $education->marks : null}}%</a>
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
                                                        @if ($userData['work_history'] != '')
                                                            <label class="section-label form-label mb-1">work Detail</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">

                                                                        <ul class="list-unstyled price-details">
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Name of Company : </div>
                                                                                <div class="detail-amt">
                                                                                    {{isset($userData['work_history']->name_of_company) ? $userData['work_history']->name_of_company : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Work Status : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['work_history']->work_status) ? $userData['work_history']->work_status : null}}
                                                                                </div>
                                                                            </li>
                                                                            {{--<li class="price-detail">
                                                                                <div class="details-title">work Work Exp. Yrs : </div>
                                                                                <div class="detail-amt discount-amt ">{{$userData['work_history']['work_exp_years']}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Work Exp. Months : </div>
                                                                                <div class="detail-amt discount-amt ">{{$userData['work_history']['work_exp_months']}}</div>
                                                                            </li>--}}
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Director Reference : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['work_history']->director_reference) ? $userData['work_history']->director_reference : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Industry Type : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['work_history']->industry_type) ? $userData['work_history']->industry_type : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Functional Area : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['work_history']->functional_area) ? $userData['work_history']->functional_area : null}}</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Annual Salary : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['work_history']->annual_salary) ? $userData['work_history']->annual_salary : null}} Per Year</div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Date of Joining : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['work_history']->date_of_joining) ? $userData['work_history']->date_of_joining : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Date of Leaving : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['work_history']->date_of_leaving) ? $userData['work_history']->date_of_leaving : null}}
                                                                                </div>
                                                                            </li>
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Achievement : </div>
                                                                                <div class="detail-amt discount-amt ">
                                                                                    {{isset($userData['work_history']->achivements) ? $userData['work_history']->achivements : null}}
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
                                                        @if ($userData['upload_resume'] != '' || $userData['upload_certificates'] != '' || $userData['upload_video_link'] != '')
                                                            <label class="section-label form-label mb-1"> Upload Documents</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="price-details">
                                                                        <!-- <h6 class="price-title">Price Details</h6> -->
                                                                        <ul class="list-unstyled">
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Resume Link : </div>
                                                                                <div class="detail-amt discount-amt ">{{isset($userData['upload_resume']['link_of_resume']) ? $userData['upload_resume']['link_of_resume'] : null}}</div>
                                                                            </li>
                                                                            @if($userData['upload_resume'] != '')
                                                                            <li class="price-detail">
                                                                                <div class="detail-title">Resume :</div>
                                                                                
                                                                                <div class="detail-amt" style="display: contents;">
                                                                                    <img
                                                                                        src="{{ asset('../storage/app/'.$userData['upload_resume']['upload_resume']) }}"
                                                                                        style="width: 40%;">
                                                                                        
                                                                                </div>
                                                                            </li>
                                                                            @endif
                                                                            
                                                                            {{--<li class="price-detail">
                                                                                <div class="detail-title">Certificates : </div>
                                                                                <br>
                                                                                @foreach($userData['upload_certificates'] as $certificate)
                                                                                <div class="detail-amt" style="display: contents;">
                                                                                    <img 
                                                                                        src="{{ asset('../storage/app/'.$certificate->certificate1) }}"
                                                                                        style="width: 40%;">
                                                                                </div>
                                                                                @endforeach
                                                                            </li>
                                                                            
                                                                            <li class="price-detail">
                                                                                <div class="details-title">Video Link : </div>
                                                                                <div class="detail-amt discount-amt ">{{$userData['upload_video_link']['link_of_video']}}</div>
                                                                            </li>--}}

                                                                            {{--<li class="price-detail">
                                                                                <div class="detail-title">Video :</div>

                                                                                <div class="detail-amt">
                                                                                    <video width="400" controls>
                                                                                      <source src="{{ asset('../storage/app/'.$userData['upload_video_link']['upload_video']) }}" type="video/mp4">
                                                                                    </video>
                                                                                    <img
                                                                                        src="{{ asset('../storage/app/'.$userData['upload_video_link']['certificate1']) }}"
                                                                                        style="width: 40%;"></div>
                                                                            </li>--}}

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