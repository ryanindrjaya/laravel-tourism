@extends('layouts.app')
@section('title')
<title>Tempat | Web Salatiga</title>
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<body>

  <section class="home-section">
    @if ($errors->any())
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
      </div>
    </div>
    @endif
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Tambahkan Tempat</div>
          @if(session('message'))
          <div class="alert alert-primary">
              {{session('message')}} dan dapat diakses pada <a href="/tempat/{{session('id')}}">Halaman ini</a>
          </div>
          @endif
            <div class="sales-details">
              <form action="{{ route('addingPlace') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tName">Nama:<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName">
                    </div>
                    <div class="form-group">
                        <label for="tName">Deskripsi:<span style="color:red;">*</span></label>
                        <textarea type="text" class="form-control" id="tDesc" placeholder="Masukkan Deskripsi" name="tDesc"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tLong">Kecamatan:<span style="color:red;">*</span></label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN</option>
                                    <option value ="ARGOMULYO"> ARGOMULYO</option>
                                    <option value ="TINGKIR"> TINGKIR</option>
                                    <option value ="SIDOMUKTI"> SIDOMUKTI</option>
                                    <option value ="SIDOREJO"> SIDOREJO</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Desa:<span style="color:red;">*</span></label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option value =""> PILIH KECAMATAN DAHULU</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tName">Detail Alamat:<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="tAddress" placeholder="Masukkan Detail Alamat" name="tAddress">
                    </div>
                    <div class="form-group">
                        <label for="tName">MapUrl:<span style="color:red;">*</span></label>
                        <input type="url" class="form-control" id="tMapUrl" placeholder="Masukkan Url Map" name="tMapUrl">
                    </div>
                    <div class="form-group">
                        <label for="tName">Harga Tiket:<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="tTicket" placeholder="Masukkan Harga Tiket" name="tTicket" value="0">
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
                        <label for="image">Foto: <span style="color:red;">*</span></label>
                        <div class="input-group control-group increment" >
                            <input type="file" name="gambar[]" class="form-control">
                            <input type="text" name="imgDesc[]" id="" class="form-control" placeholder="Tambahkan deskripsi gambar">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                            </div>
                            </div>
                            <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="gambar[]" class="form-control">
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
                        <label for="tAddress">Jam Operasional:<span style="color:red;">*</span></label>
                        <div class="row">
                            <div class="col-lg-6">
                            <label for="tLat">Senin-Jumat:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="time" id="seninJumat1" name="seninJumat1" placeholder="Buka" class="form-control" value="08:00">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="seninJumat2" name="seninJumat2" placeholder="Buka" class="form-control" value="21:00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="tLat">Sabtu-Minggu:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu1" name="sabtuMinggu1" placeholder="Buka" class="form-control" value="08:00">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" id="sabtuMinggu2" name="sabtuMinggu2" placeholder="Buka" class="form-control" value="21:00">
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
                        <label for="image">Tags:<span style="color:red;">*</span></label>
                        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach($subcategorynavbar as $subcat)
                            <option value="{{$subcat->name}}">{{$subcat->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <span style="color:red;">*</span> Wajib diisi
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/"class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </section>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
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
  <style>
      /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    .sidebar{
      position: fixed;
      height: 100%;
      width: 240px;
      background: linear-gradient(45deg, black, #e04f67);
      transition: all 0.5s ease;
    }
    .sidebar.active{
      width: 60px;
    }
    .sidebar .logo-details{
      height: 80px;
      display: flex;
      align-items: center;
    }
    .sidebar .logo-details i{
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
    }
    .sidebar .logo-details .logo_name{
      color: #fff;
      font-size: 24px;
      font-weight: 500;
    }
    .sidebar .nav-links{
      margin-top: 10px;
    }
    .sidebar .nav-links li{
      position: relative;
      list-style: none;
      height: 50px;
    }
    .sidebar .nav-links li a{
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
    }
    .sidebar .nav-links li a.active{
      background: #9c3949;
    }
    .sidebar .nav-links li a:hover{
      background: #9c3949;
    }
    .sidebar .nav-links li i{
      min-width: 60px;
      text-align: center;
      font-size: 18px;
      color: #fff;
    }
    .sidebar .nav-links li a .links_name{
      color: #fff;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
    }
    .sidebar .nav-links .log_out{
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    .home-section{
      /* position: relative; */
      background: #f5f5f5;
      min-height: 100vh;
      /* width: calc(100% - 240px); */
      /* left: 240px; */
      transition: all 0.5s ease;
    }
    .sidebar.active ~ .home-section{
      width: calc(100% - 60px);
      left: 60px;
    }
    .home-section nav{
      display: flex;
      justify-content: space-between;
      height: 80px;
      background: #fff;
      display: flex;
      align-items: center;
      position: fixed;
      width: calc(100% - 240px);
      left: 240px;
      z-index: 100;
      padding: 0 20px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
    }
    .sidebar.active ~ .home-section nav{
      left: 60px;
      width: calc(100% - 60px);
    }
    .home-section nav .sidebar-button{
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: 500;
    }
    nav .sidebar-button i{
      font-size: 35px;
      margin-right: 10px;
    }
    .home-section nav .search-box{
      position: relative;
      height: 50px;
      max-width: 550px;
      width: 100%;
      margin: 0 20px;
    }
    nav .search-box input{
      height: 100%;
      width: 100%;
      outline: none;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      font-size: 18px;
      padding: 0 15px;
    }
    nav .search-box .bx-search{
      position: absolute;
      height: 40px;
      width: 40px;
      background: #2697FF;
      right: 5px;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 4px;
      line-height: 40px;
      text-align: center;
      color: #fff;
      font-size: 22px;
      transition: all 0.4 ease;
    }
    .home-section nav .profile-details{
      display: flex;
      align-items: center;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      height: 50px;
      min-width: 190px;
      padding: 0 15px 0 2px;
    }
    nav .profile-details img{
      height: 40px;
      width: 40px;
      border-radius: 6px;
      object-fit: cover;
    }
    nav .profile-details .admin_name{
      font-size: 15px;
      font-weight: 500;
      color: #333;
      margin: 0 10px;
      white-space: nowrap;
    }
    nav .profile-details i{
      font-size: 25px;
      color: #333;
    }
    .home-section .home-content{
      position: relative;
      padding-top: 104px;
      padding-bottom: 20px;
      background: #9c9c9c;
    }
    .home-content .overview-boxes{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      padding: 0 20px;
      margin-bottom: 26px;
    }
    .overview-boxes .box{
      display: flex;
      align-items: center;
      justify-content: center;
      width: calc(100% / 4 - 15px);
      background: #fff;
      padding: 15px 14px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .overview-boxes .box-topic{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .box .number{
      display: inline-block;
      font-size: 35px;
      margin-top: -6px;
      font-weight: 500;
    }
    .home-content .box .indicator{
      display: flex;
      align-items: center;
    }
    .home-content .box .indicator i{
      height: 20px;
      width: 20px;
      background: #8FDACB;
      line-height: 20px;
      text-align: center;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      margin-right: 5px;
    }
    .box .indicator i.down{
      background: #e87d88;
    }
    .home-content .box .indicator .text{
      font-size: 12px;
    }
    .home-content .box .cart{
      display: inline-block;
      font-size: 32px;
      height: 50px;
      width: 50px;
      background: #cce5ff;
      line-height: 50px;
      text-align: center;
      color: #66b0ff;
      border-radius: 12px;
      margin: -15px 0 0 6px;
    }
    .home-content .box .cart.two{
      color: #2BD47D;
      background: #C0F2D8;
    }
    .home-content .box .cart.three{
      color: #ffc233;
      background: #ffe8b3;
    }
    .home-content .box .cart.four{
      color: #e05260;
      background: #f7d4d7;
    }
    .home-content .total-order{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .sales-boxes{
      display: flex;
      justify-content: space-between;
      /* padding: 0 20px; */
    }

    /* left box */
    .home-content .sales-boxes .recent-sales{
      width: 65%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .home-content .sales-boxes .sales-details{
      /* display: flex; */
      align-items: center;
      justify-content: space-between;
    }
    .sales-boxes .box .title{
      font-size: 24px;
      font-weight: 500;
      /* margin-bottom: 10px; */
    }
    .sales-boxes .sales-details li.topic{
      font-size: 20px;
      font-weight: 500;
    }
    .sales-boxes .sales-details li{
      list-style: none;
      margin: 8px 0;
    }
    .sales-boxes .sales-details li a{
      font-size: 18px;
      color: #333;
      font-size: 400;
      text-decoration: none;
    }
    .sales-boxes .box .button{
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }
    .sales-boxes .box .button a{
      color: #fff;
      background: #e04f67;
      padding: 4px 12px;
      font-size: 15px;
      font-weight: 400;
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .sales-boxes .box .button a:hover{
      background:  #0d3073;
    }

    /* Right box */
    .home-content .sales-boxes .top-sales{
      width: 35%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px 0 0;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .sales-boxes .top-sales li{
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 10px 0;
    }
    .sales-boxes .top-sales li a img{
      height: 40px;
      width: 40px;
      object-fit: cover;
      border-radius: 12px;
      margin-right: 10px;
      background: #333;
    }
    .sales-boxes .top-sales li a{
      display: flex;
      align-items: center;
      text-decoration: none;
    }
    .sales-boxes .top-sales li .product,
    .price{
      font-size: 17px;
      font-weight: 400;
      color: #333;
    }
    /* Responsive Media Query */
    @media (max-width: 1240px) {
      .sidebar{
        width: 60px;
      }
      .sidebar.active{
        width: 220px;
      }
      .home-section{
        width: calc(100% - 60px);
        left: 60px;
      }
      .sidebar.active ~ .home-section{
        /* width: calc(100% - 220px); */
        overflow: hidden;
        left: 220px;
      }
      .home-section nav{
        width: calc(100% - 60px);
        left: 60px;
      }
      .sidebar.active ~ .home-section nav{
        width: calc(100% - 220px);
        left: 220px;
      }
    }
    @media (max-width: 1150px) {
      .home-content .sales-boxes{
        flex-direction: column;
      }
      .home-content .sales-boxes .box{
        width: 100%;
        overflow-x: scroll;
        margin-bottom: 30px;
      }
      .home-content .sales-boxes .top-sales{
        margin: 0;
      }
    }
    @media (max-width: 1000px) {
      .overview-boxes .box{
        width: calc(100% / 2 - 15px);
        margin-bottom: 15px;
      }
    }
    @media (max-width: 700px) {
      nav .sidebar-button .dashboard,
      nav .profile-details .admin_name,
      nav .profile-details i{
        display: none;
      }
      .home-section nav .profile-details{
        height: 50px;
        min-width: 40px;
      }
      .home-content .sales-boxes .sales-details{
        width: 560px;
      }
    }
    @media (max-width: 550px) {
      .overview-boxes .box{
        width: 100%;
        margin-bottom: 15px;
      }
      .sidebar.active ~ .home-section nav .profile-details{
        display: none;
      }
    }
      @media (max-width: 400px) {
      .sidebar{
        width: 0;
      }
      .sidebar.active{
        width: 60px;
      }
      .home-section{
        width: 100%;
        left: 0;
      }
      .sidebar.active ~ .home-section{
        left: 60px;
        width: calc(100% - 60px);
      }
      .home-section nav{
        width: 100%;
        left: 0;
      }
      .sidebar.active ~ .home-section nav{
        left: 60px;
        width: calc(100% - 60px);
      }
    }
    .table-bordered {
      border: 1px solid #dee2e6;
      text-align: center;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
      border-bottom-width: 2px;
    }
    .table-responsive {
        width: 100%;
    }
    .table-responsive table{
        width: 100%;
    }
  </style>

</body>
@stop