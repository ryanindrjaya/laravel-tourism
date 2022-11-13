

@extends('layouts.app')
@section('title')
<title>Admin Page | Edit Acara</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
            <p>Edit Acara</p>
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
                        <h2>Edit Acara</h2>
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
                <form action="{{ route('acara.update',$acara->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')    
                    @csrf
                    <div class="form-group">
                        <label for="tName">Nama:</label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName" value="{{$acara->name}}">
                    </div>
                    <div class="form-group">
                        <label for="tDesc">Deskripsi:</label>
                        <textarea class="form-control" id="tDesc" name="tDesc" rows="3" placeholder="Masukkan Deskripsi">{{$acara->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tLong">Kecamatan:</label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN</option>
                                    <option value ="ARGOMULYO" {{ $acara->kecamatan == 'ARGOMULYO' ? 'selected' :'' }}> ARGOMULYO</option>
                                    <option value ="TINGKIR" {{ $acara->kecamatan == 'TINGKIR' ? 'selected' :'' }}> TINGKIR</option>
                                    <option value ="SIDOMUKTI" {{ $acara->kecamatan == 'SIDOMUKTI' ? 'selected' :'' }}> SIDOMUKTI</option>
                                    <option value ="SIDOREJO" {{ $acara->kecamatan == 'SIDOREJO' ? 'selected' :'' }}> SIDOREJO</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Desa:</label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option value ="{{$acara->desa}}" selected> {{$acara->desa}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tDesc">Map Url (Google Maps):</label>
                        <input type="text" class="form-control" id="tMaps" placeholder="Masukkan Url" name="tMaps" value="{{$acara->mapUrl}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto: </label>
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Edit</button>
                            </div>
                            </div>
                            <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]" class="form-control">
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
                        <label for="tVideo">Harga Ticket:</label>
                        <input type="number" class="form-control" id="tTicket" placeholder="Masukkan Harga Ticket" name="tTicket" value="{{$acara->ticket}}">
                    </div>
                    <div class="form-group">
                        <label for="tVideo">Tanggal Acara:</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tVideo">Tanggal Mulai:</label>
                                <input type="date" class="form-control" id="tStart" placeholder="Masukkan Tanggal" name="tStart" value="{{$acara->start}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="tVideo">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id="tEnd" placeholder="Masukkan Tanggal" name="tEnd" value="{{$acara->end}}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tLong">Longitude:</label>
                                <input type="text" class="form-control" id="tLong" placeholder="Masukkan Longitude" name="tLong">
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Latitude:</label>
                                <input type="text" class="form-control" id="tLat" placeholder="Masukkan Latitude" name="tLat">
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="image">Tags:</label>
                        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                            <option value="BUDAYA">BUDAYA</option>
                            <option value="OLAHRAGA">OLAHRAGA</option>
                            <option value="REKREASI">REKREASI</option>
                            <option value="RELIGI">RELIGI</option>
                            <option value="SEJARAH">SEJARAH</option>
                        </select>
                    </div> -->
                
                    <!-- <div class="form-group">
                        <label for="tTiket">Jam Operasional:</label>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cSenin" value="option1">
                                <label class="form-check-label" for="cSenin">Senin</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tSenin" placeholder="Cth: 09:00-17:00" name="tSenin">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cSelasa" value="option1">
                                <label class="form-check-label" for="cSelasa">Selasa</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tSelasa" placeholder="Cth: 09:00-17:00" name="tSelasa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cRabu" value="option1">
                                <label class="form-check-label" for="cRabu">Rabu</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tRabu" placeholder="Cth: 09:00-17:00" name="tRabu">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cKamis" value="option1">
                                <label class="form-check-label" for="cKamis">Kamis</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tKamis" placeholder="Cth: 09:00-17:00" name="tKamis">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cJumat" value="option1">
                                <label class="form-check-label" for="cJumat">Jumat</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tJumat" placeholder="Cth: 09:00-17:00" name="tJumat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cSabtu" value="option1">
                                <label class="form-check-label" for="cSabtu">Sabtu</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tSabtu" placeholder="Cth: 09:00-17:00" name="tSabtu">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="cMinggu" value="option1">
                                <label class="form-check-label" for="cMinggu">Minggu</label>
                            </div>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tMinggu" placeholder="Cth: 09:00-17:00" name="tMinggu">
                            </div>
                        </div>            
                    </div> -->
                    <div class="form-group">
                        <label for="tOther">Lainnya: </label>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cDisabilitas" name="cDisabilitas" value="1" {{ $acara->disabilitas == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cDisabilitas">Ramah Bagi disabilitas</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cParkir" name="cParkir" value="1" {{ $acara->parkiran == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cParkir">Tersedia Parkir</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cWifi" name="cWifi" value="1" {{ $acara->wifi == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cWifi">Tersedia Wifi</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cHeadline" name="cHeadline" value="1" {{ $acara->isHeadline == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cHeadline">Tampilkan pada halaman Utama</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cIcon" name="cIcon" value="1" {{ $acara->isIcon == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cIcon">Jadikan Icon Kategori</label>
                        </div>
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
            '][subject]" placeholder="Masukkan Kategori" class="form-control" /></td><td><input type="number" name="addMoreInputFields1[' + i + 
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