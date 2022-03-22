@include("layouts.webheader")
        <!-- Content -->

        <div class="page-content bg-white">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full bg-white p-t50 p-b20">

                    <div class="container">

                        <div class="row">

                            @include("web.applicantsidebar")

                            <div class="col-xl-9 col-lg-8 m-b30">

                                <div class="job-bx clearfix">

                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Hired Candidates</h5>

                                        <a href="company-manage-job.html"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>
                                    {{dd($JobMaster)}}
                                    <ul class="post-job-bx browse-job-grid post-resume row">
                                        <li class="col-lg-12 col-md-12">

                                            <div class="post-bx">

                                                <div class="d-flex m-b20">

                                                    <div class="job-post-info">

                                                        <h5 class="m-b0"><a href="jobs-profile.html">Simran Sutar</a>
                                                        </h5>

                                                        <p class="m-b5 font-13">

                                                            <a href="javascript:void(0);" class="text-primary"><i
                                                                    class="fa fa-suitcase"></i> Management
                                                        </p>

                                                        <ul>
                                                            <li><i class="fa fa-clock-o"></i>4th August 2021</li>
                                                            <li>Applied for ACE Institue
                                                            </li>


                                                        </ul>

                                                    </div>

                                                </div>

                                                <div class="job-time m-t15 m-b10">

                                                    <a href="applicant_profile_detail.html" class="site-button"
                                                        style="color: #fff;margin: 0px 5px 0px 5px;"><i
                                                            class="fa fa-file"> SimranSutarCV.pdf</i></a>
                                                </div>

                                                <a href="files/pdf-sample.pdf" target="blank" class="job-links">

                                                    <i class="fa fa-download"></i>

                                                </a>

                                            </div>

                                        </li>
                                        @foreach($Jobs as $key => $job)
                                        <li class="col-lg-6 col-md-6">

                                            <div class="post-bx">

                                                <div class="d-flex m-b20">

                                                    <div class="job-post-info">

                                                        <h5 class="m-b0"><a href="jobs-profile.html">Simran Sutar</a>
                                                        </h5>

                                                        <p class="m-b5 font-13">

                                                            <a href="javascript:void(0);" class="text-primary"><i
                                                                    class="fa fa-suitcase"></i> Management
                                                        </p>

                                                        <ul>
                                                            <li><i class="fa fa-clock-o"></i>4th August 2021</li>
                                                            <li>Applied for ACE Institue
                                                            </li>


                                                        </ul>

                                                    </div>

                                                </div>

                                                <div class="job-time m-t15 m-b10">

                                                    <a href="applicant_profile_detail.html" class="site-button"
                                                        style="color: #fff;margin: 0px 5px 0px 5px;"><i
                                                            class="fa fa-file"> SimranSutarCV.pdf</i></a>
                                                </div>

                                                <a href="files/pdf-sample.pdf" target="blank" class="job-links">

                                                    <i class="fa fa-download"></i>

                                                </a>

                                            </div>

                                        </li>
                                        @endforeach

                                    </ul>

                                    <div class="pagination-bx float-right">

                                        <ul class="pagination">

                                            <li class="previous"><a href="javascript:void(0);"><i
                                                        class="ti-arrow-left"></i> Prev</a></li>

                                            <li class="active"><a href="javascript:void(0);">1</a></li>

                                            <li><a href="javascript:void(0);">2</a></li>

                                            <li><a href="javascript:void(0);">3</a></li>

                                            <li class="next"><a href="javascript:void(0);">Next <i
                                                        class="ti-arrow-right"></i></a></li>

                                        </ul>

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