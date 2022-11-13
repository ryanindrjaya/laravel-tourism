

@extends('layouts.app')
@section('title')
<title>Admin Page | Ubah Kategori</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
            <p>Ubah Kategori</p>
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
                        <h2>Ubah Kategori</h2>
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
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</main>
<!-- End main -->
@endsection
@section('footer-scripts')

@endsection