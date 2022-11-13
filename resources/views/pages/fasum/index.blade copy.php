
<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
@extends('layouts.app')
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Daftar Fasilitas Umum</h1>
			<p>Jelajahi berbagai Fasum di Kota Salatiga.</p>
		</div>
	</div>
</section>
	<!-- End section -->

	<main>

		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li>Fasilitas Umum</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="container margin_60">

			<div class="row">
			<aside class="col-lg-3">
					<!-- <p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p> -->

					<div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="all_tours_list.html"><i class="icon_set_1_icon-24"></i> Semua Fasilitas Umum <span>(12)</span></a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-12"></i> Toilet</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-7"></i> Wifi</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-26"></i> Halte</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-24"></i> SPBU</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-35"></i> ATM</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_1_icon-24"></i> Rumah Sakit</a></li>
                            <li><a href="all_tours_list.html"><i class="icon_set_2_icon-105"></i> Kantor Polisi</a></li> 
						</ul>
					</div>
				</aside>
				<div class="col-lg-9">
				<div id="peta" style="width: 100%;height: 100vh;"></div>
					<!-- <div id="peta"></div> -->
				<!-- <x-mapbox 
					id="map" 
					class="hellomap" 
					style="height: 500px;position:relative;" 
					mapStyle="mapbox/navigation-night-v1"
					:center="['long' => 110.5084366, 'lat' => -7.3305234]"
					:navigationControls="true"
					:interactive="true"
					:markers="[['long' => 110.5084366, 'lat' => -7.3305234,'description' => 'helloworld']]" /> -->

				</div>
				<!-- End col lg-9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

@endsection
@section('footer-scripts')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiY2FyYWthNDIwIiwiYSI6ImNsMTByNGg2cTJuY2szbG9wc3dyZzhoY2MifQ.qNMyiEXPEUihkHjNDaG6fg';
	var map = new mapboxgl.Map({
	container: 'peta',//id elemen html
	style: 'mapbox://styles/mapbox/streets-v11',
	center:[110.5084366, -7.3305234],//koordinat lokasi garis bujur dan lintang,longitude dan latitude
	zoom: 12 // starting zoom
	});
	// var map = new mapboxgl.Map({
	// 	container: 'peta',
	// 	style: 'mapbox://styles/mapbox/streets-v11',
	// 	center: [106.69972796989238, -6.238601629433243],
	// 	zoom: 9
	// });
	map.addControl(new mapboxgl.NavigationControl());

	new mapboxgl.Marker().setLngLat([110.5084366, -7.3305234])
	.setPopup(new mapboxgl.Popup().setHTML("<h4>Hello World!<br> <a href='google.com'>H</a></h4>")) // add popup
	.addTo(map)
						
	// var geocoder = new MapboxGeocoder({
	// 	accessToken: mapboxgl.accessToken,
	// 	mapboxgl: mapboxgl,
	// 	marker:false,
	// 	placeholder: 'Masukan kata kunci...',
	// 	zoom:20
	// });


	// map.addControl(
	// 	geocoder
	// );
</script>
@endsection
@section('additionalHead')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
@endsection