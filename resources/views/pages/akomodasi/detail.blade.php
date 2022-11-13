@extends('layouts.app')
@section('title')
<title>Detail | Home</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="{{URL::to('/')}}/img/akomodasi/{{$akomodasi->foto}}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $akomodasi->name }}</h1>
                    <span>{{ $akomodasi->address }}</span>
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
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Category</a>
                </li>
                <li>Page active</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-8" id="single_tour_desc">

                <div id="single_tour_feat">
                    <ul>
                        <li><i class="icon_set_1_icon-83"></i>Buka Setiap hari</li>
                        <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                        <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                        <li><i class="icon_set_1_icon-97"></i>Audio guide</li>
                        <li><i class="icon_set_1_icon-29"></i>Tour guide</li>
                    </ul>
                </div>

                <p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p>
                <!-- Map button for tablets/mobiles -->

                <div class="row">
                    <div class="col-lg-3">
                        <h3>Deskripsi</h3>
                    </div>
                    <div class="col-lg-9">
                        <h4> {{ $akomodasi->name }} </h4>
                        <p>
                            {{ $akomodasi->desc }}
                        </p>
                        <!-- End row  -->
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <h3>Schedule</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            1st March to 31st October
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Monday
                                        </td>
                                        <td>
                                            10.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tuesday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Wednesday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Thursday
                                        </td>
                                        <td>
                                            <span class="label label-danger">Closed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Friday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Saturday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sunday
                                        </td>
                                        <td>
                                            10.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><em>Last Admission</em></strong>
                                        </td>
                                        <td>
                                            <strong>17.00</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            1st November to 28th February
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Monday
                                        </td>
                                        <td>
                                            10.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tuesday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Wednesday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Thursday
                                        </td>
                                        <td>
                                            <span class="label label-danger">Closed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Friday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Saturday
                                        </td>
                                        <td>
                                            09.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sunday
                                        </td>
                                        <td>
                                            10.00 - 17.30
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><em>Last Admission</em></strong>
                                        </td>
                                        <td>
                                            <strong>17.00</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>

            </div>
            <!--End  single_tour_desc-->

            <aside class="col-lg-4">
                <p class="d-none d-xl-block d-lg-block d-xl-none">
                    <a class="btn_map" data-toggle="collapse" href="https://maps.google.com" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                </p>
                <!--/box_style_1 -->


            </aside>
        </div>
        <!--End row -->
    </div>
    <!--End container -->
    
<div id="overlay"></div>
<!-- Mask on input focus -->
    
</main>
<!-- End main -->
@endsection
@section('additionalHead')

@endsection