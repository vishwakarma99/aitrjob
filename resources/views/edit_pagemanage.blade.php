@include("layouts.header")
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Edit State Details</h2>

                        </div>
                    </div>
                </div>
       
            </div>
            <div class="content-body">
               

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/updatePageData/'.$data->id) }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="page_name">Page Name</label>
                                                    <input type="text" class="form-control" name="page_name" id="page_name"
                                                        value="{{$data->page_name}}" placeholder="Enter page_name" readonly>
                                                    @if ($errors->has('page_name'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('page_name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="description">Page Description</label>
                                                    <textarea  class="form-control" cols="10" rows="10" maxlength="160" id="description"  name="description">{{ $data->description }}</textarea>
                                                    {{--<input type="text" class="form-control" name="description" id="description"
                                                        value="{{$data->description}}" placeholder="Enter description">--}}
                                                    @if ($errors->has('description'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('description') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->

                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")
 <script>
  if (jQuery.isFunction(jQuery.fn.select2)) {
		// Change all the select boxes to select2
		jQuery("select").select2();
	}

    CKEDITOR.replace('description');
</script>
