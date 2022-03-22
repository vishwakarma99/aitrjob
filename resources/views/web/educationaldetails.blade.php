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
                                            <h5 class="font-weight-700 pull-left text-uppercase">Educational Details</h5>
                                        </div>
                                        <form class="needs-validation" method="post"  id="idEducationalForm">
                                        @csrf
                                        @if(count($userData['educational_details']) > 0)
                                            <div class="classEducationBlock">
                                            @php 
                                                $TempSr = 1;
                                            @endphp
                                            @foreach ($userData['educational_details'] as $iii => $education)
                                                    <div class="row m-b30">
                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="form-group">

                                                                <label>Qualification:</label>

                                                                <input type="text" class="form-control classQualification" name="qualification[]" id="qualification_{{$TempSr}}"
                                                                    value="{{isset($education->qualification) ? $education->qualification : null}}" placeholder="Enter Qualification">

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="form-group">

                                                                <label>Year of Pass out:</label>

                                                                <select id="passout_yr_{{$TempSr}}" name="passout_yr[]" class="form-control classPassoutYear">
                                                                    <option value="">Please select an option</option>
                                                                    @foreach ($Years as $i => $Year)
                                                                    <option value="{{$Year}}" {{$Year == $education->passout_yr ? "selected" : "" }}>{{$Year}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="form-group">

                                                                <label>University/Board Name:</label>

                                                                <input type="text" class="form-control classUniversity" name="university[]" id="university_{{$TempSr}}"
                                                                    value="{{isset($education->university) ? $education->university : null}}" placeholder="Enter University/Board">

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="form-group">

                                                                <label>Marks:</label>

                                                                <input type="text" class="form-control classMarks" name="marks[]" id="marks_{{$TempSr}}"
                                                                    value="{{isset($education->marks) ? $education->marks : null}}" placeholder="Enter Marks">

                                                            </div>

                                                        </div>
                                                        
                                                        @if($iii == 0)
                                                            <em type="button" class="btn btn-danger classRemoveBtn" id="idRemoveBtnOtherPrice_{{$TempSr}}" style="display:none" title="Remove"><i class="fa fa-trash"></i></em>
                                                            <a type="button" class="btn btn-info classBtnAddAnother" id="idAddNewEducation">Add</a>    
                                                        @else
                                                            <em type="button" class="btn btn-danger classRemoveBtn" id="idRemoveBtnOtherPrice_{{$TempSr}}" title="Remove"><i class="fa fa-trash"></i></em>
                                                        @endif
                                                    </div>
                                                
                                                
                                                @php
                                                    $TempSr++;
                                                @endphp
                                            @endforeach                                            
                                            </div>
                                            <button type="button" name="idEducationalFormBtn" id="idEducationalFormBtn" class="site-button m-b30">Save</button>
                                        </form>
                                        @else
                                        <form class="needs-validation" method="post" id="idEducationalForm">
                                        @csrf
                                    <div class="classEducationBlock">
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Qualification:</label>

                                                    <input type="text" class="form-control classQualification" name="qualification[]" id="qualification_1"
                                                        value="" placeholder="Enter Qualification">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Year of Pass out:</label>

                                                    <select id="passout_yr_1" name="passout_yr[]" class="form-control classPassoutYear">
                                                        <option value="">Please select an option</option>
                                                        @foreach ($Years as $i => $Year)
                                                        <option value="{{$Year}}">{{$Year}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>University/Board Name:</label>

                                                    <input type="text" class="form-control classUniversity" name="university[]" id="university_1"
                                                        value="" placeholder="Enter University/Board">

                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6">

                                                <div class="form-group">

                                                    <label>Marks:</label>

                                                    <input type="text" class="form-control classMarks" name="marks[]" id="marks_1"
                                                        value="" placeholder="Enter Marks">

                                                </div>

                                            </div>
                                            <em type="button" class="btn btn-danger classRemoveBtn" id="idRemoveBtnOtherPrice_1" style="display:none" title="Remove"><i class="fa fa-trash"></i></em>
                                            <a type="button" class="btn btn-info classBtnAddAnother" id="idAddNewEducation">Add</a>
                                            
                                        </div>
                                    </div>
                                        <button type="button" name="idEducationalFormBtn" id="idEducationalFormBtn" class="site-button m-b30">Save</button>
                                    </form>
                                        </div>
                                    @endif
                                        
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

    $('#idEducationalFormBtn').click(function() {
        $('span.error_msg').remove();
        
        var idRemoveBtn = $('.classQualification:last').attr('id');
        var iCount = idRemoveBtn.split("_")[1];
        var oldCount = iCount;
        iCount++;
        
        iEducations = iCount;
        
        for (let iii = 1; iii <= iEducations; iii++) {
        
            if(($('#qualification_'+iii).val() == "") || ($('#passout_yr_'+iii).val() == "") ||($('#university_'+iii).val() == "") || ($('#marks_'+iii).val() == "")){
                if($('#qualification_'+iii).val() == ""){
                    id = '#qualification_'+iii;
                    val = "Enter Qualification";
                }else if($('#passout_yr_'+iii).val() == ""){
                    id = '#passout_yr_'+iii;
                    val = "Enter Passout Year";
                }else if($('#university_'+iii).val() == ""){
                    id = '#university_'+iii;
                    val = "Enter University";
                }else if($('#marks_'+iii).val() == ""){
                    id = '#marks_'+iii;
                    val = "Enter Marks";
                }

                sError =
                '<span class="error_msg" style="color:#fb0303">'+ val +'</span>';
                $(id).after(sError);
                
                return false;
            }
        }
        
        var data = new FormData($('#idEducationalForm')[0]);

        $.ajax({
            url: App_URL+'/addEducationalDetails',
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