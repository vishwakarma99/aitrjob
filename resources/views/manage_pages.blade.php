@include("layouts.header")
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Manage Pages</h2>

                        </div>
                    </div>
                </div>
       
            </div>
            <div class="content-body">
               

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- /Bootstrap Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                {{--<div class="card-header">
                                    <h4 class="card-title">Pages List</h4>
                                </div>--}}
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Page</th>
                                                {{--<th>Page Description</th>--}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @php
                                                $iii = 1;
                                            @endphp
                                            @foreach ($managePages as $i => $page)
                                            
                                            <tr>
                                                <td>{{$iii}}</td>
                                                <td>
                                                    <span class="fw-bold">{{$page->page_name}} </span>
                                                </td>
                                                {{--<td>
                                                    <span class="fw-bold">{!! stripslashes($page->description) !!} </span>
                                                </td>--}}
                                                <td style="display: flex;">
                                                    
                                                <a class="btn btn-danger" href="{{ URL::to('admin/getPageData/'.$page->id) }}" style="margin: 2px;"> <i  
                                                    class="me-40 fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @php
                                                $iii++;
                                            @endphp
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")