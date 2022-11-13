

@extends('layouts.app')
@section('title')
<title>Register | Tambah Destinasi</title>
@endsection
@section('content')
@if(session('error'))
<div class="alert alert-danger">
    <b>Opps!</b> {{session('error')}}
</div>
@endif
<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                        <h3 style="text-align:center;">Register</h3>
                        <hr>
                        <form action="{{ route('postRegistration') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class=" form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <input type="hidden" name="addplace" class="form-control" placeholder="Password" value="{{$addplace}}">
                            <!-- <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class=" form-control" id="password2" name="password2" placeholder="Confirm password">
                            </div> -->
                            <div id="pass-info" class="clearfix"></div>
                            <button class="btn_full">Create an account</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End section -->

@endsection
@section('footer-scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Masukkan Kategori" class="form-control" /></td><td><input type="number" name="addMoreInputFields1[' + i + 
            '][subject]" placeholder="Masukkan Harga tanpa titik" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection