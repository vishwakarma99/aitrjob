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
                                            <h5 class="font-weight-700 pull-left text-uppercase">Upload Video</h5>
                                        </div>
                                        <form class="needs-validation" method="post" action="{{ URL::to('addAppVideo') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Upload Video</label>
                                                        
                                                        <div class="custom-file">
                                                            <p class="m-auto align-self-center">
                                                                <i class="fa fa-upload"></i>
                                                                Upload Video
                                                            </p>
                                                            <input type="file" class="site-button form-control"
                                                                id="upload_video" name="upload_video" type="video/*" required>
                                                        </div>
                                                        @php
                                                            $video = '';
                                                            if($userData['upload_video_link'] != '' && $userData['upload_video_link']->upload_video != ''){
                                                                $video = $userData['upload_video_link']->upload_video;
                                                            }
                                                        @endphp
                                                        @if($video != '')
                                                        <video width="400" controls>
                                                            <source id="videoUpload" src="{{ asset('../storage/app/'.$video) }}" type="video/mp4">
                                                        </video>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>Link of Video:</label>

                                                        <input type="text" class="form-control"
                                                            placeholder="Video link" id="link_of_video" value="{{isset($userData['upload_video_link']->link_of_video) ? $userData['upload_video_link']->link_of_video : null}}" name="link_of_video">

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
<script type="text/javascript">
    $('#upload_video').change(function(){
        if (this.files && this.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#videoUpload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
</script>