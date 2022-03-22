<form class="dezPlaceAni" method="post" action="{{ URL::to('mainfilter') }}">
                    		@csrf


								<div class="input-group">
									<style>
										#header_search {
											width: 100px;
											border: 1px solid #dee2e6;
											;
											border-radius: 8px !important;
											margin: 0px 10px 0px 10px;
										}
									</style>
							
									<input type="text" id="company_name" class="form-control" name="company_name"
										placeholder="Search Keyword">

									<input type="text" id="state" name="state" class="form-control"
										placeholder="State, City">

									<div class="input-group-prepend">

										<button id="header_search" class="site-button">Search</button>

									</div>

								</div>
							
							</form>