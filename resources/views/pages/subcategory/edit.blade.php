

@extends('layouts.app')
@section('title')
<title>Admin Page | Edit Sub Kategori</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
            <p>Edit Sub Kategori</p>
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
                        <h2>Edit Sub Kategori</h2>
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
                <form action="{{ route('subcategory.update', $subCategory->id) }}" method="POST">
                @method('PATCH')    
                @csrf
                    <div class="form-group">
                        <label for="tName">Nama:</label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName" value="{{$subCategory->name}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Kategori:</label>
                        <select class="form-control" name="category">
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}"
                            {{ $subCategory->category == $cat->id ? 'checked' : '' }}>
                            {{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon Sub Kategori:</label><br>
                        @for($a = 1; $a < 101; $a++)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_1_icon-{{$a}}" name="icon" value="icon_set_1_icon-{{$a}}"
                            {{ $subCategory->icon == 'icon_set_1_icon-'.$a ? 'checked' : '' }}>
                            <label class="form-check-label" for="icon_set_1_icon-{{$a}}">
                                <i class="icon_set_1_icon-{{$a}}" style="zoom:2.5;"></i>
                            </label>
                        </div>
                        @endfor
                        @for($a = 102; $a < 118; $a++)
                        @if($a != 113)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_2_icon-{{$a}}" name="icon" value="icon_set_2_icon-{{$a}}"
                            {{ $subCategory->icon == 'icon_set_2_icon-'.$a ? 'checked' : '' }}>
                            <label class="form-check-label" for="icon_set_2_icon-{{$a}}">
                                <i class="icon_set_2_icon-{{$a}}" style="zoom:2.5;"></i>
                            </label>
                        </div>
                        @endif
                        @endfor
                        @for($a = 1; $a < 12; $a++)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_3_restaurant-{{$a}}" name="icon" value="icon_set_3_restaurant-{{$a}}"
                            {{ $subCategory->icon == 'icon_set_3_restaurant-'.$a ? 'checked' : '' }}>
                            <label class="form-check-label" for="icon_set_3_restaurant-{{$a}}">
                                <i class="icon_set_3_restaurant-{{$a}}" style="zoom:2.5;"></i>
                            </label>
                        </div>
                        @endfor
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
            '][subject]" placeholder="Masukkan Sub Kategori" class="form-control" /></td><td><input type="number" name="addMoreInputFields1[' + i + 
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