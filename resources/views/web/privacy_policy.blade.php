@include("layouts.webheader")
    <!-- Content -->

    <div class="page-content bg-white">

        <!-- inner page banner -->

        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">

            <div class="container">

                <div class="dez-bnr-inr-entry">

                    <h1 class="text-white">{{$data->page_name}}</h1>

					<!-- Breadcrumb row -->

					<div class="breadcrumb-row">

						<ul class="list-inline">

							<li><a href="#">Airt Jobs</a></li>

							<li>{{$data->page_name}}</li>

						</ul>

					</div>

					<!-- Breadcrumb row END -->

                </div>

            </div>

        </div>

        <!-- inner page banner END -->

        <div class="content-area">

            <div class="container">

				<!-- blog grid -->

				<div class="dez-blog-grid-3 row post-blogs-bx">
					
					<div class="post card-container recent-blogs col-lg-12 col-md-12 col-sm-12">

						<div class="blog-post blog-grid blog-style-1">

							<div class="dez-info">

								<div class="dez-post-text">

									{!! stripslashes($data->description) !!}

								</div>

							</div>

						</div>

					</div>

				</div>
				<!-- blog grid END -->
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