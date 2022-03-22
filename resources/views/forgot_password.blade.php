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

                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error_message') }}
                                    </div>
                                @endif


                                <!-- <h4 class="card-title mb-1">Welcome to Vuexy! 👋</h4> -->
                                

                                <form class="auth-login-form mt-2" method="post" action="{{ URL::to('admin/password/email') }}">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">Email</label>

                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required/>
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary w-100">Send</button>
                                            
                                        </div>
                                        <br>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            Remember Password ? <a href="{{ url('admin/login') }}">Login here</a></p>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include("layouts.footer")