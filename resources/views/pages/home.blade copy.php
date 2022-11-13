@extends('layouts.app')
@section('content')

<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        @foreach($headline as $head)
        <div class="owl-slide cover" style="background-image: url(img/headline/{{$head->image}});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text {{$head->alignment}} white">
                                <h2 class="owl-slide-animated owl-slide-title">{{ $head->title }}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{ $head->subtitle }}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="all_tours_list.html" role="button">Selengkapnya</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--/owl-slide-->
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->

<div class="white_bg">
<!-- <div class="container margin_60"> -->
    <!-- <div class="row small-gutters categories_grid">
        <div class="col-sm-12 col-md-6">
            {{ $first }}
            @foreach ($first as $first)
            <a href="/cari?cari={{$first->name}}">
                
                <img src="{{URL::to('/')}}/img/category/{{$first->image}}" style="width: 550px;max-height: 500px;object-fit: cover;" alt="Icon" class="img-fluid">
                <div class="wrapper">
                    <h2>{{ $first->name }}</h2>
                    <p>{{ $firstSize }} Destinasi</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="row small-gutters mt-md-0 mt-sm-2">
                <div class="col-sm-6">
                    <a href="/akomodasi">
                    @foreach ($akomodasiIcon as $res)
                    <img src="{{URL::to('/')}}/img/akomodasi/{{$res->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" alt="Icon" class="img-fluid">
                    @endforeach
                        <div class="wrapper">
                            <h2>Akomodasi</h2>
                            <p>{{ $firstSize }} Tempat</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="/kuliner">
                    @foreach ($kulinerIcon as $res)
                    <img src="{{URL::to('/')}}/img/kuliner/{{$res->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" alt="Icon" class="img-fluid">
                    @endforeach
                        <div class="wrapper">
                            <h2>Kuliner</h2>
                            <p>{{$kulinerSize}} Tradisional & Modern</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 mt-sm-2">
                    <a href="/acara">
                    @foreach ($acaraIcon as $res)
                    <img src="{{URL::to('/')}}/img/acara/{{$res->image}}" style="width: 560px;max-height: 245px;object-fit: cover;" alt="Icon" class="img-fluid">
                    @endforeach
                        <div class="wrapper">
                            <h2>Acara</h2>
                            <p>{{$acaraSize}} Acara Tahunan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!--/categories_grid-->
<!-- </div> -->
<!-- /container -->
</div>
<!-- /white_bg -->

