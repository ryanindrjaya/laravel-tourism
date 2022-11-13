<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div style="display: flex;align-content: center;align-items: center;justify-content: center;height:100%;">
                <img src="{{URL::to('/')}}/img/logo_sticky.png" alt="">
            </div>
        </div>
        <div class="col-md-4">
            <h3>Butuh bantuan?</h3>
            <a href="tel://089524621666" id="phone">+62 895 2462 1666</a>
            <a href="wa.me/6281225951789" id="phone">+62 895 2462 1666 (WA)</a>
            <a href="mailto:help@dolansalatiga.com" id="email_footer">help@dolansalatiga.com</a>
        </div>
        <div class="col-md-4" style="display: flex;justify-content: center;align-items: center;">
            <a href="/add-place">Tambahkan tempat anda disini</a>
        </div>
       <!-- @if(count($categorynavbar)>0)
       <div class="col-md-2">
            <h3>{{$categorynavbar[0]->name}}</h3>
            <ul>
                @foreach($subcategorynavbar as $subcat)
                    @if($subcat->category == $categorynavbar[0]->id)
                    <li><a href="/cari?cari={{$subcat->name}}"><i class="{{$subcat->icon}}"></i> {{$subcat->name}}</a></li>
                    @endif
                @endforeach
                
            </ul>
        </div>
        @if(count($categorynavbar)>1)
        <div class="col-md-2">
            <h3>{{$categorynavbar[1]->name}}</h3>
            <ul>
                @foreach($subcategorynavbar as $subcat)
                    @if($subcat->category == $categorynavbar[1]->id)
                    <li><a href="/cari?cari={{$subcat->name}}"><i class="{{$subcat->icon}}"></i> {{$subcat->name}}</a></li>
                    @endif
                @endforeach
                
            </ul>
        </div>
        @endif
        @if(count($categorynavbar)>2)
        <div class="col-md-2">
            <h3>{{$categorynavbar[2]->name}}</h3>
            <ul>
                @foreach($subcategorynavbar as $subcat)
                    @if($subcat->category == $categorynavbar[2]->id)
                    <li><a href="/cari?cari={{$subcat->name}}"><i class="{{$subcat->icon}}"></i> {{$subcat->name}}</a></li>
                    @endif
                @endforeach
                
            </ul>
        </div>
        @endif
        @if(count($categorynavbar)>3)
        <div class="col-md-2">
            <h3>{{$categorynavbar[3]->name}}</h3>
            <ul>
                @foreach($subcategorynavbar as $subcat)
                    @if($subcat->category == $categorynavbar[3]->id)
                    <li><a href="/cari?cari={{$subcat->name}}"><i class="{{$subcat->icon}}"></i> {{$subcat->name}}</a></li>
                    @endif
                @endforeach
                
            </ul>
        </div>
        @endif
       @endif
       <div class="col-md-2">
           <h3>Acara</h3>
            <ul>
                <li><a href="/fullcalender"><i class="icon_set_1_icon-53"></i> Kalender</a></li>
            </ul>
       </div>
        <div class="col-md-2">
            @if (Auth::guest())
            <h3>Login</h3>
            <ul>
                <li><a href="/login"><i class="icon-login-2"></i> Login</a></li>
            </ul>
            @endif
            @if (Auth::check())
            <h3>Admin Page</h3>
            <ul>
                @if(auth()->user()->isAdmin == 1)
                <li><a href="/admin"><i class="icon-user-2"></i> Admin Page</a></li>
                @endif
                <li><a href="/destinasi/admin"><i class="icon_set_1_icon-24"></i> Detail Destinasi</a></li>
                <li><a href="/akomodasi/admin"><i class="icon_set_1_icon-23"></i> Detail Akomodasi</a></li>
                <li><a href="/kuliner/admin"><i class="icon_set_1_icon-58"></i> Detail Kuliner</a></li>
                <li><a href="/acara/admin"><i class="icon_set_1_icon-87"></i> Detail Acara</a></li>
                <li><a href="/fasum/admin"><i class="icon_set_1_icon-24"></i> Detail Fasilitas Umum</a></li>
                <li><a href="/actionlogout"><i class="icon-logout"></i> Logout</a></li>
            </ul>
            @endif
        </div> -->
        <!-- <div class="col-md-2">
            <h3>Settings</h3>
            <div class="styled-select">
                <select name="lang" id="lang">
                    <option value="English" selected>English</option>
                    <option value="French">French</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Russian">Russian</option>
                </select>
            </div>
            <div class="styled-select">
                <select name="currency" id="currency">
                    <option value="USD" selected>USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="RUB">RUB</option>
                </select>
            </div>
        </div> -->
    </div><!-- End row -->
    <div class="row">
        <div class="col-md-12">
            <div id="social_footer">
                <ul>
                    <li><a href="https://id-id.facebook.com/PemkotSalatiga/"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/pemkotsalatiga"><i class="icon-twitter"></i></a></li>
                    <!-- <li><a href="#"><i class="icon-google"></i></a></li> -->
                    <li><a href="https://www.instagram.com/pemkotsalatiga/?hl=id"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-vimeo"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UC0VwH0UcyIfpWZjVu0N1LyQ"><i class="icon-youtube-play"></i></a></li>
                </ul>
                <p>- 2022 -</p>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->