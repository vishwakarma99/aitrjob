@include("layouts.webheader")
		<!-- Content -->

		<div class="page-content bg-white">

			<!-- inner page banner -->

			<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">

				<div class="container">

					<div class="dez-bnr-inr-entry">

						<h1 class="text-white">Coaching Institutes</h1>

						<!-- Breadcrumb row -->

						<div class="breadcrumb-row">

							<ul class="list-inline">

								
								<div class=" job-search-form">

							
									@include("web.minisearch")	
									<!-- <p> INDIA's NO #1 JOB PORTAL FOR COACHING INDUSTRY</p> -->
								</div>
							</ul>

						</div>

						<!-- Breadcrumb row END -->

					</div>

				</div>

			</div>

			<!-- inner page banner END -->

			<!-- contact area -->

			<div class="content-block">

				<!-- Find Job -->

				<div class="section-full bg-white content-inner">

					<div class="container">
						<h3>List of Coaching Institutes</h3>
						<ul id="masonry" class="dez-gallery-listing gallery-grid-4 gallery mfp-gallery">
							@foreach ($Companies as $i => $company)
							<li class="web card-container col-lg-3 col-md-4 col-sm-4">
								<a style="color: #6f6f6f;" href="{{ URL::to('jobs/'.$company->id) }}"><p> {{$company->company_name}}</p></a>

								
							</li>
							@endforeach
						</ul>
						<div id="pagination-container"></div>
					</div>

				</div>

				<!-- Find Job END -->

			</div>

		</div>

		<!-- Content END-->

		<!-- Modal Box -->

		<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

					<div class="modal-body row m-a0 clearfix">

						<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0"
							style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">

							<div class="form-info text-white align-self-center">

								<h3 class="m-b15">Login To You Now</h3>

								<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting
									industry has been the industry.</p>

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

										<input value="" class="form-control" placeholder="Name" />

									</div>

									<div class="form-group">

										<input value="" class="form-control" placeholder="Mobile Number" />

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