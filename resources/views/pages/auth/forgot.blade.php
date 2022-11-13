

@extends('layouts.app')
@section('title')
<title>Reset Password</title>
@endsection
@section('content')
<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                        <h3 style="text-align:center;">Reset Password</h3>
                        <hr>
                        Kami akan mengirimkan email reset password ke email anda
                        <hr>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{session('error')}}
                        </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-success">
                            <b>Berhasil!</b>{{session('message')}}
                        </div>
                        @endif
                        <form action="{{ route('forget.password.post') }}" method="post">
                            @csrf
                        <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a> -->
                        <!-- <a href="{{ '/auth/redirect'}}" class="social_bt google">Login with Google</a>
                        <div class="divider"><span>Or</span></div> -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <!-- <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                            </div> -->
                            <!-- <p class="small">
                                <a href="#">Forgot Password?</a>
                            </p> -->

                            <div class="text-center"><input type="submit" value="Reset Password" class="btn_login"></div>
                            <!-- <a href="/register" class="btn_full_outline">Register</a> -->
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection