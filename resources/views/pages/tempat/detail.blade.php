<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
@extends('layouts.app')
@section('title')
<title>{{$tempat->name}} | Detail</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="" data-natural-width="1400" data-natural-height="470">
    <div style="display: flex;justify-content: center;">
    <img src="{{URL::to('/')}}/img/tempat/{{$tempat->image}}" alt="img" style="object-fit: cover;z-index: -1;min-height: 450px;max-height: 455px;width:100%">
    </div>    
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $tempat->name }}</h1>
                    <span>{{ $tempat->address }}</span>
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
                <li><a href="/tempat">Tempat</a>
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
                        <li><i class="icon_set_1_icon-52"></i>Buka Setiap Hari</li>
                        <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                        <li><i class="icon_set_1_icon-13"></i>Ramah Disabilitas</li>
                        <li><i class="icon_set_1_icon-27"></i>Parkir Tersedia</li>
                    </ul>
                </div>
                <!-- <p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                </p> -->
                <!-- Map button for tablets/mobiles -->

                <div id="Img_carousel" class="slider-pro">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php
                        $temp = str_replace("[","",$tempat->imageArray);
                        $temp = str_replace('"','',$temp);
                        $temp = str_replace("]","",$temp);
                        ?>
                        @foreach($imageArray as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} justify-content-center">
                                <div class="justify-content-center">
                                    <img class="d-block w-100" style="height: 350px;object-fit:contain;" src="{{URL::to('/')}}/img/tempat/{{ $img->image }}" alt="{{ $img }}">
                                </div>
                                <!-- <div class="carousel-caption d-none d-md-block">
                                    <h5>Anastasios G. Leventis</h5>
                                    <p>University House</p>
                                </div> -->
                                <div class="carousel-caption d-none d-md-block" style="background: #ffffffc4;">
                                    <h5>{{ $img->desc }}</h5>
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
                            {{ $tempat->desc }}
                        </p>
                        <div class="row">
                            <div class="col-md-6">    
                            <h4>Operasional</h4>
                                <ul>
                                    <li>Senin-Jumat : {{$tempat->seninJumat}}</li>
                                    <li>Sabtu-Minggu : {{$tempat->sabtuMinggu}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Harga Tiket</h4>
                                <ul>
                                    <li>Tiket : Rp {{strrev(chunk_split(strrev($tempat->ticket), 3, '.'))}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">    
                            <h4>Kategori</h4>
                                <ul>
                                <?php
                                $temp = str_replace("[","",$tempat->tags);
                                $temp = str_replace('"','',$temp);
                                $temp = str_replace("]","",$temp);
                                ?>
                                @foreach(explode(',',$temp) as $temp)
                                    <li>{{$temp}}</li>
                                    
                                @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                            <h4>Website</h4>
                            <a href="http://{{ $tempat->url }}" target="_blank" rel="noopener noreferrer">{{ $tempat->url }}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="{{ $tempat->video != ''?'height: 300px;' : '' }}">
                            <div id="newe"></div>
                                <script>
                                    
                                    function getId(url) {
                                        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                                        const match = url.match(regExp);

                                        return (match && match[2].length === 11)
                                        ? match[2]
                                        : null;
                                    }
                                    
                                    var url = {!! json_encode($tempat->video) !!};

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
                        <h3>Alamat</h3>
                    </div>
                    <div class="col-lg-10" style="height: 300px;">
                        <h5>Kelurahan {{ $tempat->desa }}, Kecamatan {{ $tempat->kecamatan }}</h5>
                        

                        <div id="new">

                        </div>
                        <script>
                            var url = {!! json_encode($tempat->mapUrl) !!};
                            console.log(url)
                            var regex = new RegExp('@(.*),(.*),');
                            console.log(regex)
                            var lat_long_match = url.match(regex);
                            console.log(lat_long_match)
                            var lat = parseFloat(lat_long_match[1]);
                            console.log(lat)
                            var long = parseFloat(lat_long_match[2]);
                            console.log(long)
                            var div = document.getElementById('new');
                            var oldMap = '<iframe src = "https://maps.google.com/maps?q='+lat+','+long+'&hl=id;z=14&amp;output=embed" style="height:272px;position:inherit;"></iframe>'
                            var newMap = '<iframe src = "https://www.google.com/maps/embed/v1/view?key=AIzaSyBF9WoovlYn7H9Ezuhpionl1qz3VWxwbMg&center='+lat+','+long+'&zoom=18" style="height:272px;position:inherit;"></iframe>'
                            
                            console.log(oldMap)
                            console.log(newMap)
                            div.innerHTML += oldMap;

                        </script>
                        <!-- <div id="map-container" style="position:relative;">
                            <div id="peta" style="width: 100%;height: 40vh;position:relative;"></div>
                            
                            <script>
                                console.log("asd");
                                var url = {!! json_encode($tempat->mapUrl) !!};
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
                                    "<h4>{{$tempat->name}}<br>{{$tempat->address}} <br></h4> <h5><a href="+url+" target='_blank'>Buka di maps</a></h5>")) // add popup
                                .addTo(map)
                            </script>
                        </div> -->
                    </div>
                    <!-- End col-md-9  -->
                </div>
                <!-- End row  -->                

                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>Reviews</h3>
                        @if(count($reviews) > 0)
                        <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Tambahkan review</a>
                        @endif
                    </div>
                    <div class="col-lg-9">
                        @if(count($reviews) == 0)
                        Belum ada Review
                        <br>
                        <br>
                        <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Tambahkan review</a>
                        @endif
                        @if(count($reviews) > 0)
                            <div id="score_detail"><span>{{ number_format((float)$ratingss, 1, '.', '') }}</span><small>/10</small> 
                            @if($ratingss > 8 && $ratingss <= 10)
                            Sangat Baik
                            @endif
                            @if($ratingss > 6 && $ratingss <= 8)
                            Cukup
                            @endif
                            @if($ratingss > 3 && $ratingss <= 6)
                            Kurang
                            @endif
                            @if($ratingss <= 3)
                            Buruk
                            @endif <small>(Berdasarkan {{ count($reviewer) }} reviews)</small>
                            </div>
                            <!-- End general_rating -->
                            <!-- <div class="row" id="rating_summary">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Position
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                            </div>
                                        </li>
                                        <li>Comfort
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Price
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                            </div>
                                        </li>
                                        <li>Quality
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- End row -->
                        @endif
                        @foreach($reviews as $rev)
                            <hr>
                            <div class="review_strip_single">
                                <!-- <img src="img/avatar1.jpg" alt="Image" class="rounded-circle"> -->
                                <small> - {{ $rev->created_at }} -</small>
                                <h4> {{ $rev->name }} </h4>
                                <p> {{ $rev->email }} </p>
                                <!-- <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                </div>
                                <br> -->
                                <p>
                                    {{ $rev->message }}
                                </p>
                                <!-- jika ada balasan -->
                                <br>
                                @if($rev->reply != "")
                                @foreach($rev->reply as $repl)
                                <div class="row">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-10">
                                        Balasan dari admin
                                        <small> - 10 March 2015 -</small>
                                        <p>
                                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        @endforeach

                        <!-- End review strip -->
                        <!-- End review strip -->

                    </div>
                </div>
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
									<input name="name_review" id="name_review" type="text" placeholder="Nama" class="form-control" {{ Auth::check() ? '' : 'disabled="disabled"' }}>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input name="email_review" id="email_review" type="email" placeholder="Email" class="form-control" {{ Auth::check() ? '' : 'disabled="disabled"' }}>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-4">
                                Penilaian Tempat
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="vote" name="vote" type="range" value="0" step="1" min="1" max="10" oninput="this.nextElementSibling.value = this.value" {{ Auth::check() ? '' : 'disabled="disabled"' }}>
                                <output>0</output>
								</div>
                            </div>
                            <div class="col-md-2">
                                <input name="id_tempat" id="id_tempat" type="hidden" placeholder="id" class="form-control" value="{{$tempat->id}}" style="visibility: hidden;">
                            </div>
                        </div>
						<!-- End row -->
						<div class="form-group">
							<textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="Write your review" {{ Auth::check() ? '' : 'disabled="disabled"' }}></textarea>
						</div>
                        <hr>
						<!-- <div class="form-group">
							<input type="text" id="verify_review" class=" form-control" placeholder="Verifikasi diri anda. 3 + 1 =">
						</div> -->
						<input {{ Auth::check() ? 'type="submit"' : 'type="disabled"' }} style="{{ Auth::check() ? '' : 'background: grey;'}}" value="Submit" class="btn_1" id="submit-review" disabled="disabled">
                        @if(Auth::guest())
                        <br>
                        <br>
                        Anda harus login untuk menambah review.<a href="/login" class=""> Login disini</a>
                        @endif
					</form>
				</div>
			</div>
		</div>
	</div>