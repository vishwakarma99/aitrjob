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
                            <h2 class="content-header-title float-start mb-0">Add Blog</h2>

                        </div>
                    </div>
                </div>
       
            </div>
            <div class="content-body">
               

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif

                                </div>
                                
                                <div class="card-body">
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addblog') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog_category_id">Blog Category</label>
                                                    <select class="form-control" id="blog_category_id" name="blog_category_id" value="{{old('blog_category_id')}}" required>
                                                        <option value="">Select Option</option>
                                                        @foreach ($blogcategory as $category)
                                                            <option value="{{$category->id}}">{{$category->blog_category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog_heading">Blog heading</label>
                                                    <input type="text" class="form-control" name="blog_heading" id="blog_heading"
                                                        value="{{old('blog_heading')}}" placeholder="Enter blog heading" required>
                                                    @if ($errors->has('blog_heading'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('blog_heading') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog_desc">Blog Description</label>
                                                    <input type="text" class="form-control" name="blog_desc" id="blog_desc"
                                                        value="{{old('blog_desc')}}" placeholder="Enter blog heading" required>
                                                    @if ($errors->has('blog_desc'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('blog_desc') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog_image">Blog Image</label>
                                                    <input type="file" class="form-control" name="blog_image" id="blog_image"
                                                        value="{{old('blog_image')}}" placeholder="Enter blog image" required>
                                                    
                                                    {{-- <img name="blog_image" id="blog_image" alt="Blog image" width="500" height="600"> --}}
                                                    @if ($errors->has('blog_image'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('blog_image') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- /Bootstrap Validation -->
                        <div class="col-md-6 col-6">
                            <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Blogs List</h4>
                                            </div>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Blog Category</th>
                                                            <th>Blog Heading</th>
                                                            <th>Blog Description</th>
                                                            <th>Blog Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        @foreach ($blog as $i => $bloData)

                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td><span class="fw-bold">{{$bloData->blog_category}} </span></td>
                                                            <td><span class="fw-bold">{{$bloData->blog_heading}} </span></td>
                                                            <td><span class="fw-bold">{{$bloData->blog_desc}} </span></td>
                                                            <td><img src="{{ URL::asset('../storage/app/'.$bloData->blog_image) }}" width="50" height="50">
                                                            </td>
                                                            <td style="display: flex;">
                                                                
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/blog/show/'.$bloData->blog_id) }}" style="margin: 2px;"> <i  
                                                                class="me-40 fa fa-edit"></i></a>
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/blog/delete/'.$bloData->blog_id) }}" style="margin: 2px;"  onclick="return confirm('{{ trans('Are you sure you want to delete this blog details') }}')"> <i
                                                                
                                                                class="me-40 fa fa-trash" ></i></a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $iii++;
                                                        @endphp
                                                        @endforeach
                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

  @include("layouts.footer")