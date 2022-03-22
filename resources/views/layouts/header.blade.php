<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">

    <meta name="csrf-token" content="{{ csrf_token() }}" /> 

    <title>Admin | AirtrJobs</title>
    <link rel="apple-touch-icon" href="{{ asset('../app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"st
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/charts/apexcharts.css')}}">
      
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts\font-awesome\css/font-awesome.css')}}">

    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<script>
    var App_URL = {!! json_encode(url('/')) !!}
    
</script>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
     <!-- BEGIN: Header-->
     <nav
     class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
     <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
     
         <ul class="nav navbar-nav align-items-center ms-auto">
             <li class="nav-item" style="display: flex;"><a class="nav-link dropdown-toggle dropdown-user-link"
                     id="dropdown-user" href="#" 
                     aria-expanded="false">
                 
                     @if (Auth::check())
                     <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{Auth::user()->name}}</span><span
                             class="user-status">Admin</span></div><span class="avatar">
                             <!--    <img class="round"-->
                             <!--src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40"-->
                             <!--width="40"><span class="avatar-status-online">-->
                                 
                             </span></span>
                    @else
                    <li class="hide_on_mobile"><a
                            href="{{ URL::to('register') }}">Login</a></li>
                    
                    </li>
                @endif
                 </a>
                 
                     
                         <a class="dropdown-item" href="{{ URL::to('admin/logout') }}"><i class="me-50"
                             data-feather="power"></i> Logout</a>
                 
             </li>
         </ul>
     </div>
 </nav>

 <!-- END: Header-->
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="https://aitrjobs.com/admin/dashboard">
                        <span class="brand-logo">
                            <!--<img src="imgs/logo.png">-->
                        </span>
                        <h2 class="brand-text">AirtrJobs</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{  request()->is('admin/dashboard') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/dashboard') }}"><i
                            data-feather="home"></i><span class="menu-title text-truncate"
                            data-i18n="Dashboards">Dashboards</span>
                        <!-- <span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span> -->
                    </a>

                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                        data-feather="more-horizontal"></i>
                </li>
                
                <li class="{{  request()->is('admin/addSlider') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addSlider') }}"><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">Sliders</span></a>
                </li>
                <li class="nav-item"><a class="d-flex align-items-center" href=""><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">Job Seeker</span></a>
                    <ul class="menu-content">
                        <li class="{{  request()->is('admin/jobseekers') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/jobseekers') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic">All Job Seekers</span></a>
                        </li>
                        <li class="{{  request()->is('admin/jobseekerstransactions') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/jobseekerstransactions') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic">Job Seekers Transactions</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center"><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">Employer</span></a>
                    <ul class="menu-content">
                        <li class="{{  request()->is('admin/employersList') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/employersList') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic">All Employer</span></a>
                        </li>
                        <li class="{{  request()->is('admin/employerstransactions') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/employerstransactions') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic">Employers Transactions</span></a>
                        </li>
                        {{--<li><a class="d-flex align-items-center" href="hired_profile_list.html"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Advanced">Hired Profile List</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="pending_profile_list.html"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Advanced">Pending Profile List</span></a>
                        </li>--}}
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">Member Plan</span></a>
                    <ul class="menu-content">
                        <li class="{{  request()->is('admin/employersPlansList') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/employersPlansList') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic"></span>
                                Employer Plan</span></a>
                        </li>
                        <li class="{{  request()->is('admin/seekersPlansList') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/seekersPlansList') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Advanced">Job Seeker Plan</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{  request()->is('admin/highlighted-jobs') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/highlighted-jobs') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Highlighted Jobs</span></a>
                </li>
                
                <li class="{{  request()->is('admin/addnewstate') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewstate') }}"><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">State</span></a>
                    {{--<ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewstate') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                        data-i18n="Basic"></span>
                                    State</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="{{ URL::to('admin/getallstates') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                        data-i18n="Advanced">All States</span></a>
                            </li>
                        </ul>--}}
                </li>
                <li class="{{  request()->is('admin/addnewcity') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewcity') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">City</span></a>
                </li>
                <li class="{{  request()->is('admin/addnewcategories') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewcategories') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Categories</span></a>
                </li>
                <li class="{{  request()->is('admin/addnewjobindustry') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobindustry') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Industries</span></a>
                </li>
                <li class="{{  request()->is('admin/addnewjobfunctionalarea') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobfunctionalarea') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Functional Area</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewjobtypes') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobtypes') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Type</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewjobsubtypes') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobsubtypes') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Sub Type</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewexperiance') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewexperiance') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Experiance</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewjobshift') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobshift') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Shift</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewjobeducation') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobeducation') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Education</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewjobsalary') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewjobsalary') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Job Salary</span></a>
                </li>                
                <li class="{{  request()->is('admin/addnewblogcategory') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewblogcategory') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Blog Category</span></a>
                </li>                

                <li class="{{  request()->is('admin/addnewblog') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewblog') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Add Blogs</span></a>
                </li>                

                <li class="{{  request()->is('admin/addnewtestimonial') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/addnewtestimonial') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Add Testimonials</span></a>
                </li>                
                <li class="{{  request()->is('admin/subscribers') ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/subscribers') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Subscribers</span></a>
                </li>                
                {{--<li class=" nav-item"><a class="d-flex align-items-center" href="{{ URL::to('admin/payter') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Datatable">Payter</span></a></li>--}}
                <li class=" nav-item"><a class="d-flex align-items-center"><i data-feather="grid"></i><span
                            class="menu-title text-truncate" data-i18n="Datatable">Manage Pages</span></a>
                    <ul class="menu-content">
                        <li class="{{  request()->is('admin/managePages') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ URL::to('admin/managePages') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Basic">Pages</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>  
    <!-- END: Main Menu-->
