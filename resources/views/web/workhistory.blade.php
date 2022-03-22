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

                                            <h5 class="font-weight-700 pull-left text-uppercase">Work History</h5>

                                        </div>
                                    <form class="needs-validation" id="idWorkHistoryForm" name="idWorkHistoryForm">
                                        @csrf
                                        <div class="row m-b30">


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Name Of Organisation/Company:</label>

                                                    <input type="text" class="form-control"
                                                        value="{{isset($userData['work_history']->name_of_company) ? $userData['work_history']->name_of_company : null}}" id="name_of_company" name="name_of_company" placeholder="Location" required>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Other Organisation (Optional):</label>

                                                    <input type="text" class="form-control" id="other_company" name="other_company" 
                                                        value="{{isset($userData['work_history']->other_company) ? $userData['work_history']->other_company : null}}" placeholder="Location">

                                                </div>

                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <label>Work Status:</label>
                                                    <div class="row" style="margin: 0 10px;">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <input type="radio" id="customRadioInline3" name="work_status" class="form-check-input" value="Fresher" {{ (isset($userData['work_history']->work_status) && $userData['work_history']->work_status == 'Fresher' ? "checked" : '') }} required>

                                                                <label class="form-check-label" for="work_status">Fresher</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                            <input type="radio" id="customRadioInline4" name="work_status" class="form-check-input" value="Experianced" {{ (isset($userData['work_history']->work_status) && $userData['work_history']->work_status == 'Experianced' ? "checked" : '')}} required>
                                                            <label class="form-check-label" for="work_status">Experianced</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Director Reference(Optional):</label>

                                                    <input type="text" class="form-control" id="director_reference" name="director_reference" 
                                                        value="{{isset($userData['work_history']->director_reference) ? $userData['work_history']->director_reference : null}}" placeholder="Enter Ref. Number">

                                                </div>

                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">
                                                    
                                                    <label> Job Industry:</label>
                                                    @if($userData['work_history'] != '')
                                                    <select id="industry_type" name="industry_type" class="form-control">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_industry as $i => $industry)
                                                        <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}"  {{$industry->job_industry_name == $userData['work_history']->industry_type ? "selected" : "" }}>{{$industry->job_industry_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @else
                                                    <select id="industry_type" name="industry_type" class="form-control">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_industry as $i => $industry)
                                                        <option data-id="{{$industry->id}}" value="{{$industry->job_industry_name}}">{{$industry->job_industry_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                    @if ($errors->has('industry_type'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('industry_type') }}
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label> Job Functional Area:</label>

                                                    <select id="p-functional_area" name="functional_area" class="form-control"  >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($funAreas as $i => $funArea)
                                                        <option data-id="{{$funArea->id}}" value="{{$funArea->job_fun_area_name}}"  {{$funArea->job_fun_area_name == $userData['work_history']->functional_area ? "selected" : "" }}>{{$funArea->job_fun_area_name}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                    @if ($errors->has('functional_area'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('functional_area') }}
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Annual Salary:</label>
                                                    
                                                    @if($userData['work_history'] != '')
                                                    <select id="annual_salary" name="annual_salary" class="form-control" >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_salary as $i => $salary)

                                                            @php
                                                                $newsalary = $salary->job_min_salary.'-'.$salary->job_max_salary;
                                                            @endphp
                                                        <option value="{{$salary->job_min_salary}}-{{$salary->job_max_salary}}" {{$newsalary}} == {{$userData['work_history']->annual_salary ? "selected" : "" }}>{{$salary->job_min_salary}}-{{$salary->job_max_salary}}</option>
                                                        @endforeach
                                                    </select>

                                                    @else
                                                    <select id="annual_salary" name="annual_salary" class="form-control" >
                                                        <option value="">Please select an option</option>
                                                        @foreach ($job_salary as $i => $salary)

                                                        <option value="{{$salary->job_min_salary}}-{{$salary->job_max_salary}}">{{$salary->job_min_salary}}-{{$salary->job_max_salary}}</option>
                                                        @endforeach
                                                    </select>

                                                    @endif
                                                    
                                                </div>

                                            </div>

                                                <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Date of Joining:</label>

                                                    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining"  value="{{isset($userData['work_history']->date_of_joining) ? $userData['work_history']->date_of_joining : null}}" placeholder="">

                                                </div>

                                            </div>


                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Date of Leaving:</label>

                                                    <input type="date" class="form-control" id="date_of_leaving" name="date_of_leaving"  value="{{isset($userData['work_history']->date_of_leaving) ? $userData['work_history']->date_of_leaving : null}}" placeholder="">

                                                </div>

                                            </div>



                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Achievements:</label>

                                                    <input type="text" class="form-control" id="achivements" name="achivements" 
                                                        value="{{isset($userData['work_history']->achivements) ? $userData['work_history']->achivements : null}}" placeholder="Enter Achievements">

                                                </div>

                                            </div>
                                        </div>
                                        <button type="button" class="site-button m-b30" id="idWorkHistoryFormBtn">Save</button>
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

    $('#idWorkHistoryFormBtn').click(function() {
        $('span.error_msg').remove();
        
        var data = new FormData($('#idWorkHistoryForm')[0]);

        var name_of_company = $('#name_of_company').val();
        if(name_of_company == ''){
            alert('Please enter name');
            return false;
        }
        var workStatus = $('input[name="work_status"]:checked').val();
        if(workStatus == ''){
            alert('Please select work status');
            return false;
        }

        var industry_type = $('#industry_type').val();
        if(industry_type == ''){
            alert('Please select industry type');
            return false;
        }

        var functional_area = $('#p-functional_area').val();
        if(functional_area == ''){
            alert('Please select functional area');
            return false;
        }

        $.ajax({
            url: App_URL+'/addWorkDetails',
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