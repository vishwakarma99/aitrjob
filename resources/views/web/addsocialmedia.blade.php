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

                                <div class="job-bx submit-resume">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    <div class="job-bx-title clearfix">

                                        <h5 class="font-weight-700 pull-left text-uppercase">Social Media Links</h5>

                                        <a href="{{ URL::to('myprofile.html') }}"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>

                                    <form class="needs-validation" method="post" action="{{ URL::to('addEmpSocialMediaDetails') }}">
                                        @csrf

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Facebook</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['social_media_links']->facebook_url) ? $userData['social_media_links']->facebook_url : null}}" name="facebook_url" id="facebook_url" placeholder="Enter Facebook Url">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Twitter</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['social_media_links']->twitter_url) ? $userData['social_media_links']->twitter_url : null}}" name="twitter_url" id="twitter_url" placeholder="Enter Twitter Url">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Instagram</label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['social_media_links']->instagram_url) ? $userData['social_media_links']->instagram_url : null}}" name="instagram_url" id="instagram_url" placeholder="Enter Instagram Url">

                                                    
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Linkedin</label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['social_media_links']->linkedin_url) ? $userData['social_media_links']->linkedin_url : null}}" name="linkedin_url" id="linkedin_url" placeholder="Enter LinkedIn Url">

                                                   
                                                </div>

                                            </div>

                                        </div>
                                        <button type="submit" class="site-button m-b30">Save</button>
                                    </form>
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