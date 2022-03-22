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
                            <h2 class="content-header-title float-start mb-0">Edit Blog</h2>

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
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/blog/update/'.$blog->blog_id) }}" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Blog Category</label>
                                                    <select class="form-control" id="blog_category_id" name="blog_category_id" value="{{old('blog_category_id')}}">
                                                        <option value="">Select Option</option>
                                                        @foreach ($blogcategory as $category)
                                                            <option value="{{$category->id}}" {{$blog->blog_category_id == $category->id ? "selected" : "" }}>{{$category->blog_category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog_heading">Blog Header</label>
                                                    <input type="text" class="form-control" name="blog_heading" id="blog_heading"
                                                        value="{{$blog->blog_heading}}" placeholder="Enter blog header">
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
                                                        value="{{$blog->blog_desc}}" placeholder="Enter blog description">
                                                    @if ($errors->has('blog_desc'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('blog_desc') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Blog Image</label>
                                                    <input type="file" class="form-control" name="blog_image" id="blog_image"
                                                        value="{{old('blog_image')}}" placeholder="Enter blog image">
                                                    @if ($errors->has('blog_image'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('blog_image') }}
                                                        </span>
                                                    @endif
                                                    <img id="pic_blog" src="{{ URL::asset('../storage/app/'.$blog->blog_image) }}" width="200" height="200">

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
      
      $('#blog_image').change(function(){
            if (this.files && this.files[0]) {
                console.log('eeee');
                // $('.pic1class').css('display','block');
                // $('#pickoneremoving1').css('display','none');
                // pickoneremoving
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pic_blog').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

  </script>