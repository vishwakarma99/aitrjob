@include("layouts.header")
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        
                        <!--/ Medal Card -->
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> -->
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$appUsersCount}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Registered Job Seekers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$empUsersCount}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Registered Employers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$jobsCount}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Job Posted</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">$9745</h4>
                                                    <p class="card-text font-small-3 mb-0">Revenue</p>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                        <!-- Revenue Report Card -->
                        
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Create Notification</h4>
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                 <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-8 col-12 mb-2 mb-xl-0">
                                           <form method="post" action="{{ URL::to('admin/addnotification') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-5 col-md-5 col-6">
                                                    <div class="mb-1">
                                                        <label>Job Seekers:</label>
                                                        
                                                        <select id="notify_user" name="notify_user" class="form-control">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($appAllUsers as $i => $user)
                                                            <option value="{{$user->uid}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @if ($errors->has('notify_user'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notify_user') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-5 col-md-5 col-6">
                                                    <div class="mb-1">
                                                        
                                                        <label>Employers:</label>
                                                        
                                                        <select id="notify_emp" name="notify_emp" class="form-control">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($employerAllUsers as $i => $user)
                                                            <option value="{{$user->uid}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @if ($errors->has('notification'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notification') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                

                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <!-- <label class="form-label" for="basicInput">Create Category </label> -->
                                                        <textarea class="form-control"
                                                            placeholder="Enter Message" name="notification" id="notification" required></textarea>
                                                    @if ($errors->has('notification'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notification') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
    
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                            <div class="form-check form-check-inline" style="    float: right;">
                                                <input class="form-check-input" type="checkbox" id="sendtoallapplicants" value="checked" name="sendtoallApplicants" checked />
                                                <label class="form-check-label" for="sendtoallapplicants">Send to all Job Seekers</label>
                                                
                                            </div>
                                            <div class="form-check form-check-inline" style="    float: right;">
                                                <input class="form-check-input" type="checkbox" id="sendtoallemployers" value="checked" name="sendtoallEmployers" checked />
                                                <label class="form-check-label" for="sendtoallemployers">Send to all Employers</label>
                                                
                                            </div>
                                        </form>
                                        </div>
                                      

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Send Email</h4>
                                    @if (Session::has('email_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                 <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-8 col-12 mb-2 mb-xl-0">
                                           <form method="post" action="{{ URL::to('admin/addemail') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-5 col-md-5 col-6">
                                                    <div class="mb-1">
                                                        <label>Job Seekers:</label>
                                                        
                                                        <select id="notify_user" name="notify_user" class="form-control">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($appAllUsers as $i => $user)
                                                            <option value="{{$user->email_id}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @if ($errors->has('notify_user'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notify_user') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-5 col-md-5 col-6">
                                                    <div class="mb-1">
                                                        
                                                        <label>Employers:</label>
                                                        
                                                        <select id="notify_emp" name="notify_emp" class="form-control">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($employerAllUsers as $i => $user)
                                                            <option value="{{$user->email_id}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @if ($errors->has('notification'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notification') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                

                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <!-- <label class="form-label" for="basicInput">Create Category </label> -->
                                                        <textarea class="form-control"
                                                            placeholder="Enter Message" name="notification" id="notification" required></textarea>
                                                    @if ($errors->has('notification'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notification') }}
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
    
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                            <div class="form-check form-check-inline" style="    float: right;">
                                                <input class="form-check-input" type="checkbox" id="sendtoallapplicants" value="checked" name="sendtoallApplicants" checked />
                                                <label class="form-check-label" for="sendtoallapplicants">Send to all Job Seekers</label>
                                                
                                            </div>
                                            <div class="form-check form-check-inline" style="    float: right;">
                                                <input class="form-check-input" type="checkbox" id="sendtoallemployers" value="checked" name="sendtoallEmployers" checked />
                                                <label class="form-check-label" for="sendtoallemployers">Send to all Employers</label>
                                                
                                            </div>
                                        </form>
                                        </div>
                                      

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-header">
                                    <h4 class="card-title">LATEST JOB SEEKER</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> -->
                                    </div>
                                </div>
                                <div class="card-body p-0">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Skills</th>
                                                    <th>Industries</th>
                                                    <th>Functional Name</th>
                                                    {{--<th> Job Role</th>--}}
                                                    <th>Registered On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appUsers as $user)
                                                    <tr>
                                                        <td>
                                                            {{$user->name}}
                                                        </td>
                                                        <td class="text-nowrap">
                                                            {{$user->email_id}}
                                                        </td>
                                                        <td>{{$user->skills}}</td>
                                                        <td>{{$user->industry_type}}</td>
                                                        <td>
                                                            {{$user->functional_area}}
                                                        </td>
                                                        {{--<td> N/A</td>--}}
                                                        <td>{{$user->reg_date}}</td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->


                    </div>
                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-header">
                                    <h4 class="card-title">LATEST EMPLOYER</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> -->
                                    </div>
                                </div>
                                <div class="card-body p-0">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Company Name</th>
                                                    <th>Industries</th>
                                                    <th>Skill Hire</th>
                                                    
                                                    <th>Registered On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employerUsers as $user)
                                                    <tr>
                                                        <td>
                                                            {{$user->name}}
                                                        </td>
                                                        <td>
                                                            {{$user->email_id}}
                                                        </td>
                                                        <td>{{$user->company_name}}</td>
                                                        <td>{{$user->industry_hire_for}}</td>
                                                        <td>{{$user->skills}}</td>
                                                        <td>{{$user->reg_date}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->


                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include("layouts.footer")