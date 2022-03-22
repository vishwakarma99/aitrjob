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
                            <h2 class="content-header-title float-start mb-0">Add Job Seeker Plan</h2>

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
                                @if (Session::has('flash_message'))
                                <div class="card-header">
                                    <div class="alert alert-success">
                                        {{ Session::get('flash_message') }}
                                        Plan CallBack Url : {{ Session::get('callback_message') }}
                                    </div>
                                </div>
                                @endif
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addseekerplan') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_name">Plan</label>
                                                    <input type="text" class="form-control" name="plan_name" id="plan_name"
                                                        value="{{old('plan_name')}}" placeholder="Enter plan" required>
                                                    @if ($errors->has('plan_name'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_duration">Plan Duration</label>
                                                    <input type="number" class="form-control" name="plan_duration" id="plan_duration"
                                                        value="{{old('plan_duration')}}" placeholder="Enter duration (In Days)" required>
                                                    @if ($errors->has('plan_duration'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_duration') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_currency">Plan Currency</label>
                                                    <input type="text" class="form-control" name="plan_currency" id="plan_currency"
                                                        value="{{old('plan_currency')}}" placeholder="Enter currency" required>
                                                    @if ($errors->has('plan_currency'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_currency') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_amount">Plan Amount</label>
                                                    <input type="number" class="form-control" name="plan_amount" id="plan_amount"
                                                        value="{{old('plan_amount')}}" placeholder="Enter amount" required>
                                                    @if ($errors->has('plan_amount'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_amount') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_url">Plan Url</label>
                                                    <input type="text" class="form-control" name="plan_url" id="plan_url"
                                                        value="{{old('plan_url')}}" placeholder="Enter duration Url" required>
                                                    @if ($errors->has('plan_url'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_url') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="coupon_code">Coupon Code</label>
                                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code"
                                                        value="{{old('coupon_code')}}" placeholder="Enter code">
                                                    @if ($errors->has('coupon_code'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('coupon_code') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="coupon_amount">Coupon Amount</label>
                                                    <input type="number" class="form-control" name="coupon_amount" id="coupon_amount"
                                                        value="{{old('coupon_amount')}}" placeholder="Enter amount">
                                                    @if ($errors->has('coupon_amount'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('coupon_amount') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_coupon_url">Plan Coupon Url</label>
                                                    <input type="text" class="form-control" name="plan_coupon_url" id="plan_coupon_url"
                                                        value="{{old('plan_coupon_url')}}" placeholder="Enter url">
                                                    @if ($errors->has('plan_coupon_url'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('plan_coupon_url') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="allowed_messages">Message Limit</label>
                                                    <input type="number" class="form-control" name="allowed_messages" id="allowed_messages"
                                                        value="{{old('allowed_messages')}}" placeholder="Enter message limit" required>
                                                    @if ($errors->has('allowed_messages'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('allowed_messages') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="job_applied_limit">Job Apply Limit</label>
                                                    <input type="number" class="form-control" name="job_applied_limit" id="job_applied_limit"
                                                        value="{{old('job_applied_limit')}}" placeholder="Enter job apply limit" required>
                                                    @if ($errors->has('job_applied_limit'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('job_applied_limit') }}
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
                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")