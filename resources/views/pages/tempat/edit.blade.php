

@extends('layouts.app')
@section('title')
<title>Admin Page | Ubah Tempat</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
            <p>Ubah Tempat</p>
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
                        <h2>Ubah Tempat</h2>
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
                <form action="{{ route('tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')    
                @csrf
                <div class="form-group">
                        <label for="tName">Nama:</label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName" value="{{$tempat->name}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">Deskripsi:</label>
                        <textarea type="text" class="form-control" id="tDesc" placeholder="Masukkan Deskripsi" name="tDesc"> {{$tempat->desc}} </textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tLong">Kecamatan:</label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN</option>
                                    <option value ="ARGOMULYO" {{ $tempat->kecamatan == 'ARGOMULYO' ? 'selected' : '' }}> ARGOMULYO</option>
                                    <option value ="TINGKIR" {{ $tempat->kecamatan == 'TINGKIR' ? 'selected' : '' }}> TINGKIR</option>
                                    <option value ="SIDOMUKTI" {{ $tempat->kecamatan == 'SIDOMUKTI' ? 'selected' : '' }}> SIDOMUKTI</option>
                                    <option value ="SIDOREJO" {{ $tempat->kecamatan == 'SIDOREJO' ? 'selected' : '' }}> SIDOREJO</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Desa:</label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option value="{{$tempat->desa}}">{{$tempat->desa}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tName">Detail Alamat:</label>
                        <input type="text" class="form-control" id="tAddress" placeholder="Masukkan Detail Alamat" name="tAddress" value="{{$tempat->address}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">MapUrl:</label>
                        <input type="url" class="form-control" id="tMapUrl" placeholder="Masukkan Url Map" name="tMapUrl" value="{{$tempat->mapUrl}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">Harga Tiket:</label>
                        <input type="text" class="form-control" id="tTicket" placeholder="Masukkan Harga Tiket" name="tTicket" value="{{$tempat->ticket}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">Website:</label>
                        <input type="text" class="form-control" id="tUrl" placeholder="Masukkan Url Website (Jika Ada)" name="tUrl" value="{{$tempat->url}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">Website:</label>
                        <input type="text" class="form-control" id="tVideo" placeholder="Masukkan Url Website (Jika Ada)" name="tVideo" value="{{$tempat->video}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto: </label> <br>
                        <label for="" style="color:red;font-style:italic;">*Foto urutan pertama akan menjadi foto utama</label>
                        <?php
                        $temp = str_replace("[","",$tempat->imageArray);
                        $temp = str_replace('"','',$temp);
                        $temp = str_replace("]","",$temp);
                        $tempArr = explode(',',$temp)
                        ?>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <tr class="text-center table-bordered">
                                    <td>Foto</td>
                                    <td>Deskripsi Foto</td>
                                    <td>Aksi</td>
                                </tr>
                                @foreach($image as $t)
                                <tr class="text-center table-bordered">
                                    <td>
                                        <input type="text" name="old[]" value="{{$t->image}}" style="visibility: hidden;width: 5px;height: 1px;" class="form-control">
                                        <img src="{{URL::to('/')}}/img/tempat/{{$t->image}}" style="max-width:100px; max-height:100px" alt=""></td>
                                    <td>{{ $t->desc }}</td>
                                    <td>
                                    <form action="{{route('images.destroy',$t->id)}}" method="POST">
                                        @method('DELETE')
                                                @csrf
                                                <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview" onclick="return setValue({{$t}});">
                                                    <i class="icon_set_1_icon-17"></i>
                                                </a>
                                                <script>
                                                    function setValue(id){

                                                        console.log(id)
                                                        $('#desc_img').attr('value', id.desc);
                                                        $('#id_image').attr('value', id.id);
                                                        $('#img').attr('src', 'https://salatigatourism.com/img/tempat/'+id.image);
                                                    }
                                                </script>

                                                <input type="text" id="idDelete" name="idDelete" value="{{$t->id}}" style="visibility:hidden;width:0px;height:0px">
                                                    <!-- <button type="submit" class="btn btn-danger" onclick="return myFunctiona();"> -->
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="icon_set_1_icon-67"></i>
                                                    </button>                                        
                                                </button>                                        
                                                    </button>                                        
                                                <!-- <a class="btn btn-danger" onclick="return myFunction();" href=""><i class="icon_set_1_icon-67"></i></a> -->
                                                <script>
                                                function myFunctiona() {
                                                    if(!confirm("Anda yakin akan menghapus gambar ini?"))
                                                    event.preventDefault();
                                                }
                                                </script>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" style="text-align:center;">
                                        <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#newImage">
                                            Tambah Gambar <i class="icon_set_1_icon-17"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
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
                                        <input type="time" id="seninJumat1" name="seninJumat1" placeholder="Buka" class="form-control" value="{{substr($tempat->seninJumat, 0, 5)}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="seninJumat2" name="seninJumat2" placeholder="Buka" class="form-control" value="{{substr($tempat->seninJumat, 6,10)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Sabtu-Minggu:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu1" name="sabtuMinggu1" placeholder="Buka" class="form-control" value="{{substr($tempat->sabtuMinggu, 0,5)}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu2" name="sabtuMinggu2" placeholder="Buka" class="form-control" value="{{substr($tempat->sabtuMinggu, 6,10)}}">
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
                            <input class="form-check-input" type="checkbox" id="cIsAllDay" name="cIsAllDay" value="1" {{ $tempat->isOpenAllDay == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cIsAllDay">Buka 24 Jam</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cDisabilitas" name="cDisabilitas" value="1" {{ $tempat->disabilities == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cDisabilitas">Ramah Bagi disabilitas</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cParkir" name="cParkir" value="1" {{ $tempat->parkir == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cParkir">Tersedia Parkir</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cWifi" name="cWifi" value="1" {{ $tempat->wifi == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cWifi">Tersedia Wifi</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cHeadline" name="cHeadline" value="1" {{ $tempat->isHeadline == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cHeadline">Tampilkan pada halaman Utama</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cIcon" name="cIcon" value="1" {{ $tempat->isIcon == '1' ? 'checked' :'' }} >
                            <label class="form-check-label" for="cIcon">Jadikan Icon Kategori</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Tags:</label>
                        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach($subcategory as $subcat)
                            <option value="{{$subcat->name}}" {{ Str::contains($tempat->tags, $subcat->name) ? 'selected':'' }}>{{$subcat->name}}</option>
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
<div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myReviewLabel">Edit Gambar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
                    <form action="{{ route('imageUpdate') }}" method="POST">
                    @csrf
						<input name="hotel_name" id="hotel_name" type="hidden" value="Mariott Hotel Paris">
						<div class="row">
                            <div class="col-md-2">
								<div class="form-group">
									Deskripsi Gambar:
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<input name="desc_img" id="desc_img" type="text" placeholder="Deskripsi Gambar" class="form-control">
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <img src="" id="img" alt="">
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                            <input name="id_image" id="id_image" type="text" placeholder="id" class="form-control" style="visibility: hidden;">
                                <input name="new_image" id="new_image" type="file" placeholder="id" class="form-control">
                            </div>
                        </div>
						<!-- End row -->
                        <hr>
						<!-- <div class="form-group">
							<input type="text" id="verify_review" class=" form-control" placeholder="Verifikasi diri anda. 3 + 1 =">
						</div> -->
						<input type="submit" value="Simpan" class="btn_1" id="submit-review">
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="newImage" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myReviewLabel">Tambah Gambar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
                    <form action="{{ route('imageAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
						<div class="row">
                            <div class="col-md-2">
								<div class="form-group">
									Deskripsi Gambar:
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<input name="new_desc_img" id="new_desc_img" type="text" placeholder="Deskripsi Gambar" class="form-control">
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <input name="add_new_image" id="add_new_image" type="file" placeholder="id" class="form-control">
                                <input name="id_new_image" id="id_new_image" type="text" placeholder="id" class="form-control" value="{{$tempat->id}}" style="visibility:hidden;">
                            </div>
                        </div>
						<!-- End row -->
                        <hr>
						<!-- <div class="form-group">
							<input type="text" id="verify_review" class=" form-control" placeholder="Verifikasi diri anda. 3 + 1 =">
						</div> -->
						<input type="submit" value="Simpan" class="btn_1" id="submit-review">
					</form>
				</div>
			</div>
		</div>
	</div>