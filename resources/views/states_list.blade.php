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
                                <!-- Basic Tables start -->
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">States List</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>State</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>City</th>
                                                            <th>Address</th>
                                                            <th>Partner Category</th>
                                                            <th>Total Amount</th>
                                                            <th>Success Amount</th>
                                                            <th>Pending Amount</th>
                                                            <th>Cancle Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($states as $i => $state)
                                                        <tr>
                                                            <td>

                                                                <span class="fw-bold">{{$state->state}} </span>
                                                            </td>
                                                            <td style="display: flex;">
                                                                <a class="btn btn-danger" style="margin: 2px;" href="{{ URL::to('admin/state/view/'.$state->user_id) }}"> <i 
                                                                class="me-40 fa fa-eye"></i></a>
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/state/delete/'.$state->id) }}" style="margin: 2px;"  onclick="return confirm('{{ trans('Are you sure you want to delete this state details') }}')"> <i
                                                                
                                                                class="me-40 fa fa-trash" ></i></a>
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/state/show/'.$state->id) }}" style="margin: 2px;"> <i  
                                                                class="me-40 fa fa-edit"></i></a>
                                                            
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                      
                                                    </tbody>
                                                </table>
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