@include("layouts.webheader")
    <!-- Content -->

    <div class="page-content bg-white">

        <!-- inner page banner -->

        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">

            <div class="container">

                <div class="dez-bnr-inr-entry">

                    <h1 class="text-white">Blog Details</h1>

					<!-- Breadcrumb row -->

					<div class="breadcrumb-row">

						<ul class="list-inline">

							<li><a href="#">Airt Jobs</a></li>
                            <li>Blog</li>
							<li>Blog Details</li>

						</ul>

					</div>

					<!-- Breadcrumb row END -->

                </div>

            </div>

        </div>

        <!-- inner page banner END -->

        <div class="content-area">

            <div class="container">

                <div class="row">

                    <!-- Left part start -->

                    <div class="col-lg-8 col-md-7 m-b10">

                        <!-- blog start -->

                        <div class="blog-post blog-single blog-style-1">

							<div class="dez-post-meta">

								<ul class="d-flex align-items-center">

									<li class="post-date"><i class="fa fa-calendar"></i>{{$blog->created_at}}</li>

									{{--<li class="post-author"><i class="fa fa-user"></i>By <a href="#">demongo</a> </li>--}}

									{{--<li class="post-comment"><i class="fa fa-comments-o"></i><a href="#">5k</a> </li>--}}

								</ul>

							</div>

                            <div class="dez-post-title">

                                <h4 class="post-title m-t0"><a href="{{ URL::to('blog-details/'.$blog->id) }}">{{$blog->blog_heading}}</a></h4>

                            </div>

                            <div class="dez-post-media dez-img-effect zoom-slow m-t20"> <a href="#"><img src="{{ URL::asset('../../storage/app/'.$blog->blog_image) }}" alt=""></a> </div>

                            <div class="dez-post-text">

                                <p>{{$blog->blog_desc}}</p>

                            </div>

                            {{--<div class="dez-post-tags clear">

                                <div class="post-tags">

									<a href="javascript:void(0);">Child </a> 

									<a href="javascript:void(0);">Eduction </a> 

									<a href="javascript:void(0);">Money </a> 

									<a href="javascript:void(0);">Resturent </a> 

								</div>

                            </div>

							<div class="dez-divider bg-gray-dark op4"><i class="icon-dot c-square"></i></div>
                            --}}
							

                        </div>

                        {{--<div class="clear" id="comment-list">

                            <div class="comments-area" id="comments">

                    

                                <div class="clearfix m-b20">

                                

                                    <!-- Form -->

                                    <div class="comment-respond" id="respond">

                                        <h4 class="comment-reply-title" id="reply-title">Leave A Comment : <small> <a style="display:none;" href="javascript:void(0);" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a> </small> </h4>

                                        <form class="comment-form" id="commentform" method="post" action="http://sedatelab.com/developer/donate/wp-comments-post.php">

                                            <p class="comment-form-author">

                                                <!-- <label for="author">Name <span class="required">*</span></label> -->

                                                <input type="text" value="Name" name="Name"  placeholder="Name" id="author">

                                            </p>

                                            <p class="comment-form-email">

                                                <label for="email">Email <span class="required">*</span></label>

                                                <input type="text" value="email" placeholder="Email" name="email" id="email">

                                            </p>

                                            <!-- <p class="comment-form-url">

                                                <label for="url">Website</label>

                                                <input type="text"  value="url"  placeholder="Website"  name="url" id="url">

                                            </p> -->

                                            <p class="comment-form-comment">

                                                <label for="comment">Comment</label>

                                                <textarea rows="8" name="comment" placeholder="Comment" id="comment"></textarea>

                                            </p>

                                            <p class="form-submit">

                                                <input type="submit" value="Post Comment" class="submit site-button" id="submit" name="submit">

                                            </p>

                                        </form>

                                    </div>

                                    <!-- Form -->

                                </div>

                            </div>

                        </div>--}}

                        <!-- blog END -->

                    </div>

                    <!-- Left part END -->

                    <!-- Side bar start -->

                    <div class="col-lg-4 col-md-5 sticky-top">

                        <aside  class="side-bar">

                        

                            <div class="widget recent-posts-entry">

                                <h6 class="widget-title style-1">Recent Post</h6>

                                <div class="widget-post-bx">
                                    @foreach ($blogs as $i => $blog)
                                    <div class="widget-post clearfix">

                                        <div class="dez-post-media"> <img src="{{ URL::asset('../../storage/public/blogImages/'.$blog->blog_image) }}" width="200" height="143" alt=""> </div>

                                        <div class="dez-post-info">

                                            <div class="dez-post-header">

                                                <h6 class="post-title"><a href="{{ URL::to('blog-details/'.$blog->id) }}">{{$blog->blog_heading}}</a></h6>

                                            </div>

											<div class="dez-post-meta">

												<ul class="d-flex align-items-center">

													<li class="post-date"><i class="fa fa-calendar"></i>{{$blog->created_at}}</li>

													{{--<li class="post-comment"><a href="#"><i class="fa fa-comments-o"></i>5k</a> </li>--}}

												</ul>

											</div>

                                        </div>

                                    </div>
                                    @endforeach
                         

                                </div>

                            </div>

							
                            <div class="share-details-btn">
                                
                                <h6 class="widget-title style-1">Share Post</h6>

								<ul>

									<li><a href="javascript:void(0);" class="site-button facebook button-sm"><i class="fa fa-facebook"></i> </a></li>

									<li><a href="javascript:void(0);" class="site-button google-plus button-sm"><i class="fa fa-google-plus"></i> </a></li>

									<li><a href="javascript:void(0);" class="site-button linkedin button-sm"><i class="fa fa-linkedin"></i> </a></li>

									<li><a href="javascript:void(0);" class="site-button instagram button-sm"><i class="fa fa-instagram"></i> </a></li>

									<li><a href="javascript:void(0);" class="site-button twitter button-sm"><i class="fa fa-twitter"></i> </a></li>

									<li><a href="javascript:void(0);" class="site-button whatsapp button-sm"><i class="fa fa-whatsapp"></i> </a></li>

								</ul>

							</div>
					

							


							

							

                        </aside>

                    </div>

                    <!-- Side bar END -->

                </div>

            </div>

        </div>

    </div>

    <!-- Content END-->

	<!-- Modal Box -->

	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

				<div class="modal-body row m-a0 clearfix">

					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">

						<div class="form-info text-white align-self-center">

							<h3 class="m-b15">Login To You Now</h3>

							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>

							<ul class="list-inline m-a0">

								<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>

								<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>

								<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>

								<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>

								<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>

							</ul>

						</div>

					</div>

					<div class="col-lg-6 col-md-6 p-a0">

						<div class="lead-form browse-job text-left">

							<form>

								<h3 class="m-t0">Personal Details</h3>

								<div class="form-group">

									<input value="" class="form-control" placeholder="Name"/>

								</div>	

								<div class="form-group">

									<input value="" class="form-control" placeholder="Mobile Number"/>

								</div>

								<div class="clearfix">

									<button type="button" class="btn-primary site-button btn-block">Submit </button>

								</div>

							</form>

						</div>

					</div>

				</div>	

			</div>

		</div>

	</div>

	<!-- Modal Box End -->
@include("layouts.webfooter")
	