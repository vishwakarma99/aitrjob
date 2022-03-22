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
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Send Email</h4>
                                    @if (Session::has('email_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('email_message') }}
                                        </div>
                                    @endif

                                </div>
                                 <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-8 col-12 mb-2 mb-xl-0">
                                           <form method="post" action="{{ URL::to('admin/sendsubscriberemail') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-5 col-md-5 col-6">
                                                    <div class="mb-1">
                                                        <label>Subscribers:</label>
                                                        
                                                        <select id="notify_user" name="notify_user" class="form-control">
                                                            <option value="">Please select an option</option>
                                                            @foreach ($Subscribers as $i => $user)
                                                            <option value="{{$user->email}}">{{$user->email}}</option>
                                                            @endforeach
                                                        </select>
                                                    @if ($errors->has('notify_user'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('notify_user') }}
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
                                                <input class="form-check-input" type="checkbox" id="sendtoall" value="checked" name="sendtoall" checked />
                                                <label class="form-check-label" for="sendtoall">Send to all</label>
                                                
                                            </div>
                                        </form>
                                        </div>
                                      

                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="card invoice-list-wrapper">
                            <div class="card-datatable table-responsive">
                                <!-- Basic Tables start -->
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> Subscribers List</h4>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        @foreach ($Subscribers as $subscriber)

                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td>{{$subscriber->email}}</td>
                                                            
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