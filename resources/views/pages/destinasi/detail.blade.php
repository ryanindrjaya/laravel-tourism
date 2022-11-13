<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
@extends('layouts.app')
@section('title')
<title>{{$destinasi->name}} | Detail</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/single_hotel_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $destinasi->name }}</h1>
                    <span>{{ $destinasi->address }}</span>
                    <!-- <span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span> -->
                </div>
                <!-- <div class="col-md-4">
                    <div id="price_single_main">
                        from/per person <span><sup>$</sup>52</span>
                    </div>
                </div> -->
            </div>
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
                <li><a href="/destinasi">Destinasi</a>
                </li>
                <li>Detail</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    
    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-12" id="single_tour_desc">
                <div id="single_tour_feat">
                    <ul>
                        <li><i class="icon_set_1_icon-52"></i>Buka 24 Jam</li>
                        <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                        <li><i class="icon_set_1_icon-13"></i>Ramah Disabilitas</li>
                        <li><i class="icon_set_1_icon-27"></i>Parkir Tersedia</li>
                    </ul>
                </div>
                <p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                </p>
                <!-- Map button for tablets/mobiles -->
                <div id="Img_carousel" class="slider-pro">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php
                    $temp = str_replace("[","",$destinasi->imageArray);
                    $temp = str_replace('"','',$temp);
                    $temp = str_replace("]","",$temp);
                    ?>
                    @foreach(explode(',',$temp) as $img)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }} justify-content-center">
                            <div class="justify-content-center">
                                <img class="d-block img-fluid align-middle" src="{{URL::to('/')}}/img/destinasi/{{ $img }}" alt="{{ $img }}">
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="row">
                        <div class="col-lg-6 ">
                            <a href="#carouselExampleControls" role="button" data-slide="prev">
                                <i class=" icon-left-open"></i>
                                <span >Gambar Sebelumnya</span>
                            </a>
                        </div>
                        <div class="col-lg-6" style="text-align:right;">
                            <a href="#carouselExampleControls" role="button" data-slide="next">
                                <span >Gambar Selanjutnya</span>
                                <i class=" icon-right-open"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-2">
                        <h3>Deskripsi</h3>
                    </div>
                    <div class="col-lg-10">
                        <p>
                            {{ $destinasi->desc }}
                        </p>
                        <div class="row">
                            <div class="col-md-6">    
                            <h4>Operasional</h4>
                                <ul>
                                    <li>Senin-Jumat : {{$destinasi->seninJumat}}</li>
                                    <li>Sabtu-Minggu : {{$destinasi->sabtuMinggu}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Harga Tiket</h4>
                                <ul>
                                    <li>Tiket : {{$destinasi->ticket}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">    
                            <h4>Kategori</h4>
                                <ul>
                                <?php
                                $temp = str_replace("[","",$destinasi->tags);
                                $temp = str_replace('"','',$temp);
                                $temp = str_replace("]","",$temp);
                                ?>
                                @foreach(explode(',',$temp) as $temp)
                                    <li>{{$temp}}</li>
                                    
                                @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <!-- End row  -->
                    </div>
                    <!-- End col-md-9  -->
                </div>
                <!-- End row  -->

                <hr>

                <div class="row">
                    <div class="col-lg-2">
                        <h3>Alamat</h3>
                    </div>
                    <div class="col-lg-10">
                        <h5>Kelurahan {{ $destinasi->desa }}, Kecamatan {{ $destinasi->kecamatan }}</h5>
                        
                        <div id="map-container" style="position:relative;">
                            <div id="peta" style="width: 100%;height: 40vh;position:relative;"></div>
                            
                            <script>
                                console.log("asd");
                                var url = {!! json_encode($destinasi->mapUrl) !!};
                                var regex = new RegExp('@(.*),(.*),');
                                var lat_long_match = url.match(regex);
                                var lat = parseFloat(lat_long_match[1]);
                                var long = parseFloat(lat_long_match[2]);
                                var temp = [long, lat];
                                mapboxgl.accessToken = 'pk.eyJ1IjoiaWJudW5hdWZhbCIsImEiOiJjbDJiNnlkZmUwMWd4M2ludTY1bGV0ZXp1In0.Na4Q7E7Tyc6Uzwj6ZZiy8Q';
                                var map = new mapboxgl.Map({
                                container: 'peta',//id elemen html
                                style: 'mapbox://styles/mapbox/streets-v11',
                                center:[long, lat],//koordinat lokasi garis bujur dan lintang,longitude dan latitude
                                zoom: 12 // starting zoom
                                });
                                map.addControl(new mapboxgl.NavigationControl());
                                new mapboxgl.Marker().setLngLat([long, lat])
                                .setPopup(new mapboxgl.Popup().setHTML(
                                    "<h4>{{$destinasi->name}}<br>{{$destinasi->address}} <br></h4> <h5><a href="+url+" target='_blank'>Buka di maps</a></h5>")) // add popup
                                .addTo(map)
                            </script>
                        </div>
                    </div>
                    <!-- End col-md-9  -->
                </div>
                <!-- End row  -->                
            </div>
            <!--End  single_tour_desc-->
        </div>
        <!--End row -->
    </div>
    <!--End container -->
    
    <div id="overlay"></div>
    <!-- Mask on input focus -->

</main>
<!-- End main -->
@endsection
@section('footer-scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<!-- <script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiY2FyYWthNDIwIiwiYSI6ImNsMTByNGg2cTJuY2szbG9wc3dyZzhoY2MifQ.qNMyiEXPEUihkHjNDaG6fg';
	var map = new mapboxgl.Map({
	container: 'peta',//id elemen html
	style: 'mapbox://styles/mapbox/streets-v11',
	center:[110.5084366, -7.3305234],//koordinat lokasi garis bujur dan lintang,longitude dan latitude
	zoom: 12 // starting zoom
	});
	
	map.addControl(new mapboxgl.NavigationControl());

	new mapboxgl.Marker().setLngLat([110.5084366, -7.3305234])
	.setPopup(new mapboxgl.Popup().setHTML("<h4>Hello World!<br> <a href='google.com'>H</a></h4>")) // add popup
	.addTo(map)
</script> -->
<script>
    
</script>
@section('additionalHead')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />
@endsection