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
                                            <h5 class="font-weight-700 pull-left text-uppercase">Upload Certificate</h5>
                                        </div>
                                        <form class="needs-validation" method="post" action="{{ URL::to('addAppCertificates') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Upload Certificate</label>
                                                        <div class="custom-file">
                                                            <p class="m-auto align-self-center">
                                                                <i class="fa fa-upload"></i>
                                                                Upload Certificate
                                                            </p>
                                                            <input type="file" class="site-button form-control"
                                                                id="certificate1" name="certificate1" required>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-b30">
                                                <div class="col-lg-12 col-md-6" style="display:flex;">
                                                @if($userData['upload_certificates'] != '')
                                                    @foreach ($userData['upload_certificates'] as $i => $certificate)
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <a class="btn btn-danger" href="{{ URL::to('deleteCertificate/'.$certificate->id) }}" style="margin: 2px;"  onclick="return confirm('{{ trans('Are you sure you want to delete certificate') }}')"> <i class="me-40 fa fa-trash" ></i></a>
                                                            <embed src="{{ URL::asset('../storage/app/'.$certificate->certificate1) }}#toolbar=0" width="300px" height="200px" type="application/pdf" style="width: 100%; height: 600%; border: none; overflow: hidden; min-height: 50vh;" scrolling="no"></embed>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                                            
                                                            
                                                        
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