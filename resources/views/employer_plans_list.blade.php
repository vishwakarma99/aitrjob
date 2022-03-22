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
                                <div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        <!-- <h6 class="mb-0">DataTable with Buttons</h6> -->
                                    </div>
                                    <div class="dt-action-buttons text-end">
                                        <div class="dt-buttons d-inline-flex">
                                            
                                            <a style="margin: 2px;" href="{{ URL::to('admin/addnewempplan') }}" class="btn btn-primary" type="submit"> <i data-feather="plus" ></i> Add New</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic Tables start -->
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> Employer Plan List</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- <p class="card-text">
                                                        Using the most basic table Leanne Grahamup, here’s how
                                                        <code>.table</code>-based tables look in Bootstrap. You
                                                        can use any example of below table for your table and it can be
                                                        use with any type of bootstrap tables.
                                                    </p> -->
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Plan</th>
                                                            <th>CallBack Url</th>
                                                            <th>Plan Currency</th>
                                                            <th>Plan Amount</th>
                                                            <th>Coupon Code</th>
                                                            <th>Coupon Amount</th>
                                                            <th>Message Limit</th>
                                                            <th>Job Post Limit</th>
                                                            <th>Hiring Limit</th>
                                                            <th>Created On</th>
                                                            <th>Plan Duration</th>
                                                            {{--<th>Benefit 1</th>
                                                            <th>Benefit 2</th>
                                                            <th>Benefit 3</th>
                                                            <th>Benefit 4</th>
                                                            <th>Benefit 5</th>--}}
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        @foreach ($empplans as $plan)
                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td>{{$plan->plan_name}}</td>
                                                            <td>{{$plan->callback_url}}</td>
                                                            <td>{{$plan->plan_currency}}</td>
                                                            <td>{{$plan->plan_amount}}</td>
                                                            <td>{{$plan->coupon_code}}</td>
                                                            <td>{{$plan->coupon_amount}}</td>
                                                            <td>{{$plan->message_limit}}</td>
                                                            <td>{{$plan->job_post_limit}}</td>
                                                            <td>{{$plan->hiring_limit}}</td>
                                                            <td>{{date("D, d M Y", strtotime($plan->created_at))}}</td>
                                                            <td>{{$plan->plan_duration}}</td>
                                                            {{--<td>{{$plan->benefit1}}</td>
                                                            <td>{{$plan->benefit2}}</td>
                                                            <td>{{$plan->benefit3}}</td>
                                                            <td>{{$plan->benefit4}}</td>
                                                            <td>{{$plan->benefit5}}</td>--}}
                                                            <td style="display: flex;">
                                                                {{--@if ($plan->status == 1)
                                                                    <a style="color: white;" style="margin: 2px;" href="{{ URL::to('admin/empplan/'.$plan->id.'/'.$plan->status) }}" class="btn btn-success">Block</a>
                                                                @else
                                                                    <a style="color: white;" style="margin: 2px;" href="{{ URL::to('admin/empplan/'.$plan->id.'/'.$plan->status) }}" class="btn btn-danger">UnBlock</a>
                                                                @endif--}}
                                                                <a class="btn btn-danger" href="{{ URL::to('admin/empplan/show/'.$plan->id) }}" style="margin: 2px;"> <i  
                                                                class="me-40 fa fa-edit"></i></a>
                                                                {{--<a style="margin: 2px;" href="javascript:;" class="btn btn-info"><i data-feather="eye"></i>
                                                                </a>--}}
                                                                {{--<a style="margin: 2px;" class="btn btn-secondary" type="submit"> <i
                                                                        data-feather="trash" ></i></a>--}}
                                                            </td>
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