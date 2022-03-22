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
                            <h2 class="content-header-title float-start mb-0">Add Employer Plan</h2>

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
                                    <div class="card-header">
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                            Plan CallBack Url : {{ Session::get('callback_message') }}
                                        </div>
                                    </div>
                                    @endif
                                

                                </div>
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addempplan') }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_name">Plan</label>
                                                    <input type="text" class="form-control" name="plan_name" id="plan_name"
                                                        value="{{old('plan_name')}}" placeholder="Enter plan">
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
                                                        value="{{old('plan_duration')}}" placeholder="Enter duration (In Days)">
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
                                                        value="{{old('plan_currency')}}" placeholder="Enter currency">
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
                                                        value="{{old('plan_amount')}}" placeholder="Enter amount">
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
                                                    <label class="form-label" for="message_limit">Message Limit</label>
                                                    <input type="number" class="form-control" name="message_limit" id="message_limit"
                                                        value="{{old('message_limit')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('message_limit'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('message_limit') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="job_post_limit">Job Post Limit</label>
                                                    <input type="number" class="form-control" name="job_post_limit" id="job_post_limit"
                                                        value="{{old('job_post_limit')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('job_post_limit'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('job_post_limit') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="hiring_limit">Hiring Limit</label>
                                                    <input type="number" class="form-control" name="hiring_limit" id="hiring_limit"
                                                        value="{{old('hiring_limit')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('hiring_limit'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('hiring_limit') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--<div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="benefit1">Benefit 1</label>
                                                    <input type="text" class="form-control" name="benefit1" id="benefit1"
                                                        value="{{old('benefit1')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('benefit1'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('benefit1') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="benefit2">Benefit 2</label>
                                                    <input type="text" class="form-control" name="benefit2" id="benefit2"
                                                        value="{{old('benefit2')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('benefit2'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('benefit2') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="benefit3">Benefit 3</label>
                                                    <input type="text" class="form-control" name="benefit3" id="benefit3"
                                                        value="{{old('benefit3')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('benefit3'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('benefit3') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="benefit4">Benefit 4</label>
                                                    <input type="text" class="form-control" name="benefit4" id="benefit4"
                                                        value="{{old('benefit4')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('benefit4'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('benefit4') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="benefit5">Benefit 5</label>
                                                    <input type="text" class="form-control" name="benefit5" id="benefit5"
                                                        value="{{old('benefit5')}}" placeholder="Enter message limit">
                                                    @if ($errors->has('benefit5'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('benefit5') }}
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
                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")