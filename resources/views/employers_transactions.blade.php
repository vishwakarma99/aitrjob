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
                                                <h4 class="card-title"> Employers Transaction List</h4>
                                            </div>
                                            @if (Session::has('flash_message'))
                                            <div class="card-header">
                                                <div class="alert alert-success">
                                                        {{ Session::get('flash_message') }}
                                                    </div>
                                                
                                            </div>
                                        @endif
                                            <div class="card-header">
                                                <h4 class="card-title"> Total Amount: {{$appAmount[0]->total_paid_amount}} INR</h4>
                                            </div>
                                              <div class="card-header">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                      
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> January : {{$janAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> February : {{$febAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> March : {{$marAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> April : {{$aprAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> May : {{$mayAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> June : {{$junAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> July : {{$julAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> August : {{$augAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> September : {{$sepAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> October : {{$octAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> November : {{$novAmount->total_paid_amount}} INR</h4>
                                                </div>
                                                    <div class="col-lg-3">
                                                <h4 class="card-title"> December : {{$decAmount->total_paid_amount}} INR</h4>
                                                <div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                               </div>
                                            </div>
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
                                                            <th>Uid</th>
                                                            <th>Name</th>
                                                            <th>Plan Name</th>
                                                            <th>Plan Amount</th>
                                                            <th>Plan Purchase Date</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        
                                                        @foreach ($appUsers as $user)
                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td>{{$user->uid}}</td>
                                                            <td>{{$user->full_name}}</td>
                                                            <td class="text-nowrap">
                                                                {{$user->plan_name}}
                                                            </td>
                                                            <td>{{$user->plan_currency}} {{$user->paid_amount}}</td>
                                                            <td>{{$user->plan_purchase_date}}</td>
                                                            
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