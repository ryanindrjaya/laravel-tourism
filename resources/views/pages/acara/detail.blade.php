<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
@extends('layouts.app')
@section('title')
<title>{{$acara->name}} | Detail</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="" data-natural-width="1400" data-natural-height="470">
    <div style="display: flex;justify-content: center;">
    <img src="{{URL::to('/')}}/img/acara/{{$acara->image}}" alt="img" style="object-fit: cover;z-index: -1;min-height: 450px;max-height: 455px;width:100%">
    </div>    
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $acara->name }}</h1>
                    <span>{{ $acara->desa }} {{ $acara->kecamatan }}</span>
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
<div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
<main>
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="/">Home</a>
                </li>
                <li><a href="/acara">Acara</a>
                </li>
                <li>Detail</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    
    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-12" id="single_tour_desc">
                
                <!-- <p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                </p> -->
                <!-- Map button for tablets/mobiles -->

                <div id="Img_carousel" class="slider-pro">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php
                        $temp = str_replace("[","",$acara->imageArray);
                        $temp = str_replace('"','',$temp);
                        $temp = str_replace("]","",$temp);
                        ?>
                        @foreach(explode(',',$temp) as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} justify-content-center">
                                <div class="justify-content-center">
                                    <img class="d-block w-100" style="height: 350px;object-fit:contain;" src="{{URL::to('/')}}/img/acara/{{ $img }}" alt="{{ $img }}">
                                </div>
                                <!-- <div class="carousel-caption d-none d-md-block">
                                    <h5>Anastasios G. Leventis</h5>
                                    <p>University House</p>
                                </div> -->
                                
                            </div>
                        @endforeach
                        </div>
                        @if(count(explode(',',$temp))>0)
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
                        @endif
                    
                    </div>

                </div>
                

                <hr>

                <div class="row">
                    <div class="col-lg-2">
                        <h3>Deskripsi</h3>
                    </div>
                    <div class="col-lg-10">
                        <p>
                            {{ $acara->desc }}
                        </p>
                        <div class="row">
                            <div class="col-md-6">    
                            <h4>Operasional</h4>
                                <ul>
                                    <li>Tanggal Mulai : {{$acara->start}}</li>
                                    <li>Tanggal Selesai : {{$acara->end}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Harga Tiket</h4>
                                <ul>
                                    <li>Tiket : Rp {{strrev(chunk_split(strrev($acara->ticket), 3, '.'))}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="{{ $acara->video != ''?'height: 300px;' : '' }}">
                            <div id="newe"></div>
                                <script>
                                    
                                    function getId(url) {
                                        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                                        const match = url.match(regExp);

                                        return (match && match[2].length === 11)
                                        ? match[2]
                                        : null;
                                    }
                                    
                                    var url = {!! json_encode($acara->video) !!};

                                    const videoId = getId(url);
                                    const iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
                                        + videoId + '" frameborder="0" allowfullscreen></iframe>';

                                    console.log('Video ID:', videoId)

                                    var div = document.getElementById('newe');

                                    if(url != ""){
                                        div.innerHTML += iframeMarkup;
                                    }
                                
                                </script>
                            
                            </div>
                        </div>
                        <!-- End row  -->
                    </div>
                    <!-- End col-md-9  -->
                </div>
                <!-- End row  -->

                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <h3>Lokasi</h3>
                    </div>
                    <div class="col-lg-10" style="height: 300px;">
                        <h5>Kelurahan {{ $acara->desa }}, Kecamatan {{ $acara->kecamatan }}</h5>
                        

                        <div id="new">

                        </div>
                        <script>
                            var url = {!! json_encode($acara->mapUrl) !!};
                            var regex = new RegExp('@(.*),(.*),');
                            var lat_long_match = url.match(regex);
                            var lat = parseFloat(lat_long_match[1]);
                            var long = parseFloat(lat_long_match[2]);

                            var div = document.getElementById('new');

                            div.innerHTML += '<iframe src = "https://maps.google.com/maps?q='+lat+','+long+'&hl=id;z=14&amp;output=embed" style="height:272px;position:inherit;"></iframe>';

                        </script>
                        <!-- <div id="map-container" style="position:relative;">
                            <div id="peta" style="width: 100%;height: 40vh;position:relative;"></div>
                            
                            <script>
                                console.log("asd");
                                var url = {!! json_encode($acara->mapUrl) !!};
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
                                    "<h4>{{$acara->name}}<br>{{$acara->address}} <br></h4> <h5><a href="+url+" target='_blank'>Buka di maps</a></h5>")) // add popup
                                .addTo(map)
                            </script>
                        </div> -->
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
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myReviewLabel">Tulis Review Anda</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
                    <form action="{{ route('review.store') }}" method="POST">
                    @csrf
						<input name="hotel_name" id="hotel_name" type="hidden" value="Mariott Hotel Paris">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="name_review" id="name_review" type="text" placeholder="Nama" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input name="email_review" id="email_review" type="email" placeholder="Email" class="form-control">
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-4">
                                Penilaian Acara
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="vote" name="vote" type="range" value="0" step="1" min="1" max="10" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
								</div>
                            </div>
                            <div class="col-md-2">
                                <input name="id_acara" id="id_acara" type="text" placeholder="id" class="form-control" value="{{$acara->id}}" style="visibility: hidden;">
                            </div>
                        </div>
						<!-- End row -->
						<div class="form-group">
							<textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="Write your review"></textarea>
						</div>
                        <hr>
						<!-- <div class="form-group">
							<input type="text" id="verify_review" class=" form-control" placeholder="Verifikasi diri anda. 3 + 1 =">
						</div> -->
						<input type="submit" value="Submit" class="btn_1" id="submit-review">
					</form>
				</div>
			</div>
		</div>
	</div>