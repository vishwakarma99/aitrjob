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
                                            <h5 class="font-weight-700 pull-left text-uppercase">Upload Resume</h5>
                                        </div>
                                        <form class="needs-validation" method="post" action="{{ URL::to('addAppDocumentsDetails') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Updated Resume</label>
                                                        <div class="custom-file">
                                                            <p class="m-auto align-self-center">
                                                                <i class="fa fa-upload"></i>
                                                                Upload Resume
                                                            </p>
                                                            <input type="file" class="site-button form-control"
                                                                id="upload_resume" name="upload_resume" required>
                                                        </div>
                                                        @php
                                                            $resume = '';
                                                            if($userData['upload_resume'] != '' && $userData['upload_resume']->upload_resume != ''){
                                                                $resume = $userData['upload_resume']->upload_resume;
                                                            }
                                                        @endphp
                                                        
                                    @if($resume != '')
                                                        <embed src="{{ URL::asset('../storage/app/'.$resume) }}#toolbar=0" width="300px" height="200px" type="application/pdf" style="width: 100%; height: 600%; border: none; overflow: hidden; min-height: 50vh;" scrolling="no"></embed>
                                    @endif
                                                        {{--<embed src="{{ URL::asset('/Documents/'.$userData['upload_resume']->upload_resume) }}#toolbar=0" width="300px" height="200px" type="application/pdf" style="width: 100%; height: 600%; border: none; overflow: hidden; min-height: 50vh;" scrolling="no"></embed>--}}
                                                        {{--<img alt="" src="{{ URL::asset('/Documents/'.$userData['upload_resume']->upload_resume) }}" class="w-100" id="profileImg" style="width: 300px; height: 200px;"> --}}
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">

                                                        <label>Link of Resume:</label>

                                                        <input type="text" class="form-control"
                                                            placeholder="Resume link" id="link_of_resume" value="{{isset($userData['upload_resume']->link_of_resume) ? $userData['upload_resume']->link_of_resume : null}}" name="link_of_resume">

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
{{--<script type="text/javascript">
    $('#upload_resume').change(function(){
        if (this.files && this.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profileImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
</script>--}}