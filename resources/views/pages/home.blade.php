@extends('layouts.app')
@section('title')
<title>Dolan Salatiga | Disbudpar Salatiga</title>
@endsection
@section('content')

<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        @foreach($headline as $head)
        <div class="owl-slide cover" style="background-image: url('img/headline/{{$head->image}}');">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text {{$head->alignment}} white">
                                <h2 class="owl-slide-animated owl-slide-title">{{ $head->title }}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{ $head->subtitle }}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta">
                                    <a class="btn_1 smooth-goto6" href="javascript:void(0)" role="button">Selengkapnya</a>
                                </div>
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
<div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
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

<div class="container margin_60" id="scrolling" #scrolling>

<div class="main_title">
        <h2>Kunjungi <span>Destinasi</span> Menarik</h2>
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
                        <img src="{{URL::to('/')}}/img/tempat/{{$tempat->image}}" style="width: 560px;min-height:270px;max-height: 270px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
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
        <h2>Jelajahi <span>Destinasi</span> Menarik</h2>
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
                        <img src="{{URL::to('/')}}/img/tempat/{{$tempat->image}}" style="width: 560px;min-height:270px;max-height: 270px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
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
        <h2>Ikuti <span>Event</span> Menarik</h2>
        <p>Beragam acara untuk diikuti</p>
        <!-- <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p> -->
    </div>

    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
        @foreach ($acaras as $tempat)
        <div class="item">
            <div class="tour_container">
                <!-- <div class="ribbon_3 popular"><span>Terbaik</span></div> -->
                <div class="img_container">
                    <a href="acara/{{$tempat->id}}">
                        <img src="{{URL::to('/')}}/img/acara/{{$tempat->image}}" style="width: 560px;min-height:270px;max-height: 270px;object-fit: cover;" width="800" height="533" class="img-fluid" alt="image">
                        <div class="short_info">
                            Event
                            <!-- <span class="price">
                                <sup>$</sup>39
                            </span> -->
                        </div>
                    </a>
                </div>
                <div class="tour_title">
                    <h3><strong>{{ $tempat->name }}</strong></h3>
                    <h6>{{ $tempat->start }} - {{ $tempat->end }}</h6>
                    <h6>{{ $tempat->desa }} {{ $tempat->kecamatan }}</h6>
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
        <a href="fullcalender" class="btn_1">Lihat Semua Acara</a>
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