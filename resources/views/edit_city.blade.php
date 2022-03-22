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
                            <h2 class="content-header-title float-start mb-0">Edit City</h2>

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

                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/city/update/'.$city->city_id) }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">State</label>
                                                    <select class="form-control" id="state" name="state" value="{{old('state')}}">
                                                        <option value="">Select Option</option>
                                                        @foreach ($states as $statess)
                                                            <option value="{{$statess->id}}" {{$city->state_id == $statess->id ? "selected" : "" }}>{{$statess->state}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">City</label>
                                                    <input type="text" class="form-control" name="city" id="city"
                                                        value="{{$city->city}}" placeholder="Enter city">
                                                    @if ($errors->has('city'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('city') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->

                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")