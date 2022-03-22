@include("layouts.webheader")
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
                                    @foreach ($plans as $iii => $plan)
                                    
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
                                                <div>
                                                    <div class="form-group">
                                                        <label>COUPON CODE(If any)</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Code">

                                                    </div>
                                                </div>
                                                <div class="btn btn-primary " style="width: 100%;">
                                                    <a href="#" style="color: #fff;">Pay Now</a>
                                                </div>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;
                                                    background: #F0F0F0;
                                                    color: #fff;
                                                    background: #F7AA34;
                                                    margin: 20px 0px 20px 0px;">Plan Benefit</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>1. Allowed Message(200)</p>
                                                    <p>2. Allowed Contacts(200)</p>
                                                    <p>3. Relevant Jobs(200)</p>
                                                    <p>4. Job Notification(200)</p>
                                                    <p>5. Performence Report(200)</p>
                                                    <p>6. Plan Duration(200)</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>


                                <div class="row">

                                    <div class="col-md-6 col-lg-6">
                                        <div class="package_wrapper selected jb_cover mb-3 " style="height:auto;    border-radius: 2px;
                                        text-align: center;
                                        padding: 20px;    border: 1px solid #2f54d4 !important;">

                                            <div class="package_bx">
                                                <h4>
                                                    Gold
                                                </h4>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;    background: #F0F0F0;">
                                                        Payment Details</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>Plan Amount : INR 11</p>
                                                    <p>Service Tax/GST : INR 0</p>
                                                    <p>Total Pay : INR 11.00</p>
                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                        <label>COUPON CODE(If any)</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Code">

                                                    </div>
                                                </div>
                                                <div class="btn btn-primary " style="width: 100%;">
                                                    <a href="#" style="color: #fff;">Pay Now</a>
                                                </div>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;
                                                    background: #F0F0F0;
                                                    color: #fff;
                                                    background: #F7AA34;
                                                    margin: 20px 0px 20px 0px;">Plan Benefit</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>1. Allowed Message(200)</p>
                                                    <p>2. Allowed Contacts(200)</p>
                                                    <p>3. Relevant Jobs(200)</p>
                                                    <p>4. Job Notification(200)</p>
                                                    <p>5. Performence Report(200)</p>
                                                    <p>6. Plan Duration(200)</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="package_wrapper selected jb_cover mb-3 " style="height:auto;    border-radius: 2px;
                                        text-align: center;
                                        padding: 20px;    border: 1px solid #2f54d4 !important;">

                                            <div class="package_bx">
                                                <h4>
                                                    Platinum
                                                </h4>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;    background: #F0F0F0;">
                                                        Payment Details</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>Plan Amount : INR 11</p>
                                                    <p>Service Tax/GST : INR 0</p>
                                                    <p>Total Pay : INR 11.00</p>
                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                        <label>COUPON CODE(If any)</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Code">

                                                    </div>
                                                </div>
                                                <div class="btn btn-primary " style="width: 100%;">
                                                    <a href="#" style="color: #fff;">Pay Now</a>
                                                </div>
                                                <div class="">
                                                    <p style="padding: 12px 0px 12px 0px;
                                                    background: #F0F0F0;
                                                    color: #fff;
                                                    background: #F7AA34;
                                                    margin: 20px 0px 20px 0px;">Plan Benefit</p>
                                                </div>
                                                <div class="package_list">
                                                    <p>1. Allowed Message(200)</p>
                                                    <p>2. Allowed Contacts(200)</p>
                                                    <p>3. Relevant Jobs(200)</p>
                                                    <p>4. Job Notification(200)</p>
                                                    <p>5. Performence Report(200)</p>
                                                    <p>6. Plan Duration(200)</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
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