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
                            <h2 class="content-header-title float-start mb-0">Add Partners</h2>

                        </div>
                    </div>
                </div>
       
            </div>
            <div class="content-body">
               

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addpartner') }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Username</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{old('name')}}" placeholder="Enter name">
                                                    @if ($errors->has('name'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" id="fullname"
                                                        value="{{old('fullname')}}" placeholder="Enter name">
                                                    @if ($errors->has('fullname'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('fullname') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email"> Email</label>
                                                    <input type="text" name="email" class="form-control" id="email"
                                                        value="{{old('email')}}" placeholder="Enter email">
                                                    @if ($errors->has('email'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="text" class="form-control" name="password" id="password"
                                                        value="{{old('password')}}" placeholder="Enter Password">
                                                    @if ($errors->has('password'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('password') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mobile_number"> Mobile</label>
                                                    <input type="text" name="mobile_number" class="form-control" id="mobile_number"
                                                        value="{{old('mobile_number')}}" placeholder="Enter mobile number">
                                                    @if ($errors->has('mobile_number'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('mobile_number') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-md-6 col-12 mb-1 mb-md-0">
                                                <div class="mb-1">
                                                    <label class="form-label" for="city"> City</label>
                                                    <input type="text" name="city" class="form-control" id="city"
                                                        value="{{old('city')}}" placeholder="Enter city">
                                                    @if ($errors->has('city'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('city') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="address"> Address</label>
                                                    <input type="text" name="address" class="form-control" id="address"
                                                        value="{{old('address')}}" placeholder="Enter address">
                                                    @if ($errors->has('address'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('address') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--<div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="partner_category"> Partner Category</label>

                                                    <select class="form-control" id="partner_category" name="partner_category" value="{{old('partner_category')}}">
                                                        <option value="">Select Option</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('partner_category'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('partner_category') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>--}}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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