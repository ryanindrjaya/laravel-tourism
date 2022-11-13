

@extends('layouts.app')
@section('title')
<title>Login</title>
@endsection
@section('content')
<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                        <h3 style="text-align:center;">Login</h3>
                        <hr>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{session('error')}}
                        </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-primary">
                            {{session('message')}}
                        </div>
                        @endif
                        <form action="{{ route('actionlogin') }}" method="post">
                            @csrf
                         <!--<a href="#0" class="social_bt facebook">Login with Facebook</a> -->
                        <a href="{{ '/auth/redirect'}}" class="social_bt google">Login with Google</a>
                        <div class="divider"><span>Or</span></div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                            </div>
                            <input type="hidden" name="addplace" class="form-control" placeholder="Password" value="{{$addplace}}">
                            <!-- <p class="small">
                                <a href="#">Forgot Password?</a>
                            </p> -->
                            <div class="text-center"><input type="submit" value="Log In" class="btn_login"></div>
                            <a href="/register?addplace=1" class="btn_full_outline" style="background: #00799e;color: #fff;border: 2px solid #00799e;margin-bottom: 10px;">Belum punya akun? Klik disini</a>
                            <a href="/forget-password" class="btn_full_outline" style="background: #fff;color: #00799e;border: 2px solid #00799e;">Lupa password? Klik disini</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection