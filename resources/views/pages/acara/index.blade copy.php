@extends('layouts.app')
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
            <h1>Daftar Acara</h1>
            <p>Jelajahi berbagai acara di Kota Salatiga.</p>
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
                <li> {{ $position }} </li>
            </ul>
        </div>
    </div>
    <div class="container margin_60">

			<div class="row">
				
				<!--End aside -->
				<div class="col-lg-12">

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

					@foreach ($acaraa as $acara)
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<!-- <div class="ribbon_3 popular"><span>Popular</span> -->
								</div>
								<!-- <div class="wishlist">
									<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
								</div> -->
								<div class="img_list">
									<a href="{{ route('acara.show',$acara->id) }}" >
									<?php
										$temp = str_replace("[","",$acara->imageArray);
										$temp = str_replace('"','',$temp);
										$temp = str_replace("]","",$temp);
										$tempArr = explode(',',$temp)
										?>
										<img src="{{ URL::to('/') }}/img/acara/{{ $tempArr[0] }}" style="max-width: 353px;max-height: 350px;object-fit: cover;left: 0px;right: 0px;" alt="Image">
										<div class="short_info"><i class="icon_set_1_icon-24"></i>{{ $acara->tags}} </div>
									</a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="tour_list_desc">
									<div class="rating">
										<!-- <i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small> -->
									</div>
									<h3><strong> {{ $acara->name }} </strong></h3>
									<p>{{ $acara->desc }}</p>
									<ul class="add_info">
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
												<div class="tooltip-content">
													<h4>Jadwal</h4>
													<strong>Senin-Jumat</strong> {{ $acara->seninJumat }}
													<br>
													<strong>Sabtu-Minggu</strong> {{ $acara->sabtuMinggu }}
													<br>
													<strong>Sunday</strong> <span class="label label-danger">Closed</span>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
												<div class="tooltip-content">
													<h4>Alamat</h4> {{ $acara->address }}
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
												<div class="tooltip-content">
													<h4>Parkir</h4> 
													{{ $acara->parkiran ? "Tersedia": "Tidak Tersedia" }}
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-13"></i></span>
												<div class="tooltip-content">
													<h4>Akses</h4>
													{{ $acara->disabilitas ? "Ramah Disabilitas": "Tidak Ramah Disabilitas" }}
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
										<p><a href="{{ route('acara.show',$acara->id) }}" class="btn_1">Details</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					@endforeach
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
    <!-- Position -->

    <!-- <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div> -->
    <!-- End Map -->


    <!-- <div class="container margin_60">

        <div class="row">
        <div class="container">
            <div id='calendar'></div>
            <div class="col-lg-9">
            @foreach ($acaraa as $acara)
                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="ribbon_3 popular"><span>Popular</span>
                            </div>
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <div class="img_list">
                                <a href="{{ route('acara.show',$acara->id) }}" >
                                    <img src="{{ URL::to('/') }}/img/acara/{{ $tempArr[0] }}" style="max-width: 353px;max-height: 350px;object-fit: cover;left: 0px;right: 0px;" alt="Image">
                                    <div class="short_info"><i class="icon_set_1_icon-24"></i>{{ $acara->tags}} </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tour_list_desc">
                                <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small>
                                </div>
                                <h3><strong> {{ $acara->name }} </strong></h3>
                                <p>{{ $acara->desc }}</p>
                                <ul class="add_info">
                                    <li>
                                        <div class="tooltip_styled tooltip-effect-4">
                                            <span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
                                            <div class="tooltip-content">
                                                <h4>Jadwal</h4>
                                                <strong>Senin-Jumat</strong> {{ $acara->seninJumat }}
                                                <br>
                                                <strong>Sabtu-Minggu</strong> {{ $acara->sabtuMinggu }}
                                                <br>
                                                <strong>Sunday</strong> <span class="label label-danger">Closed</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tooltip_styled tooltip-effect-4">
                                            <span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
                                            <div class="tooltip-content">
                                                <h4>Alamat</h4> {{ $acara->address }}
                                                <br>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tooltip_styled tooltip-effect-4">
                                            <span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
                                            <div class="tooltip-content">
                                                <h4>Parkir</h4> 
                                                {{ $acara->parkiran ? "Tersedia": "Tidak Tersedia" }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tooltip_styled tooltip-effect-4">
                                            <span class="tooltip-item"><i class="icon_set_1_icon-13"></i></span>
                                            <div class="tooltip-content">
                                                <h4>Akses</h4>
                                                {{ $acara->disabilitas ? "Ramah Disabilitas": "Tidak Ramah Disabilitas" }}
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
                                    <p><a href="{{ route('acara.show',$acara->id) }}" class="btn_1">Details</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        </div>
        End row
    </div> -->
    <!-- End container -->
</main>
<!-- End main -->

   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script>
$(document).ready(function () {
   
var SITEURL = "{{ url('/') }}";
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
var DAY_NAMES = ['A','B','C','D','Y','X','Z',]
var calendar = $('#calendar').fullCalendar({
                    locale:'id',
                    editable: true,
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    dayHeaderContent: function(arg) {
                    return DAY_NAMES[arg.date.getDay()]
                    },
                    selectable: true,
                    selectHelper: true,
                    // select: function (start, end, allDay) {
                    //     var title = prompt('Tambahkan Acara:');
                    //     if (title) {
                    //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    //         $.ajax({
                    //             url: SITEURL + "/fullcalenderAjax",
                    //             data: {
                    //                 name: title,
                    //                 start: start,
                    //                 end: end,
                    //                 type: 'add'
                    //             },
                    //             type: "POST",
                    //             success: function (data) {
                    //                 displayMessage("Event Created Successfully");
  
                    //                 calendar.fullCalendar('renderEvent',
                    //                     {
                    //                         id: data.id,
                    //                         name: title,
                    //                         start: start,
                    //                         end: end,
                    //                         allDay: allDay
                    //                     },true);
  
                    //                 calendar.fullCalendar('unselect');
                    //             }
                    //         });
                    //     }
                    // },
                    // eventDrop: function (event, delta) {
                    //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                    //     $.ajax({
                    //         url: SITEURL + '/fullcalenderAjax',
                    //         data: {
                    //             name: event.title,
                    //             start: start,
                    //             end: end,
                    //             id: event.id,
                    //             type: 'update'
                    //         },
                    //         type: "POST",
                    //         success: function (response) {
                    //             displayMessage("Event Updated Successfully");
                    //         }
                    //     });
                    // },
                    // eventClick: function (event) {
                    //     var deleteMsg = confirm("Do you really want to delete?");
                    //     if (deleteMsg) {
                    //         $.ajax({
                    //             type: "POST",
                    //             url: SITEURL + '/fullcalenderAjax',
                    //             data: {
                    //                     id: event.id,
                    //                     type: 'delete'
                    //             },
                    //             success: function (response) {
                    //                 calendar.fullCalendar('removeEvents', event.id);
                    //                 displayMessage("Event Deleted Successfully");
                    //             }
                    //         });
                    //     }
                    // }
 
                });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>
@endsection
@section('footer-scripts')
    <script src="js/fullcalendar.js"></script>
    <script src="js/id.js"></script>
@endsection

@section('additionalHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
@endsection
