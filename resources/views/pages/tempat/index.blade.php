@extends('layouts.app')
@section('title')
<title>Tempat | Web Salatiga</title>
@endsection
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Daftar Tempat</h1>
				<p>Jelajahi berbagai tempat di Kota Salatiga.</p>
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>

		<div id="position">
			<div class="container">
				<ul>
					<li><a href="/">Home</a>
					</li>
					<li>Tempat</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->


		<div class="container margin_60">

			<div class="row">
				<aside class="col-lg-3">
					<!-- <p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p> -->

					<div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="/tempat" id="{{ $selected == 'all' ? 'active' :'' }}"><i class="icon_set_1_icon-51"></i>Semua Tempat <span>({{$tempatSize}})</span></a>
							</li>
							@if($cat == "all")
								@foreach($subcat as $subcat)
									@foreach($allcat as $all)
										@if($subcat->category == $all->id)
										<li><a href="/cari?cari={{$subcat->name}}&cat={{$subcat->category}}" id="{{ $selected == $subcat->name ? 'active' :'' }}"><i class="{{$subcat->icon}}"></i> {{ $subcat->name }} <span></span></a></li>
										@endif
									@endforeach
								@endforeach
							@else
								@foreach($subcat as $subcat)
									@if($subcat->category == $cat)
									<li><a href="/cari?cari={{$subcat->name}}&cat={{$subcat->category}}" id="{{ $selected == $subcat->name ? 'active' :'' }}"><i class="{{$subcat->icon}}"></i> {{ $subcat->name }} <span></span></a></li>
									@endif
								@endforeach
							@endif
						</ul>
					</div>

					<!-- <div id="filters_col">
						<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
								<h6>Price</h6>
								<input type="text" id="range" name="range" value="">
							</div> 
							<div class="filter_type">
								<h6>Rating</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Buka</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox">Senin
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Groups allowed
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Tour guides
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Access for disabled
										</label>
									</li>
								</ul>
							</div>
						</div>
					</div> -->
					<!--End filters col-->
					<!-- <div class="box_style_2">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div> -->
				</aside>
				<!--End aside -->
				<div class="col-lg-9">

					<!-- <div id="tools">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_price" id="sort_price">
										<option value="" selected>Sort by price</option>
										<option value="lower">Lowest price</option>
										<option value="higher">Highest price</option>
									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>Sort by ranking</option>
										<option value="lower">Lowest ranking</option>
										<option value="higher">Highest ranking</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-4 d-none d-sm-block text-right">
								<a href="all_tours_grid.html" class="bt_filters"><i class="icon-th"></i></a> <a href="#" class="bt_filters"><i class=" icon-list"></i></a>
							</div>

						</div>
					</div> -->
					<!--/tools -->

					@foreach ($tempat as $tem)
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<!-- <div class="ribbon_3 popular"><span>Popular</span> 
								</div>-->
								<!-- <div class="wishlist">
									<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
								</div> -->
								<div class="img_list">
									<a href="{{ route('tempat.show',$tem->id) }}" >
									<?php
										$temp = str_replace("[","",$tem->imageArray);
										$temp = str_replace('"','',$temp);
										$temp = str_replace("]","",$temp);
										$tempArr = explode(',',$temp)
										?>
										<img src="{{ URL::to('/') }}/img/tempat/{{ $tem->image }}" style="max-width: 353px;max-height: 350px;object-fit: contain;" alt="Image">
										
										<div class="short_info">{{$tem->tags}} </div>
									</a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="tour_list_desc">
									<!-- <div class="rating"><i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div> -->
									<h3><strong> {{ $tem->name }} </strong></h3>
									<p class="collapse" id="collapseExample" aria-expanded="false" style="overflow-y: auto;height: 100px;">{{ $tem->desc }}</p>
                                    <!-- <a role="button" class="collapsed btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show/hide</a> -->
                                    <style>
                                    #collapseExample.collapse:not(.show) {
                                        display: block;
                                        height: 2.5rem;
                                        overflow: hidden;
                                    }
                                    #collapseExample.collapsing {
                                        height: 3rem;
                                    }
                                    #module a.collapsed::after {
                                        content: '+ Show More';
                                    }
                                    #module a:not(.collapsed)::after {
                                        content: '- Show Less';
                                    }
                                    </style>
									<ul class="add_info">
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
												<div class="tooltip-content">
													<h4>Jadwal</h4>
													<strong>Senin-Jumat</strong> {{$tem->seninJumat}}
													<br>
													<strong>Sabtu-Minggu</strong> {{$tem->sabtuMinggu}}
													
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
												<div class="tooltip-content">
													<h4>Alamat</h4> {{ $tem->address }}
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
												<div class="tooltip-content">
													<h4>Parkir</h4> 
													{{ $tem->parkiran ? "Tersedia": "Tidak Tersedia" }}
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-13"></i></span>
												<div class="tooltip-content">
													<h4>Akses</h4>
													{{ $tem->disabilitas ? "Ramah Disabilitas": "Tidak Ramah Disabilitas" }}
													<br>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="price_list">
									<div>
										<p><a href="{{ route('tempat.show',$tem->id) }}" class="btn_1">Details</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					@endforeach
					{{ $tempat->withQueryString()->links("pagination::bootstrap-4") }}
					<!--End strip -->


					<hr>
<!-- 
					<nav aria-label="Page navigation">
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav> -->
					<!-- end pagination-->

				</div>
				<!-- End col lg-9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->


@stop