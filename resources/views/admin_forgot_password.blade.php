@include("layouts.adminheader")
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="brand-logo">
                                    
                                    <h2 class="brand-text text-primary ms-1">AirtrJobs</h2>
                                </a>

                                @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                <!-- <h4 class="card-title mb-1">Welcome to Vuexy! 👋</h4> -->
                                

                                <form class="auth-login-form mt-2" method="post" action="{{ URL::to('admin/forgot-password') }}">
                                    @csrf
                                    <input type="hidden" name="role" id="role" value="Admin">
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ Session::get('Auth_Email_AirtrJobs') }}" aria-describedby="login-email" readonly required/>
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" aria-describedby="login-password" required />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Confirm Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Password" required />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4">Update Password</button>
                                </form>
                            </div>
                        </div>
                   
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include("layouts.footer")