<div class="container margin_60">

    <div class="main_title">
        <h2>Jelajahi destinasi <span>{{ $firstList[0]->tags }}</span> Menarik</h2>
        <p>Beragam tempat untuk dituju</p>
        <!-- <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($firstList as $tempat)
        <div class="item">
            <div class="tour_container">
                <!-- <div class="ribbon_3 popular"><span>Terbaik</span></div> -->
                <div class="img_container">
                    <a href="{{ route('tempat.show',$tempat->id) }}">
                        <img src="{{URL::to('/')}}/img/tempat/{{$tempat->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <div class="short_info">
                            {{ $tempat->tags }}
                            <!-- <span class="price">
                                <sup>$</sup>39
                            </span> -->
                        </div>
                    </a>
                </div>
                <div class="tour_title">
                    <h3><strong>{{ $tempat->name }}</strong></h3>
                    
                    <h6>{{ $tempat->address }}</h6>
                    <!-- end rating -->
                    <!-- <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                    </div> -->
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box tour -->
        </div>
        @endforeach
        <!-- /item -->
        
    </div>
    <!-- /carousel -->
    
    <p class="text-center add_bottom_30">
        <a href="tempat" class="btn_1">Lihat Semua Destinasi</a>
    </p>

    <div class="main_title">
        <h2>Kunjungi Destinasi <span>{{ $secondList[0]->tags }}</span> Menarik</h2>
        <p>Beragam destinasi untuk dikunjungi</p>
        <!-- <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($secondList as $tempat)
        <div class="item">
            <div class="tour_container">
                <!-- <div class="ribbon_3 popular"><span>Terbaik</span></div> -->
                <div class="img_container">
                    <a href="{{ route('tempat.show',$tempat->id) }}">
                        <img src="{{URL::to('/')}}/img/tempat/{{$tempat->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <div class="short_info">
                            {{ $tempat->tags }}
                            <!-- <span class="price">
                                <sup>$</sup>39
                            </span> -->
                        </div>
                    </a>
                </div>
                <div class="tour_title">
                    <h3><strong>{{ $tempat->name }}</strong></h3>
                    
                    <h6>{{ $tempat->address }}</h6>
                    <!-- end rating -->
                    <!-- <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                    </div> -->
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box tour -->
        </div>
        @endforeach
        <!-- /item -->
        
    </div>
    <!-- /carousel -->
    
    <p class="text-center add_bottom_30">
        <a href="tempat" class="btn_1">Lihat Semua Destinasi</a>
    </p>

    <hr class="mt-5 mb-5">

    <div class="main_title">
        <h2>Akomodasi <span>Terbaik</span> Salatiga</h2>
        <p>Subtitle</p>
        <!-- <p>Alam nya yang sejuk, membuat anda nyaman untuk menginap diberbagai sudut kota ini.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($akomodasi as $akomodasi)
        <div class="item">
            <div class="hotel_container">
                <!-- <div class="ribbon_3 popular"><span>Popular</span></div> -->
                <div class="img_container">
                    <a href="{{ route('akomodasi.show',$akomodasi->id) }}">
                    <img src="{{URL::to('/')}}/img/destinasi/{{$destinasi->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <!-- <div class="score"><span>7.5</span>Good</div> -->
                        <div class="short_info hotel">
                            <i class="icon_set_1_icon-23"></i>
                            {{ $akomodasi->tags }}
                        </div>
                    </a>
                </div>
                <div class="hotel_title">
                    <h3><strong>{{$akomodasi->name}}</strong></h3>
                    <h3>{{ $akomodasi->desa }} {{$akomodasi->kecamatan}}</h3>
                    <!-- <div class="rating">
                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                        <small>4 Star Hotel</small>
                    </div> -->
                    <!-- end rating -->
                    <!-- <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                    </div> -->
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box -->
        </div>
        @endforeach
        <!-- /item -->
    </div>
    <!-- /carousel -->
    
    <p class="text-center nopadding">
        <a href="akomodasi" class="btn_1">Lihat Semua Akomodasi</a>
    </p>

    <hr class="mt-5 mb-5">

    <div class="main_title">
        <h2>Beragam <span>Kuliner</span> Ikonik</h2>
        <p>Subtitle</p>
        <!-- <p>Alam nya yang sejuk, membuat anda nyaman untuk menginap diberbagai sudut kota ini.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($kuliner as $kuliner)
        <div class="item">
            <div class="hotel_container">
                <!-- <div class="ribbon_3 popular"><span>Popular</span></div> -->
                <div class="img_container">
                    <a href="{{ route('kuliner.show',$kuliner->id) }}">
                    <img src="{{URL::to('/')}}/img/kuliner/{{$kuliner->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <!-- <div class="score"><span>7.5</span>Good</div> -->
                        <div class="short_info hotel">
                            <i class="icon_set_1_icon-58"></i>
                            {{ $kuliner->tags }}
                        </div>
                    </a>
                </div>
                <div class="hotel_title">
                    <h3><strong>{{$kuliner->name}}</strong></h3>
                    <h3>{{$kuliner->desa}} {{$kuliner->kecamatan}}</h3>
                    <!-- <div class="rating">
                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                        <small>4 Star Hotel</small>
                    </div> -->
                    <!-- end rating -->
                    <!-- <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                    </div> -->
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box -->
        </div>
        @endforeach
        <!-- /item -->
    </div>
    <!-- /carousel -->
    
    <p class="text-center nopadding">
        <a href="kuliner" class="btn_1">Lihat Semua Kuliner</a>
    </p>

    <hr class="mt-5 mb-5">

    <div class="main_title">
        <h2>Acara <span>Menarik</span> Salatiga</h2>
        <p>Subtitle</p>
        <!-- <p>Alam nya yang sejuk, membuat anda nyaman untuk menginap diberbagai sudut kota ini.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($acara as $acara)
        <div class="item">
            <div class="hotel_container">
                <!-- <div class="ribbon_3 popular"><span>Popular</span></div> -->
                <div class="img_container">
                    <a href="{{ route('acara.show',$acara->id) }}">
                    <img src="{{URL::to('/')}}/img/acara/{{$acara->image}}" style="width: 560px;max-height: 475px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <!-- <div class="score"><span>7.5</span>Good</div> -->
                        <div class="short_info hotel">
                            <i class="icon_set_1_icon-87"></i>
                            {{ $acara->tags }}
                        </div>
                    </a>
                </div>
                <div class="hotel_title">
                    <h3><strong>{{ $acara->name }}</strong></h3>
                    <h6>{{ $acara->desa }} {{$acara->kecamatan}}</h6>
                    <!-- <div class="rating">
                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                        <small>4 Star Hotel</small>
                    </div> -->
                    <!-- end rating -->
                    <!-- <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                    </div> -->
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box -->
        </div>
        @endforeach
        <!-- /item -->
    </div>
    <!-- /carousel -->
    
    <p class="text-center nopadding">
        <a href="akomodasi" class="btn_1">Lihat Semua Akomodasi</a>
    </p>
    
