

@extends('layouts.app')
@section('title')
<title>Admin Page | Tambah Tempat</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
            <p>Tambahkan Tempat</p>
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
                <li>Admin</li>
            </ul>
        </div>
    </div>
    <!-- Position -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-11">
                        <h2>Tambahkan Tempat</h2>
                    </div>
                    <div class="col-lg-1">
                        <a class="btn btn-primary" href="{{ url('/admin') }}"> Back</a>
                    </div>
                </div>
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tempat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tName">Nama:</label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName">
                    </div>
                    <div class="form-group">
                        <label for="tName">Deskripsi:</label>
                        <textarea type="text" class="form-control" id="tDesc" placeholder="Masukkan Deskripsi" name="tDesc"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tLong">Kecamatan:</label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN</option>
                                    <option value ="ARGOMULYO"> ARGOMULYO</option>
                                    <option value ="TINGKIR"> TINGKIR</option>
                                    <option value ="SIDOMUKTI"> SIDOMUKTI</option>
                                    <option value ="SIDOREJO"> SIDOREJO</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Desa:</label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN DAHULU</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tName">Detail Alamat:</label>
                        <input type="text" class="form-control" id="tAddress" placeholder="Masukkan Detail Alamat" name="tAddress">
                    </div>
                    <div class="form-group">
                        <label for="tName">MapUrl:</label>
                        <input type="url" class="form-control" id="tMapUrl" placeholder="Masukkan Url Map" name="tMapUrl">
                    </div>
                    <div class="form-group">
                        <label for="tName">Harga Tiket:</label>
                        <input type="text" class="form-control" id="tTicket" placeholder="Masukkan Harga Tiket" name="tTicket">
                    </div>
                    <div class="form-group">
                        <label for="tName">Website:</label>
                        <input type="text" class="form-control" id="tUrl" placeholder="Masukkan Url Website (Jika Ada)" name="tUrl">
                    </div>
                    <div class="form-group">
                        <label for="tName">Youtube Video:</label>
                        <input type="text" class="form-control" id="tVideo" placeholder="Masukkan Video Youtube (Jika Ada)" name="tVideo">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto: </label>
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control">
                            <input type="text" name="imgDesc[]" id="" class="form-control" placeholder="Tambahkan deskripsi gambar">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                            </div>
                            </div>
                            <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]" class="form-control">
                                <input type="text" name="imgDesc[]" id="" class="form-control" placeholder="Tambahkan deskripsi gambar">
                                <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                                </div>
                            </div>
                        </div>
                        <label for="" style="color:red;font-style:italic;">*Foto urutan pertama akan menjadi foto utama</label>
                        <!-- <input class="form-control" type="file" id="image" name="image" /> -->
                        <!-- <input type="file" class="form-control" id="image" placeholder="Masukkan Foto" name="tFoto"> -->
                    </div>
                    <div class="form-group">
                        <label for="tAddress">Jam Operasional:</label>
                        <div class="row">
                            <div class="col-lg-6">
                            <label for="tLat">Senin-Jumat:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="time" id="seninJumat1" name="seninJumat1" placeholder="Buka" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="seninJumat2" name="seninJumat2" placeholder="Buka" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Sabtu-Minggu:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu1" name="sabtuMinggu1" placeholder="Buka" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu2" name="sabtuMinggu2" placeholder="Buka" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <textarea class="form-control" id="tAddress" name="tAddress" rows="3" placeholder="Masukkan Deskripsi"></textarea> -->
                        <!-- <input type="time" class="form-control datetimepicker" id="datetimepicker" name="Appointment_time">  -->
                    </div>
                    <div class="form-group">
                        <label for="tOther">Lainnya: </label>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cDisabilitas" name="cDisabilitas" value="1">
                            <label class="form-check-label" for="cDisabilitas">Ramah Bagi disabilitas</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cParkir" name="cParkir" value="1">
                            <label class="form-check-label" for="cParkir">Tersedia Parkir</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cWifi" name="cWifi" value="1">
                            <label class="form-check-label" for="cWifi">Tersedia Wifi</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cHeadline" name="cHeadline" value="1">
                            <label class="form-check-label" for="cHeadline">Tampilkan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Tags:</label>
                        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach($subcategorynavbar as $subcat)
                            <option value="{{$subcat->name}}">{{$subcat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</main>
<!-- End main -->
@endsection
@section('footer-scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Masukkan Tempat" class="form-control" /></td><td><input type="number" name="addMoreInputFields1[' + i + 
            '][subject]" placeholder="Masukkan Harga tanpa titik" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    $('#kecamatan').on('change', function () {
        console.log($(this).val());
        if($(this).val() == "ARGOMULYO"){
            $("#desa").empty();
            $("#desa").append('<option value ="NOBOREJO"> NOBOREJO</option>' +
                '<option value ="CEBONGAN"> CEBONGAN</option>' +
                '<option value ="RANDUACIR"> RANDUACIR</option>' +
                '<option value ="LEDOK"> LEDOK</option>' +
                '<option value ="TEGALREJO"> TEGALREJO</option>' +
                '<option value ="KUMPULREJO"> KUMPULREJO</option>');
        }else if($(this).val() == "TINGKIR"){
            $("#desa").empty();
            $("#desa").append('<option value ="TINGKIR LOR"> TINGKIR LOR</option>' +
                '<option value ="KALIBENING"> KALIBENING</option>' +
                '<option value ="SIDOREJO KIDUL"> SIDOREJO KIDUL</option>' +
                '<option value ="GENDONGAN"> GENDONGAN</option>' +
                '<option value ="KUTOWINANGUN KIDUL"> KUTOWINANGUN KIDUL</option>' +
                '<option value ="KUTOWINANGUN LOR"> KUTOWINANGUN LOR</option>');
        }else if($(this).val() == "SIDOMUKTI"){
            $("#desa").empty();
            $("#desa").append('<option value ="KECANDRAN"> KECANDRAN</option>' +
                '<option value ="MANGUNSARI"> MANGUNSARI</option>' +
                '<option value ="DUKUH"> DUKUH</option>' +
                '<option value ="KALICACING"> KALICACING</option>');
        }else if($(this).val() == "SIDOREJO"){
            $("#desa").empty();
            $("#desa").append('<option value ="PULUTAN"> PULUTAN</option>' +
                '<option value ="BLOTONGAN"> BLOTONGAN</option>' +
                '<option value ="KAUMAN KIDUL"> KAUMAN KIDUL</option>' +
                '<option value ="SALATIGA"> SALATIGA</option>' +
                '<option value ="SIDOREJO LOR"> SIDOREJO LOR</option>');
        }else{
            $("#desa").empty();
            $("#desa").append('<option value =""> PILIH KECAMATAN DAHULU</option>' );
        }

    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
    });
    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".control-group").remove();
    });
</script>
@endsection