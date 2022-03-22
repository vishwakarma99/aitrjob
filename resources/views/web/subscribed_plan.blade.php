@include("layouts.webheader")
<style type="text/css">
    p{
        margin: 0px;
    }
</style>
        <!-- Content -->

        <div class="page-content bg-white">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full bg-white browse-job p-t50 p-b20">

                    <div class="container">

                        <div class="row">

                            @include("web.applicantsidebar")

                            <div class="col-xl-9 col-lg-8 m-b30">

                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <h4>Current Plan</h4>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="package_wrapper selected jb_cover mb-3 " style="height:auto;    border-radius: 2px;
                                        text-align: center;
                                        padding: 20px;    border: 1px solid #2f54d4 !important;">

                                            <div class="package_bx">
                                                <h4>
                                                    {{$user_plan->plan_name}}
                                                </h4>
                                                @php
                                                    $purchase_date = $user_plan->plan_purchase_date;

                                                    $earlier = strtotime($purchase_date);

                                                    $newdate = date('Y-m-d', $earlier);
                                                    
                                                    $todate= strtotime($purchase_date);
                                                    $fromdate= strtotime($newdate);
                                                    $calculate_seconds = $todate- $fromdate; // Number of seconds between the two dates
                                                    $days = floor($calculate_seconds / (24 * 60 * 60 )); 
                                                @endphp
                                        
                                                
                                                <div class="package_list">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="row">
                                                        <div class="col-md-10 col-lg-10" style="text-align: left;">
                                                            <p><b>1. Message Limit - {{$user_plan->message_limit}}</b></p>
                                                            <span>The Number of message you can send </span>
                                                            <br>
                                                            <br>
                                                            <p><b>2. Job Apply Limit - {{$user_plan->job_limit}}</b></p>
                                                            <span>The Number of job you can apply </span>
                                                            <br>
                                                            <br>
                                                            <p><b>3. Plan Duration - {{$user_plan->plan_duration}} Days</b></p>
                                                            <span>Remaining Plan duration </span>
                                                            @if(session()->get('Auth_Role_AirtrJobs') == 2)
                                                            <br>
                                                            <br>
                                                            <p><b>4. Hiring Candidates - {{$user_plan->hiring_limit}} Days</b></p>
                                                            <span>Remaining Plan duration </span>
                                                            @endif
                                                        </div>
                                                        
                                                        <div class="col-md-2 col-lg-2">
                                                            <p><b>{{$user_plan->remaining_message_limit}} </b></p>
                                                            <br>
                                                            <br>
                                                            <p><b>{{$user_plan->remaining_job_limit}}</b></p>
                                                            <br>
                                                            <br>
                                                            <p><b>{{$days}} Days</b></p>
                                                            @if(session()->get('Auth_Role_AirtrJobs') == 2)
                                                            <br>
                                                            <br>
                                                            <p><b>{{$user_plan->remaining_hiring_limit}}</b></p>
                                                            @endif
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <h4>Upgrade Plan</h4>
                                    </div>
                                    @foreach ($plans as $iii => $plan)
                                    @if($plan->id != 1)                                    
                                    <div class="col-md-6 col-lg-6">
                                        <div class="package_wrapper selected jb_cover mb-3 " style="height:auto;    border-radius: 2px;
                                        text-align: center;
                                        padding: 20px;    border: 1px solid #2f54d4 !important;">

                                            <div class="package_bx">
                                                <h4>
                                                    {{$plan->plan_name}}
                                                </h4>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;    background: #F0F0F0;">
                                                        Payment Details</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>Plan Amount : {{$plan->plan_currency}} {{$plan->plan_amount}}</p>
                                                </div>

                                                <input type="hidden" class="form-control" id="plan_id" name="plan_id" value="{{$plan->id}}" 
                                                            placeholder="Enter Code">
                                                <div>
                                                    <div class="form-group">
                                                        <label>COUPON CODE(If any)</label>
                                                        <input type="text" class="form-control" data-id="{{$plan->id}}" id="coupon_code_{{$plan->id}}" name="coupon_code" placeholder="Enter Code">
                                                        <a class="apply_coupon" id="{{$plan->id}}">Apply Coupon</a>
                                                    </div>
                                                </div>
                                                <div class="razorpay-embed-btn" id="PayButton_{{$plan->id}}" data-url="{{$plan->plan_url}}" data-text="Pay Now" data-color="#528FF0" data-size="large">
                                                  <script>
                                                    (function(){
                                                      var d=document; var x=!d.getElementById('razorpay-embed-btn-js')
                                                      if(x){ var s=d.createElement('script'); s.defer=!0;s.id='razorpay-embed-btn-js';
                                                      s.src='https://cdn.razorpay.com/static/embed_btn/bundle.js';d.body.appendChild(s);} else{var rzp=window['__rzp__'];
                                                      rzp && rzp.init && rzp.init()}})();
                                                  </script>
                                                </div>
                                                
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;
                                                    background: #F0F0F0;
                                                    color: #fff;
                                                    background: #F7AA34;
                                                    margin: 20px 0px 20px 0px;">Plan Benefit</p>
                                                </div>
                                                @if(session()->get('Auth_Role_AirtrJobs') == 1)
                                                <div class="package_list">
                                                    <p>1. Allowed Message({{$plan->allowed_messages}})</p>
                                                    <p>2. Allowed Apply Job({{$plan->job_applied_limit}})</p>
                                                    <p>3. Plan Duration({{$plan->plan_duration}})</p>

                                                </div>
                                                @else
                                                <div class="package_list">
                                                    <p>1. Allowed Message({{$plan->message_limit}})</p>
                                                    <p>2. Allowed Post Job({{$plan->job_post_limit}})</p>
                                                    <p>3. Hiring Candidates({{$plan->hiring_limit}})</p>
                                                    <p>4. Plan Duration({{$plan->plan_duration}})</p>

                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>

        <!-- Content END-->

        <!-- Modal Box -->

        <div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <div class="modal-body row m-a0 clearfix">

                        <div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0"
                            style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">

                            <div class="form-info text-white align-self-center">

                                <h3 class="m-b15">Login To You Now</h3>

                                <p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry has been the industry.</p>

                                <ul class="list-inline m-a0">

                                    <li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>

                                    <li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>

                                </ul>

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 p-a0">

                            <div class="lead-form browse-job text-left">

                                <form>

                                    <h3 class="m-t0">Personal Details</h3>

                                    <div class="form-group">

                                        <input value="" class="form-control" placeholder="Name" />

                                    </div>

                                    <div class="form-group">

                                        <input value="" class="form-control" placeholder="Mobile Number" />

                                    </div>

                                    <div class="clearfix">

                                        <button type="button" class="btn-primary site-button btn-block">Submit </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Modal Box End -->

        @include("layouts.webfooter")
<script type="text/javascript">

    $('#idPaynowFormBtn').click(function() {
        $('span.error_msg').remove();
        
        var data = new FormData($('#idPaynowForm')[0]);
        if($('#coupon_code').val() != ''){
            $.ajax({
                url: '/checkCouponcode',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                async: false,
                datatype: 'JSON',
                data: data,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.message) {
                        window.location.href = response.redirect;
                    }else{
                        alert('Invalid Coupon code')
                        $('#coupon_code').val('');
                    }
                }
            });    
        }
        
        $.ajax({
            url: '/payNow',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            async: false,
            datatype: 'JSON',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.message) {
                    window.location.href = response.redirect;
                }else{
                    alert('Invalid Coupon code')
                    $('#coupon_code').val('');
                }
            }
        });    
    });


</script>