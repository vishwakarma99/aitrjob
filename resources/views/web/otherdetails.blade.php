@include("layouts.webheader")
   <div class="page-content bg-white">

            <!-- contact area -->

            <div class="content-block">

                <!-- Browse Jobs -->

                <div class="section-full bg-white browse-job p-t50 p-b20">

                    <div class="container">

                        <div class="row">

                        @include("web.applicantsidebar")
                            
                            <div class="col-xl-9 col-lg-8 m-b30">

                                <div class="job-bx job-profile">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                         
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Other Details</h5>
                                        </div>
                                        <form class="needs-validation" method="post" action="{{ URL::to('addSocialMediaDetails') }}">
                                        @csrf
                                    
                                        <div class="row m-b30">                                        

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Facebook Url:</label>

                                                    <input type="text" class="form-control" id="facebook_url" name="facebook_url"
                                                        value="{{isset($userData['other_details']->facebook_url) ? $userData['other_details']->facebook_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Youtube Url:</label>

                                                    <input type="text" class="form-control" id="youtube_url" name="youtube_url"
                                                        value="{{isset($userData['other_details']->youtube_url) ? $userData['other_details']->youtube_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Twitter Url:</label>

                                                    <input type="text" class="form-control" id="twitter_url" name="twitter_url"
                                                        value="{{isset($userData['other_details']->twitter_url) ? $userData['other_details']->twitter_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>LinkedIn Url:</label>

                                                    <input type="text" class="form-control" id="linkedin_url" name="linkedin_url"
                                                        value="{{isset($userData['other_details']->linkedin_url) ? $userData['other_details']->linkedin_url : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                        </div>
                                        <button class="site-button m-b30">Save</button>
                                        </form>
                                        
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Browse Jobs END -->

            </div>

        </div>
@include("layouts.webfooter")