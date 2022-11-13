@extends('layouts.app')
@section('title')
<title>Admin Page | Home</title>
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Admin Page</h1>
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
                <div class="table-responsive">
                    <table class="table">
                        <tr class="text-center table-bordered">
                            <th colspan="7">Daftar Kuliner</th>
                            <th>
                            <a class="btn btn-primary" href="{{ url('kuliner/create') }}"> <i class="icon_set_1_icon-11"></i></a>
                            </th>
                        </tr>
                        <tr class="table-bordered">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>Operasional</th>
                            <th>Tags/Kategori</th>
                            <th width="280px">Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($kuliner as $des)
                        <tr class="table-bordered">
                            <td class="td-bordered">{{ ++$i }}</td>
                            <td class="td-bordered col-md-1">{{ $des->name }}</td>
                            <td class="td-bordered col-md-3">{{ $des->desc }}</td>
                            <td class="td-bordered col-md-1">
                            <!-- <img style="width: 30px;height: 30px;" src="{{ asset('images/icon/logo-whatsapp.svg') }}" alt=""> -->
                            <?php
                            $temp = str_replace("[","",$des->imageArray);
                            $temp = str_replace('"','',$temp);
                            $temp = str_replace("]","",$temp);
                            ?>
                            @foreach(explode(',',$temp) as $t)
                            <img src="{{URL::to('/')}}/img/kuliner/{{$t}}"
                                style="max-width:70px;max-height:70px;" alt="{{$t}}">
                            @endforeach    
                            </td>
                            <td class="td-bordered col-md-2">{{ $des->address }}</td>
                            <td class="td-bordered col-md-3">
                                <li>Sen-Jum : {{$des->seninJumat}}</li>
                                <li>Sab-Min : {{$des->sabtuMinggu}}</li>
                                <hr>
                                <li>Ramah Disabilitas : {{ $des->disabilitas == '1' ? 'Tersedia' : 'Tidak' }}</li>
                                <li>Parkir Tersedia : {{ $des->parkiran == '1' ? 'Tersedia' : 'Tidak' }}</li>
                                <li>Wifi Publik : {{ $des->wifi == '1' ? 'Tersedia' : 'Tidak' }}</li>
                            </td>
                            <td class="td-bordered col-md-1">
                            <?php
                            $temp = str_replace("[","",$des->tags);
                            $temp = str_replace('"','',$temp);
                            $temp = str_replace("]","",$temp);
                            ?>
                            @foreach(explode(',',$temp) as $img)
                            <li>{{$img}}</li>
                            @endforeach
                            </td>
                            <td class="td-bordered col-md-3" style="text-align: center;">
                                <form action="{{ route('kuliner.destroy',$des->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('kuliner.show',$des->id) }}"><i class="icon_set_1_icon-79"></i></a> <br>
                                    <a class="btn btn-primary" href="{{ route('kuliner.edit',$des->id) }}"><i class="icon_set_1_icon-17"></i></a> <br>
                                    <form action="{{route('kuliner.destroy', $des->id)}}" method="POST">    
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction();">
                                            <i class="icon_set_1_icon-67">
                                        </button>                                        
                                    </form>
                                    <!-- <a class="btn btn-danger" onclick="return myFunction();" href=""><i class="icon_set_1_icon-67"></i></a> -->
                                    <script>
                                    function myFunction() {
                                        if(!confirm("Anda yakin akan menghapus?"))
                                        event.preventDefault();
                                    }
                                    </script>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $kuliner->total() }} <br>
                                {{ $kuliner->links("pagination::bootstrap-4") }}
                            </td>
                        </tr>
                    </table>
                    
                    
                </div>
            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</main>
<!-- End main -->
@endsection
@section('additionalHead')

@endsection