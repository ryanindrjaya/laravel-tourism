<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('../css/vendors.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Page | Dolan Salatiga</title>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
      <span class="logo_name">Dolan Salatiga</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="/admin" class="{{ $type=="" ? 'active' : '' }}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{URL::to('/admin')}}?type=cat" class="{{ $type=="cat" ? 'active' : '' }} {{ $type=="subcat" ? 'active' : '' }}">
            <i class='bx bx-category-alt' ></i>
            <span class="links_name">Kategori & Sub</span>
          </a>
        </li>
        <li>
        <a href="{{URL::to('/admin')}}?type=temp" class="{{ $type=="temp" ? 'active' : '' }}">
            <i class='bx bx-map-alt' ></i>
            <span class="links_name">Tempat</span>
          </a>
        </li>
        <li>
          <a href="{{URL::to('/admin')}}?type=rev" class="{{ $type=="rev" ? 'active' : '' }}">
            <i class='bx bx-message-dots' ></i>
            <span class="links_name">Review</span>
          </a>
        </li>
        <li>
            <a href="{{URL::to('/admin')}}?type=head" class="{{ $type=="head" ? 'active' : '' }}">
            <i class='bx bx-home' ></i>
            <span class="links_name">Headline</span>
          </a>
        </li>
        <li>
        <a href="{{URL::to('/admin')}}?type=aca" class="{{ $type=="aca" ? 'active' : '' }}">
            <i class='bx bx-calendar-event' ></i>
            <span class="links_name">Acara</span>
          </a>
        </li>
        <li>
        <a href="{{URL::to('/admin')}}?type=user" class="{{ $type=="user" ? 'active' : '' }}">
            <i class='bx bx-group' ></i>
            <span class="links_name">Users & Admin</span>
          </a>
        </li>
        <li class="log_out">
          <a href="/actionlogout">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">
            {{ $type==''? 'Dashboard':''}}
            {{$type=='cat'?'Kategori & Sub':''}}
            {{$type=='subcat'?'Kategori & Sub':''}}
            {{$type=='temp'?'Tempat':''}}
            {{$type=='rev'?'Review':''}}
            {{$type=='head'?'Headline':''}}
            {{$type=='aca'?'Acara':''}}
            {{$type=='user'?'User & Admin':''}}
        </span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
    </nav>

    
    @if($type == "cat")
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">
            Edit Kategori
          </div>
          <div class="sales-details">
          <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')    
                @csrf
                    <div class="form-group">
                        <label for="tName">Nama:</label>
                        <input type="text" class="form-control" id="tName" placeholder="Masukkan Nama" name="tName" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="tDesc">Gambar Utama:</label> <br>
                        <img src="{{URL::to('/')}}/img/category/{{$category->image}}" style="width: 250px;height:250px;object-fit: contain;" alt="">
                        <input type="file" class="form-control" id="image" placeholder="Masukkan File" name="image">
                        <label for="" style="color:red;font-style:italic;">*Gambar utama yang akan muncul pada halaman utama</label>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon Kategori:</label><br>
                        @for($a = 1; $a < 101; $a++)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_1_icon-{{$a}}" name="icon" value="icon_set_1_icon-{{$a}}"
                            {{ $category->icon == 'icon_set_1_icon-'.$a ? 'checked' : '' }}>
                            <label class="form-check-label" for="icon_set_1_icon-{{$a}}">
                                <i class="icon_set_1_icon-{{$a}}" style="zoom:2.5;"></i>
                            </label>
                        </div>
                        @endfor
                        @for($a = 102; $a < 118; $a++)
                        @if($a != 113)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_2_icon-{{$a}}" name="icon" value="icon_set_2_icon-{{$a}}"
                            {{ $category->icon == 'icon_set_2_icon-'.$a ? 'checked' : '' }}>
                            <label class="form-check-label" for="icon_set_2_icon-{{$a}}">
                                <i class="icon_set_2_icon-{{$a}}" style="zoom:2.5;"></i>
                            </label>
                        </div>
                        @endif
                        @endfor
                        @for($a = 1; $a < 12; $a++)
                        <div class="form-group form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="icon_set_3_restaurant-{{$a}}" name="icon" value="icon_set_3_restaurant-{{$a}}"
                            {{ $category->icon == 'icon_set_3_restaurant-'.$a ? 'checked' : '' }}>
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
        </div>
      </div>
    </div>
    @endif
    @if($type == "subcat")
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">
            Tambah SubKategori
          </div>
          <div class="sales-details">
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
        </div>
      </div>
    </div>
    @endif
    @if($type == "temp")
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Tempat</div>
            <div class="sales-details">
              <form action="{{ route('tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
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
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                            <!-- <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet"> -->
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                            <link href="{{ asset('../css/style.css') }}" rel="stylesheet">
                            <link href="{{ asset('../css/vendors.css') }}" rel="stylesheet">
                            <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
                            @foreach($image as $t)
                            <tr class="text-center table-bordered">
                                <td>
                                    <input type="text" name="old[]" value="{{$t->image}}" style="visibility: hidden;width: 5px;height: 1px;" class="form-control">
                                    <img src="{{URL::to('/')}}/img/tempat/{{$t->image}}" style="max-width:100px; max-height:100px" alt=""></td>
                                <td>{{ $t->desc }}</td>
                                <td>
                                <!--<form action="{{route('images.destroy',$t->id)}}" method="POST">-->
                                    
                                            <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview" onclick="return setValue({{$t}});">
                                                <i class="icon_set_1_icon-17"></i>
                                            </a>
                                            <script>
                                                function setValue(id){
                                                    console.log(id)
                                                    $('#desc_img').attr('value', id.desc);
                                                    $('#id_image').attr('value', id.id);
                                                    // $('#img').attr('src', 'https://salatigatourism.com/img/tempat/'+id.image);
                                                    $('#img').attr('src', '{{URL::to("/")}}/img/tempat/'+id.image);
                                                }
                                            </script>

                                            <input type="hidden" id="idDelete" name="idDelete" value="{{$t->id}}" style="visibility:hidden;width:0px;height:0px">
                                                <!-- <button type="submit" class="btn btn-danger" onclick="return myFunctiona();"> -->
                                                <!--  <a href="/hapus?idDelete={{$t->id}}">-->
                                                <!--  <button type="submit" class="btn btn-danger">-->
                                                <!--    <i class="icon_set_1_icon-67"></i>-->
                                                <!--</button>                              -->
                                                <!--  </a>-->
                                                          
                                                                                                 
                                             <a class="btn btn-danger" onclick="return myFunction();" href="/hapus?idDelete={{$t->id}}"><i class="icon_set_1_icon-67"></i></a> 
                                            <script>
                                            function myFunctiona() {
                                                if(!confirm("Anda yakin akan menghapus gambar ini?"))
                                                event.preventDefault();
                                            }
                                            </script>
                                   <!--</form> -->
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
        </div>
      </div>
    </div>
    @endif
    @if($type == "rev")
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Review</div>
            <div class="sales-details">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="table-bordered">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat</th>
                            <th>Pesan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($review as $rev)
                        <tr class="table-bordered">
                            <td class="td-bordered col-md-2">{{ $rev->name }}</td>
                            <td class="td-bordered col-md-2">{{ $rev->email }}</td>
                            <td class="td-bordered col-md-2">{{ $rev->idTempat }}</td>
                            <td class="td-bordered col-md-3">
                                <p>
                                    {{ $rev->message }} asdalsdkj asda sd asd asd asd asda sd asdasd asdasd asdas dasd asda sd
                                </p>
                            </td>
                            <td class="td-bordered col-md-2">
                                {{ $rev->vote }}
                            </td>
                            <td class="td-bordered col-md-1" style="text-align: center;">
                                
                                    <!-- <button>
                                    <a class="btn" href="{{ route('review.edit',$rev->id) }}"><i class="bx bx-edit"></i></a>
                                    </button> -->
                                    <form action="{{route('review.destroy', $rev->id)}}" method="POST">    
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return myFunctionr();">
                                            <i class="bx bx-trash"></i>
                                        </button>                                        
                                    </button>                                        
                                        </button>                                        
                                    </form>
                                    <script>
                                    function myFunctionr() {
                                        if(!confirm("Anda yakin akan menghapus tempat ini?"))
                                        event.preventDefault();
                                    }
                                    </script>
                                
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $review->total() }} 
                                {{ $review->links('pages.pagination.custom') }}
                            </td>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>
      </div>
    </div>
    @endif
    @if($type == "head")
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Headline</div>
            <div class="sales-details">
                <form action="{{ route('headline.update', $headline->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')    
                    @csrf
                    <div class="form-group">
                        <label for="tName">Title:</label>
                        <input type="text" class="form-control" id="tTitle" placeholder="Masukkan Judul" name="tTitle" value="{{$headline->title}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">SubTitle:</label>
                        <input type="text" class="form-control" id="tSubTitle" placeholder="Masukkan SubJudul" name="tSubTitle" value="{{$headline->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="tName">Alignment:</label>
                        <select name="alignment" id="alignment" class="form-control select2">
                            <option value ="text-right" {{ $headline->alignment == 'text-right' ? 'selected' :'' }}> Rata Kanan</option>
                            <option value ="text-center" {{ $headline->alignment == 'text-center' ? 'selected' :'' }}> Rata Tengah</option>
                            <option value ="text-left" {{ $headline->alignment == 'text-left' ? 'selected' :'' }}> Rata Kiri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto: </label>
                        <br>
                        <img src="{{URL::to('/')}}/img/headline/{{$headline->image}}" alt="" style="max-height:300px;min-height:300px;">
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename" class="form-control" value="{{$headline->image}}">
                        </div>
                        <br>
                        <label for="" style="color:red;font-style:italic;">*Disarankan menggunakan foto landscape dengan resolusi cukup baik</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    @endif
    @if($type == "aca")
    <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Edit Acara</div>
            <div class="sales-details">
                <div class="table-responsive">
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
                        <br>
                        <img src="{{URL::to('/')}}/img/acara/{{$acara->image}}" alt="" style="max-height:200px;min-height:200px;">
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename" class="form-control" value="{{$acara->image}}">
                        </div>
                        <!-- <div class="input-group control-group increment" >
                          <img src="{{URL::to('/')}}/img/acara/{{$acara->image}}" alt="">
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
                        </div>-->
                        <!-- <label for="" style="color:red;font-style:italic;">*Foto urutan pertama akan menjadi foto utama</label> -->
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
            </div>
        </div>
      </div>
    </div>
    @endif
    @if($type == "user")
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar User & Admin</div>
            <div class="sales-details">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="table-bordered">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Super Admin</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($users as $user)
                        @if(auth()->user()->id != $user->id)
                        <tr class="table-bordered">
                            <td class="td-bordered col-md-2">{{ $user->name }}</td>
                            <td class="td-bordered col-md-1">{{ $user->email }}</td>
                            <td class="td-bordered col-md-2">
                                {{ $user->isAdmin == '1' ? 'Ya' : 'Tidak' }}
                            </td>
                            <td class="td-bordered col-md-2">
                            {{ $user->isSuperAdmin == '1' ? 'Ya' : 'Tidak' }}
                            </td>
                            <td class="td-bordered col-md-1" style="text-align: center;">
                              @if(auth()->user()->isAdmin == 1)
                                <a {{ $user->isAdmin == 1 ? 'href=/setnonadmin?id='.$user->id : 'href=/setadmin?id='.$user->id }} >
                                  <button class="btn btn-primary">
                                    {{ $user->isAdmin ? 'Hilangkan Akses' : 'Jadikan' }} Admin
                                  </button>
                                </a>
                              @endif
                              @if(auth()->user()->isAdmin != 1)
                                <button class="btn btn-primary" disabled="disabled">
                                  Jadikan Admin
                                </button>
                              @endif
                              @if(auth()->user()->isSuperAdmin == 1)
                              <hr>
                                <a {{ $user->isSuperAdmin == 1 ? 'href=/setnonsuperadmin?id='.$user->id : 'href=/setsuperadmin?id='.$user->id }} >
                                  <button class="btn btn-primary">
                                  {{ $user->isSuperAdmin ? 'Hilangkan Akses' : 'Jadikan' }} Super Admin
                                  </button>
                                </a>
                              @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $users->total() }} 
                                {{ $users->links('pages.pagination.custom') }}
                            </td>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>
      </div>
    </div>
    @endif
  </section>

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
                '<option value ="BUGEL"> BUGEL</option>' +
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
      background: linear-gradient(45deg, black, #00c0f9);
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
      background: #009fce;
    }
    .sidebar .nav-links li a:hover{
      background: #009fce;
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
      position: relative;
      background: #f5f5f5;
      min-height: 100vh;
      width: calc(100% - 240px);
      left: 240px;
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
    }
    .home-content .overview-boxes{
      display: flex;
      align-items: center;
      justify-content: space-between;
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
      display: flex;
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
      background: #00c0f9;
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
 @if($type == "temp")
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
                    <form action="{{ route('imageUpdate') }}" method="POST" enctype="multipart/form-data">
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
                                <img src="" id="img" alt="" style="max-width: 450px;height: auto;">
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                            <input name="new_image" id="new_image" type="file" placeholder="id" class="form-control">
                            <input name="id_image" id="id_image" type="hidden" placeholder="id" class="form-control" >
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
  @endif
</body>
</html>

