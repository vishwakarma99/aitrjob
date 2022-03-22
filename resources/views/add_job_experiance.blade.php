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
                            <h2 class="content-header-title float-start mb-0">Add Job Experiance</h2>
                        </div>
                    </div>
                </div>
       
            </div>
            <div class="content-body">
               

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addjobexperiance') }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="experiance_from">Experiance from</label>
                                                    <input type="text" class="form-control" name="experiance_from" id="experiance_from"
                                                        value="{{old('experiance_from')}}" placeholder="Enter Exp. From">
                                                    @if ($errors->has('experiance_from'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('experiance_from') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="experiance_to">Experiance to</label>
                                                    <input type="text" class="form-control" name="experiance_to" id="experiance_to"
                                                        value="{{old('experiance_to')}}" placeholder="Enter Exp. To">
                                                    @if ($errors->has('experiance_to'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('experiance_to') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->
                        <div class="col-md-6 col-6">
                            <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Job Experiance List</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Experiance From</th>
                                                            <th>Experiance To</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        @foreach ($jobexp as $i => $exp)
                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td>
                                                                <span class="fw-bold">{{$exp->experiance_from}} </span>
                                                            </td>
                                                            <td>
                                                                <span class="fw-bold">{{$exp->experiance_to}} </span>
                                                            </td>
                                                            <td style="display: flex;">
                                                                
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/experiance/show/'.$exp->id) }}" style="margin: 2px;"> <i  
                                                                class="me-40 fa fa-edit"></i></a>
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/experiance/delete/'.$exp->id) }}" style="margin: 2px;"  onclick="return confirm('{{ trans('Are you sure you want to delete this job type details') }}')"> <i
                                                                
                                                                class="me-40 fa fa-trash" ></i></a>
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