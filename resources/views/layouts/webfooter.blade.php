		<!-- Footer -->

		<footer class="site-footer" id="top-footer">

			<div class="footer-top">

				<div class="container">

					<div class="row">

						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">

							<div class="widget">

								<img src="{{ asset('web-assets/images/logo-white.png') }}" width="180" class="m-b15" alt="" />

								<p class="text-capitalize m-b20">Aitrjobs provide faculties of JEE Mains-Advanced,
									NEET,Foundation & Board level faculty with pool of all coaching owner and school
									director of PAN INDIA with 15,000 faculty member..</p>
								@if (Session::has('error_flash_message'))
					                 <div class="alert alert-danger">
					                     {{ Session::get('error_flash_message') }}
					                 </div>
					             @endif
					             @if (Session::has('flash_message_subscribe'))
					                 <div class="alert alert-success">
					                     {{ Session::get('flash_message_subscribe') }}
					                 </div>
					             @endif

								<div class="subscribe-form m-b20">
									<form class="needs-validation" method="post" action="{{ URL::to('subscribe') }}" >
                                        @csrf
                                    
										<div class="dzSubscribeMsg"></div>

										<div class="input-group">

											<input name="email" required="required" class="form-control" id="email"
												placeholder="Your Email Address" type="email" required>

											<span class="input-group-btn">

												<button name="submit" value="Submit" type="submit"
													class="site-button radius-xl">Subscribe</button>

											</span>

										</div>

									</form>

								</div>

								<ul class="list-inline m-a0">

									<li><a href="javascript:void(0);" class="site-button white facebook circle "><i
												class="fa fa-facebook"></i></a></li>

									<li><a href="javascript:void(0);" class="site-button white google-plus circle "><i
												class="fa fa-google-plus"></i></a></li>

									<li><a href="javascript:void(0);" class="site-button white linkedin circle "><i
												class="fa fa-linkedin"></i></a></li>

									<li><a href="javascript:void(0);" class="site-button white instagram circle "><i
												class="fa fa-instagram"></i></a></li>

									<li><a href="javascript:void(0);" class="site-button white twitter circle "><i
												class="fa fa-twitter"></i></a></li>

								</ul>

							</div>

						</div>

						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

							<div class="widget border-0">

								<h5 class="m-b30 text-white">Usefull Links</h5>

								<ul class="list-2 w10 list-line">
									<li>
										<a href="{{ URL::to('/') }}">Home</a>
									</li>
									<li>
										<a href="{{ URL::to('posted-jobs') }}">Jobs </a>
									</li>
									<li>
										<a href="{{ URL::to('companies') }}">Companies</a>
									</li>
									<li>
										<a href="{{ URL::to('blogs') }}">Blog</a>
									</li>

								</ul>

							</div>

						</div>
                        
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

							<div class="widget border-0">

								<h5 class="m-b30 text-white">Company</h5>

								<ul class="list-2 w10 list-line">
									<li>
										<a href="{{ URL::to('about-us') }}">About Us</a>
									</li>
									<li>
										<a href="{{ URL::to('privacy-policy') }}">Privacy Policy </a>
									</li>
									<li>
										<a href="{{ URL::to('terms-of-services') }}">Terms Of Services </a>
									</li>
									<li>
										<a href="{{ URL::to('userwriting') }}">Userwrting</a>
									</li>
									
									<li>
										<a href="{{ URL::to('communications') }}">Communications</a>
									</li>
									
									<li>
										<a href="{{ URL::to('leading-license') }}">Leading License</a>
									</li>
									
									<li>
										<a href="{{ URL::to('how-it-works') }}">How It Works</a>
									</li>
									
									<li>
										<a href="{{ URL::to('for-employers') }}">For Employers</a>
									</li>

								</ul>

							</div>

						</div>

                        
						<div class="col-xl-3 col-lg-3  col-md-12 col-sm-12 col-12">

							<div class="widget border-0">

								<h5 class="m-b30 text-white">Popular Job Category</h5>
								@php
						            $categories = \App\Models\categories::get()->take(5);
						        @endphp
        
								<ul class="list-2 w10 list-line">
									@foreach ($categories as $i => $category)
										<li><a href="{{ URL::to('jobcategory/'.$category->category_name) }}">{{$category->category_name}}</a></li>
									@endforeach
								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>


			<!-- footer bottom part -->

			<div class="footer-bottom">

				<div class="container">

					<div class="row">

						<div class="col-lg-12 text-center">

							<span> © Copyright 2021 by <i class="fa fa-heart m-lr5 text-red heart"></i>

								<a href="javascript:void(0);">Aitrjobs </a> All rights reserved.</span>

						</div>

					</div>

				</div>

			</div>

		</footer>

		<!-- Footer END -->

		<!-- scroll top button -->

		<button class="scroltop fa fa-arrow-up"></button>

	</div>

	<!-- JAVASCRIPT FILES ========================================= -->

	<script src="{{ asset('web-assets/plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->


	{{--<script src="{{ asset('web-assets/js/select2.min.js') }}"></script>--}}
	<script src="{{ asset('web-assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->

	<script src="{{ asset('web-assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script><!-- FORM JS -->

	<script src="{{ asset('web-assets/plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->

	<script src="{{ asset('web-assets/plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->

	<script src="{{ asset('web-assets/plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->

	<script src="{{ asset('web-assets/plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->

	<script src="{{ asset('web-assets/plugins/masonry/masonry-3.1.4.js') }}"></script><!-- MASONRY -->

	<script src="{{ asset('web-assets/plugins/masonry/masonry.filter.js') }}"></script><!-- MASONRY -->

	<script src="{{ asset('web-assets/plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->

	<script src="{{ asset('web-assets/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	
	<script src="{{ asset('web-assets/js/pnotify.custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ asset('web-assets/js/pnotify.custom.min.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ asset('web-assets/js/jquery.simplePagination.js') }}"></script><!-- CUSTOM FUCTIONS  -->

	<script src="{{ asset('web-assets/js/dz.carousel.js') }}"></script><!-- SORTCODE FUCTIONS  -->

	<script src="{{ asset('web-assets/js/dz.ajax.js') }}"></script>

	<script src="{{ asset('web-assets/js/firebase-ui-auth.js') }}"></script><!-- CONTACT JS  -->
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<script>
		$('.owl-carousel-partner').owlCarousel({
			loop: true,
			margin: 10,
			nav: false,
			autoplay: true,
			// prev:flase,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		});

		var itemsjobs = $(".post-job-bx .recent-jobs");
	    var numItemsjobs = itemsjobs.length;
	    var perPagejobs = 10;

	    itemsjobs.slice(perPagejobs).hide();

	    $('#pagination-container-jobs').pagination({
	        items: numItemsjobs,
	        itemsOnPage: perPagejobs,
	        prevText: "&laquo;",
	        nextText: "&raquo;",
	        onPageClick: function (pageNumber) {
	            var showFrom = perPagejobs * (pageNumber - 1);
	            var showTo = showFrom + perPagejobs;
	            itemsjobs.hide().slice(showFrom, showTo).show();
	        }
	    });

		var itemsblogs = $(".post-blogs-bx .recent-blogs");
	    var numItemsblogs = itemsblogs.length;
	    var perPageblogs = 9;

	    itemsblogs.slice(perPageblogs).hide();

	    $('#pagination-container-blogs').pagination({
	        items: numItemsblogs,
	        itemsOnPage: perPageblogs,
	        prevText: "&laquo;",
	        nextText: "&raquo;",
	        onPageClick: function (pageNumber) {
	            var showFrom = perPageblogs * (pageNumber - 1);
	            var showTo = showFrom + perPageblogs;
	            itemsblogs.hide().slice(showFrom, showTo).show();
	        }
	    });
    	
    	$(document).ready(function() {
    		function pNotifyDangerAlert(sNotifyText){
			    new PNotify({
			        'text': sNotifyText,
			        'type': 'danger',
			        'animation': 'none',
			        'delay': 8000,
			        'buttons':{
			            'sticker': false
			        }
			    });
			}


		    $('.filterSearch').change(function() {
		    	$(this).closest('form').submit();
		    
		    });

		    checkMendatoryData();
    		
    		function checkMendatoryData(){
	    		var sess = "{{Session::get('Auth_Uid_AirtrJobs')}}";
	    		
	    		if(sess != ''){
	    			$.ajax({
					    url: App_URL+"/checkDetails/" + sess,
		                method: "GET",
		                headers: {
		                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
		                        "content"
		                    ),
		                },
		                success: function (response) {
		                	string = response.redirect;
		                	
			           		if (response.redirect) {
			           		    console.log(window.location.href);
			           		    console.log(response.redirect);
			           			if(window.location.href !== response.redirect){
			           				window.location.href = response.redirect;
			           			}else{
			           				pNotifyDangerAlert("Please Enter Below Details.");	
			           			}
						    } 
		
		                },
			    	});	
	    		}
	    		
	    	}

		});




	</script>
</body>

</html>