</div>
<!-- End container -->

<!-- <div class="white_bg">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Plan <span>Your Tour</span> Easly</h2>
            <p>
                Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
            </p>
        </div>
        <div class="row feature_home_2">
            <div class="col-md-4 text-center">
                <img src="img/adventure_icon_1.svg" alt="" width="75" height="75">
                <h3>Itineraries studied in detail</h3>
                <p>Suscipit invenire petentium per in. Ne magna assueverit vel. Vix movet perfecto facilisis in, ius ad maiorum corrumpit, his esse docendi in.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/adventure_icon_2.svg" alt="" width="75" height="75">
                <h3>Room and food included</h3>
                <p> Cum accusam voluptatibus at, et eum fuisset sententiae. Postulant tractatos ius an, in vis fabulas percipitur, est audiam phaedrum electram ex.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/adventure_icon_3.svg" alt="" width="75" height="75">
                <h3>Everything organized</h3>
                <p>Integre vivendo percipitur eam in, graece suavitate cu vel. Per inani persius accumsan no. An case duis option est, pro ad fastidii contentiones.</p>
            </div>
        </div>

        <div class="banner_2">
            <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
                <div>
                    <h3>Your Perfect<br>Tour Experience</h3>
                    <p>Activities and accommodations</p>
                    <a href="all_tours_list.html" class="btn_1">Read more</a>
                </div>
            </div>
            /wrapper
        </div>
        /banner_2

    </div>
    End container
</div>
End white_bg

<div class="container margin_60">
    <div class="main_title">
        <h2>Lates <span>Blog</span> News</h2>
        <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
    </div>

    <div class="row">
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure><img src="img/news_home_1.jpg" alt="">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>Mark Twain</li>
                        <li>20.11.2017</li>
                    </ul>
                    <h4>Pri oportere scribentur eu</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div>
            /box_news
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure><img src="img/news_home_2.jpg" alt="">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>Jhon Doe</li>
                        <li>20.11.2017</li>
                    </ul>
                    <h4>Duo eius postea suscipit ad</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div>
            /box_news
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure><img src="img/news_home_3.jpg" alt="">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>Luca Robinson</li>
                        <li>20.11.2017</li>
                    </ul>
                    <h4>Elitr mandamus cu has</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div>
            /box_news
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure><img src="img/news_home_4.jpg" alt="">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>Paula Rodrigez</li>
                        <li>20.11.2017</li>
                    </ul>
                    <h4>Id est adhuc ignota delenit</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div>
            /box_news
        </div>
        /row
        <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
</div> -->
<!-- End container -->
@stop