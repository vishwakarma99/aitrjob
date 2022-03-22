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
                            <h2 class="content-header-title float-start mb-0">Add State</h2>

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
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/addjobcategory') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="category_name">Category</label>
                                                    <input type="text" class="form-control" name="category_name" id="category_name"
                                                        value="{{old('category_name')}}" placeholder="Enter Category" required>
                                                    @if ($errors->has('category_name'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('category_name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="category_image">Category Image</label>
                                                    <input type="file" class="form-control" name="category_image" id="category_image"
                                                        value="{{old('category_image')}}" placeholder="Enter Category image" required>
                                                    
                                                    @if ($errors->has('category_image'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('category_image') }}
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
                                                <h4 class="card-title">Category List</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category Name</th>
                                                            <th>Category Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                        @endphp
                                                        @foreach ($Category as $i => $cate)
                                                        <tr>
                                                            <td>{{$iii}}</td>
                                                            <td>
                                                                <span class="fw-bold">{{$cate->category_name}} </span>
                                                            </td>
                                                            <td><img src="{{ URL::asset('../storage/app/'.$cate->category_image) }}" width="50" height="50">
                                                            </td>
                                                            
                                                            <td style="display: flex;">
                                                                
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/category/show/'.$cate->id) }}" style="margin: 2px;"> <i  
                                                                class="me-40 fa fa-edit"></i></a>
                                                            <a class="btn btn-danger" href="{{ URL::to('admin/category/delete/'.$cate->id) }}" style="margin: 2px;"  onclick="return confirm('{{ trans('Are you sure you want to delete this state details') }}')"> <i
                                                                
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