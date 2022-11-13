<!-- <div id="top_line">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <i class="icon-phone"></i><strong>0812</strong>
            </div>
            <div class="col-6">
                <ul id="top_links">
                    <li><a href="#sign-in-dialog" id="access_link">Sign in</a></li>
                </ul>
            </div>
        </div>End row
    </div>End container
</div>End top line -->

<div class="container">
    <div class="row">
        <div class="col-3">
            <div id="logo_home">
                <h1><a href="/" title="Dolan Salatiga" style="background-image: url(../img/logo_2x.png);">Dolan Salatiga</a></h1>
            </div>
        </div>
        <nav class="col-9" style="text-align:right;">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{URL::to('/')}}/img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                <ul>
                    @foreach($categorynavbar as $cat)
                    <li class="submenu" style="text-align:left;">
                        <a href="javascript:void(0);" class="show-submenu"><i class="{{$cat->icon}}"></i> {{$cat->name}} <i class="icon-down-open-mini"></i></a>
                        <ul>
                            @foreach($subcategorynavbar as $subcat)
                                @if($subcat->category == $cat->id)
                                <li><a href="/cari?cari={{$subcat->name}}&cat={{$cat->id}}"><i class="{{$subcat->icon}}"></i> {{$subcat->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <li class="submenu" style="text-align:left;">
                        <a href="javascript:void(0);" class="show-submenu"><i class="icon_set_1_icon-53"></i> Acara <i class="icon-down-open-mini"></i></a>
                        <ul>
                            <li><a href="/fullcalender"><i class="icon_set_1_icon-53"></i> Kalender</a></li>
                        </ul>
                    </li>
                    <li class="submenu" style="text-align:left;">
                        <!-- @if (Auth::guest())
                        <a href="javascript:void(0);" class="show-submenu"><i class="icon-login-2"></i> Login <i class="icon-down-open-mini"></i></a>
                        <ul>
                            <li><a href="/login"><i class="icon-login-2"></i> Login</a></li>
                        </ul>
                        @endif -->
                        @if (Auth::check())
                        <a href="javascript:void(0);" class="show-submenu"><i class="icon-user-2"></i> Auth <i class="icon-down-open-mini"></i></a>
                        <ul>
                        {{ auth()->user()->some_column }}
                            @if(auth()->user()->isAdmin == 1)
                            <li><a href="/admin"><i class="icon-user-2"></i> Admin Page</a></li>
                            @endif
                            <li><a href="/add-place"><i class="icon_set_1_icon-41"></i> Tambahkan Tempat</a></li>
                            <li><a href="/actionlogout"><i class="icon-logout"></i> Logout</a></li>
                        </ul>
                        @endif
                    </li>
                </ul>
            </div><!-- End main-menu -->
            <ul id="top_tools">
                <!-- <li>
                    <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                </li> -->
                <!-- <li>
                    <div class="dropdown dropdown-cart">
                        <a href="#" data-toggle="dropdown" class="cart_bt"><i class="icon_bag_alt"></i><strong>3</strong></a>
                        <ul class="dropdown-menu" id="cart_items">
                            <li>
                                <div class="image"><img src="img/thumb_cart_1.jpg" alt="image"></div>
                                <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                <a href="#" class="action"><i class="icon-trash"></i></a>
                            </li>
                            <li>
                                <div class="image"><img src="img/thumb_cart_2.jpg" alt="image"></div>
                                <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                <a href="#" class="action"><i class="icon-trash"></i></a>
                            </li>
                            <li>
                                <div class="image"><img src="img/thumb_cart_3.jpg" alt="image"></div>
                                <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                <a href="#" class="action"><i class="icon-trash"></i></a>
                            </li>
                            <li>
                                <div>Total: <span>$120.00</span></div>
                                <a href="cart.html" class="button_drop">Go to cart</a>
                                <a href="payment.html" class="button_drop outline">Check out</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </nav>
    </div>
</div><!-- container -->