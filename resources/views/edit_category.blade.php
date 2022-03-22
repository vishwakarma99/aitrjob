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
                            <h2 class="content-header-title float-start mb-0">Edit Category Details</h2>

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
                                    <form class="needs-validation" method="post" action="{{ URL::to('admin/category/update/'.$category->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Category</label>
                                                    <input type="text" class="form-control" name="category_name" id="category_name"
                                                        value="{{$category->category_name}}" placeholder="Enter category">
                                                    @if ($errors->has('category_name'))
                                                        <span style="color:#fb0303">
                                                            {{ $errors->first('category_name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
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
                                                    <img id="pic_blog" src="{{ URL::asset('../storage/app/'.$category->category_image) }}" width="200" height="200">
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
      
      $('#category_image').change(function(){
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