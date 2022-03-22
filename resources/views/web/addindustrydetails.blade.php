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

                                        <h5 class="font-weight-700 pull-left text-uppercase">Industry Details</h5>

                                        <a href="{{ URL::to('myprofile.html') }}"
                                            class="site-button right-arrow button-sm float-right">Back</a>

                                    </div>

                                    <form class="needs-validation" method="post" id="idIndustryForm" name="idIndustryForm">
                                        @csrf


                                        <div class="row">

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Industry that i hire for : </label>
                                        @if ($userData['sector_details'] != '')
                                                    <select id="industry_type" name="industry_type" class="form-control">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_industry as $i => $industry)
                                                        <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}"  {{$industry->job_industry_name == $userData['sector_details']->industry_hire_for ? "selected" : "" }}>{{$industry->job_industry_name}}</option>
                                                        @endforeach
                                                    </select>
                                        @else
                                                        <select id="industry_type" name="industry_type" class="form-control">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_industry as $i => $industry)
                                                        <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}"  >{{$industry->job_industry_name}}</option>
                                                        @endforeach
                                                    </select>
                                        @endif
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Functional area that i hire for : </label>
                                          @if ($userData['sector_details'] != '')          
                                                    <select id="p-functional_area" name="functional_area" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($funAreas as $i => $funArea)
                                                        <option data-id="{{$funArea->id}}" value="{{$funArea->job_fun_area_name}}"  {{$funArea->job_fun_area_name == $userData['sector_details']->functional_area ? "selected" : "" }}>{{$funArea->job_fun_area_name}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                    
                                        @else
                                        
                                                    <select id="p-functional_area" name="functional_area" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($funAreas as $i => $funArea)
                                                        <option data-id="{{$funArea->id}}" value="{{$funArea->job_fun_area_name}}"  >{{$funArea->job_fun_area_name}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                        @endif

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Skills for which I hire : </label>

                                                    <input type="text" class="form-control" value="{{isset($userData['sector_details']->skills) ? $userData['sector_details']->skills : null}}" name="skills" id="skills" placeholder="Enter Skills" required>
                                                   

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Intervivew will be done between </label>

                                                    <input type="text" class="form-control" value="{{isset($userData['sector_details']->interview_day) ? $userData['sector_details']->interview_day : null}}" name="interview_day" id="interview_day" placeholder="Enter Skills" required>
                                           

                                                </div>

                                            </div>

                                        </div>
                                        <button type="button" id="idIndustryFormBtn" name="idIndustryFormBtn" class="site-button m-b30">Save</button>

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



@include("layouts.webfooter")
<script type="text/javascript">

    $('#idIndustryFormBtn').click(function() {
        console.log('eee')
        $('span.error_msg').remove();
        
        var data = new FormData($('#idIndustryForm')[0]);

        var industry_type = $('#industry_type').val();
        if(industry_type == ''){
            alert('Please select industry type');
            return false;
        }

        var functional_area = $('#p-functional_area ').val();
        if(functional_area == ''){
            alert('Please select functional area');
            return false;
        }
        
        var skills = $('#skills').val();
        if(skills == ''){
            alert('Please enter skills');
            return false;
        }

        var interview_day = $('#interview_day').val();
        if(interview_day == ''){
            alert('Please enter interview day');
            return false;
        }

        $.ajax({
            url: '/addEmpIndustryDetails',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            async: false,
            datatype: 'JSON',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            }
        });
    });


</script>