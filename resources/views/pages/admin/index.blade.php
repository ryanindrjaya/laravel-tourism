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
          <a href="admin?type=cat" class="{{ $type=="cat" ? 'active' : '' }}">
            <i class='bx bx-category-alt' ></i>
            <span class="links_name">Kategori & Sub</span>
          </a>
        </li>
        <li>
        <a href="admin?type=temp" class="{{ $type=="temp" ? 'active' : '' }}">
            <i class='bx bx-map-alt' ></i>
            <span class="links_name">Tempat</span>
          </a>
        </li>
        <li>
          <a href="admin?type=rev" class="{{ $type=="rev" ? 'active' : '' }}">
            <i class='bx bx-message-dots' ></i>
            <span class="links_name">Review</span>
          </a>
        </li>
        <li>
            <a href="admin?type=head" class="{{ $type=="head" ? 'active' : '' }}">
            <i class='bx bx-home' ></i>
            <span class="links_name">Headline</span>
          </a>
        </li>
        <li>
        <a href="admin?type=aca" class="{{ $type=="aca" ? 'active' : '' }}">
            <i class='bx bx-calendar-event' ></i>
            <span class="links_name">Acara</span>
          </a>
        </li>
        <li>
        <a href="admin?type=user" class="{{ $type=="user" ? 'active' : '' }}">
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

    @if($type == "")
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <span class="text">Total:</span>
            </div>
            <div class="number">{{ $tempat->total() }}</div>
            <div class="box-topic">Tempat</div>
          </div>
          <i class='bx bx-map cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <span class="text">Total:</span>
            </div>
            <div class="number">{{ $category->total() }} + {{ count($subcategory) }} </div>
            <div class="box-topic">Kategori & Sub</div>
          </div>
          <i class='bx bx-category-alt cart two'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <span class="text">Total:</span>
            </div>
            <div class="number">{{ $review->total() }}</div>
            <div class="box-topic">Review</div>
          </div>
          <i class='bx bx-message-dots cart three'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <span class="text">Total:</span>
            </div>
            <div class="number">{{ $acara->total() }}</div>
            <div class="box-topic">Acara</div>
          </div>
          <i class='bx bx-calendar-event cart four'></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Daftar Tempat</div>
          <div class="sales-details">
          <div class="table-responsive">
            <table class="table">
                    <tr class="table-bordered">
                        <th>Nama</th>
                        <th>Gambar Utama</th>
                        <th>Ticket</th>
                        <th>Tags</th>
                        <th>Operasional</th>
                        <!--<th>Aksi</th>-->
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($tempat as $temp)
                    <tr class="table-bordered">
                        <td class="td-bordered col-md-2">{{ $temp->name }}</td>
                        <td class="col-md-1">
                            <a href="{{URL::to('/')}}/img/tempat/{{$temp->image}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{URL::to('/')}}/img/tempat/{{$temp->image}}"
                            style="max-width:70px;max-height:70px;" alt="{{$temp->image}}">
                            </a>
                        </td>
                        <td class="td-bordered col-md-1">
                            Rp {{strrev(chunk_split(strrev($temp->ticket), 3, '.'))}}
                        </td>
                        <td class="td-bordered col-md-2">
                            {{ $temp->tags }}
                        </td>
                        <td class="td-bordered col-md-4">
                            <li>{{$temp->seninJumat}}</li>
                        </td>
                        <!--<td class="td-bordered col-md-1" style="text-align: center;">-->
                        <!--    <form action="{{ route('tempat.destroy',$temp->id) }}" method="POST">-->
                        <!--        <button>-->
                        <!--        <a class="btn btn-primary" href="{{ route('tempat.edit',$temp->id) }}"><i class="bx bx-edit"></i></a>-->
                        <!--        </button>-->
                        <!--        <form action="{{route('tempat.destroy', $temp->id)}}" method="POST">    -->
                        <!--        @method('DELETE')-->
                        <!--        @csrf-->
                        <!--            <button type="submit" class="btn btn-danger" onclick="return myFunctionr();">-->
                        <!--                <i class="bx bx-trash"></i>-->
                        <!--            </button>                                        -->
                        <!--        </button>                                        -->
                        <!--            </button>                                        -->
                        <!--        </form>-->
                        <!--        <script>-->
                        <!--        function myFunctionr() {-->
                        <!--            if(!confirm("Anda yakin akan menghapus tempat ini?"))-->
                        <!--            event.preventDefault();-->
                        <!--        }-->
                        <!--        </script>-->
                        <!--    </form>-->
                        <!--</td>-->
                    </tr>
                    @endforeach
                    <!--<tr>-->
                    <!--    <td colspan="10" class="punyaku">-->
                    <!--        Jumlah Data : {{ $tempat->total() }} -->
                    <!--        {{$tempat->appends(['category' => $category->currentPage()])->links("pagination::bootstrap-4")}}-->
                            <!-- {{ $category->links("pagination::bootstrap-4") }} -->
                    <!--    </td>-->
                    <!--</tr>-->
                </table>
            </div>
          </div>
          <div class="button">
            <a href="/admin?type=temp">Lihat Semua</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Daftar Acara</div>
          <ul class="top-sales-details">
              <li>
                  <span class="product">Nama Acara</span>
                  <span class="price">Mulai</span>
                  <span class="price">Akhir</span>
                </li>
              @foreach($acara as $aca)
              <li>
                  <a href="#">
                      <span class="product">{{ $aca->name }}</span>
                    </a>
                    <span class="price">{{ $aca->start }}</span>
                    <span class="price">{{ $aca->end }}</span>
                </li>
                @endforeach
          </ul>
          <div class="button">
            <a href="/admin?type=aca">Lihat Semua</a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if($type == "cat")
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">
            Daftar Kategori
          </div>
          <a href="admin/create?type=cat" class="btn btn-primary" style="font-size: 12px;color: white;margin-bottom: 10px;">
              Tambah Kategori
          </a>
          <div class="sales-details">
          <div class="table-responsive">
            <table class="table">
                    <tr class="table-bordered">
                        <th>Nama</th>
                        <th>Gambar Utama</th>
                        <th>Icon</th>
                        <th>Sub</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($category as $cat)
                    <tr class="table-bordered">
                        <td class="td-bordered col-md-2">{{ $cat->name }}</td>
                        <td class="col-md-1">
                            <a href="{{URL::to('/')}}/img/tempat/{{$cat->image}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{URL::to('/')}}/img/tempat/{{$cat->image}}"
                            style="max-width:70px;max-height:70px;" alt="{{$cat->image}}">
                            </a>
                        </td>
                        <td class="td-bordered col-md-4">
                            <i class="{{$cat->icon}}" style="zoom:2;"></i> {{$cat->icon}}</td>
                        </td>
                        <td class="td-bordered col-md-4">
                            @foreach($subcategory as $subcat)
                                @if($cat->id == $subcat->category)
                                <!-- <form action="{{route('subcategory.destroy', $subcat->id)}}" method="POST">     -->
                                @method('DELETE')
                                @csrf
                                <li>
                                   <a href="admin/edit?type=subcat&cat={{$cat->id}}&id={{$subcat->id}}">
                                   <!-- <a href="admin/edit"> -->
                                     <i class="{{$subcat->icon}}" style="zoom:1.5;"></i> {{$subcat->name}}  
                                   </a>
                                    <!-- <a class="btn btn-primary" href="{{ route('subcategory.edit',$subcat->id) }}">
                                        <i class="icon_set_1_icon-17"></i>
                                    </a>  |  
                                
                                    <button type="submit" class="btn btn-danger" onclick="return myFunction1();">
                                        <i class="icon_set_1_icon-67"></i>
                                    </button>                             
                                    <script>
                                        function myFunction1() {
                                    if(!confirm("Anda yakin akan menghapus sub kategori ini?"))
                                    event.preventDefault();
                                }
                                    </script>            -->
                                
                                </li>
                                <!-- </form> -->
                                @endif
                            @endforeach
                            <li>
                                <a href="admin/create?type=subcat&cat={{$cat->id}}" class="btn btn-primary" style="font-size: 12px;color: white;">
                                    Tambah SubKategori
                                </a>
                            </li>
                        </td>
                        <td class="td-bordered col-md-1" style="text-align: center;">
                            <!-- <form action="{{ route('category.destroy',$cat->id) }}" method="POST"> -->
                                <button>
                                <a class="btn btn-primary" href="/admin/edit?type=cat&id={{$cat->id}}"><i class="bx bx-edit"></i></a>
                                </button>
                                <form action="{{route('category.destroy', $cat->id)}}" method="POST">    
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
                            <!-- </form> -->
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="10" class="punyaku">
                            Jumlah Data : {{ $category->total() }} 
                            <!-- {{$category->appends(['category' => $category->currentPage()])->links("pagination::bootstrap-4")}} -->
                            {{ $category->links('pages.pagination.custom') }}
                            <!-- {{ $category->links("pagination::bootstrap-4") }} -->
                        </td>
                    </tr>
                </table>
            </div>
          </div>
          <!-- <div class="button">
            <a href="/admin?type=temp">Lihat Semua</a>
          </div> -->
        </div>
      </div>
    </div>
    @endif
    @if($type == "temp")
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Tempat</div>
            <a href="admin/create?type=temp" class="btn btn-primary" style="font-size: 12px;color: white;margin-bottom: 10px;">
                Tambah Tempat
            </a>
            <div class="sales-details">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="table-bordered">
                            <th>Nama</th>
                            <th>Gambar Utama</th>
                            <th>Ticket</th>
                            <th>Tags</th>
                            <th>Operasional</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($tempat as $temp)
                        <tr class="table-bordered">
                            <td class="td-bordered col-md-2">{{ $temp->name }}</td>
                            <td class="col-md-1">
                                <a href="{{URL::to('/')}}/img/tempat/{{$temp->image}}" target="_blank" rel="noopener noreferrer">
                                <img src="{{URL::to('/')}}/img/tempat/{{$temp->image}}"
                                style="max-width:70px;max-height:70px;" alt="{{$temp->image}}">
                                </a>
                            </td>
                            <td class="td-bordered col-md-1">
                                Rp {{strrev(chunk_split(strrev($temp->ticket), 3, '.'))}}
                            </td>
                            <td class="td-bordered col-md-2">
                                {{ $temp->tags }}
                            </td>
                            <td class="td-bordered col-md-4">
                                <li>{{$temp->seninJumat}}</li>
                            </td>
                            <td class="td-bordered col-md-1" style="text-align: center;">
                                <!-- <form action="{{ route('tempat.destroy',$temp->id) }}" method="POST"> -->
                                    <!-- <button> -->
                                    <a class="btn btn-primary" href="/admin/edit?type=temp&id={{$temp->id}}"><i class="bx bx-edit"></i></a>
                                    <!-- </button> -->
                                    <form action="{{route('tempat.destroy', $temp->id)}}" method="POST">    
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
                                <!-- </form> -->
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $tempat->total() }} 
                                {{ $tempat->links('pages.pagination.custom') }}
                            </td>
                        </tr>
                    </table>  
                </div>
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
                            
                            <td class="td-bordered col-md-2">
                                @foreach($all as $a)
                                @if($a->id == $rev->idTempat)
                                {{ $a->name }}
                                @endif
                                @endforeach
                            </td>

                            
                            <td class="td-bordered col-md-3">
                                <p>
                                    {{ $rev->message }}
                                </p>
                            </td>
                            <td class="td-bordered col-md-2">
                                {{ $rev->vote }}
                            </td>
                            <td class="td-bordered col-md-1" style="text-align: center;">
                                <!-- <form action="{{ route('tempat.destroy',$rev->id) }}" method="POST"> -->
                                    <!-- <button>
                                    <a class="btn" href="{{ route('review.edit',$rev->id) }}"><i class="bx bx-edit"></i></a>
                                    </button> -->
                                    <form action="{{route('review.destroy', $rev->id)}}" method="POST">    
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return myFunctionra();">
                                            <i class="bx bx-trash"></i>
                                        </button>                                        
                                    </button>                                        
                                        </button>                                        
                                    </form>
                                    <script>
                                    function myFunctionra() {
                                        if(!confirm("Anda yakin akan menghapus Review ini?"))
                                        event.preventDefault();
                                    }
                                    </script>
                                <!-- </form> -->
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
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Headline</div>
          <a href="/admin/create?type=head" class="btn btn-primary" style="font-size: 12px;color: white;margin-bottom: 10px;">
                Tambah Headline
            </a>
            <div class="sales-details">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="table-bordered">
                            <th>Title</th>
                            <th>Gambar Utama</th>
                            <th>Subtitle</th>
                            <th>Alignment</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($headline as $head)
                        <tr class="table-bordered">
                            <td class="td-bordered col-md-2">{{ $head->title }}</td>
                            <td class="td-bordered col-md-2">
                                <a href="{{URL::to('/')}}/img/headline/{{$head->image}}" target="_blank" rel="noopener noreferrer">
                                <img src="{{URL::to('/')}}/img/headline/{{$head->image}}"
                                style="max-width:70px;max-height:70px;" alt="{{$head->image}}">
                                </a>
                            </td>
                            <td class="td-bordered col-md-1">{{ $head->subtitle }}</td>
                            <td class="td-bordered col-md-2">
                                {{ $head->alignment }}
                            </td>
                            <td class="td-bordered col-md-1" style="text-align: center;">
                                <!-- <form action="{{ route('tempat.destroy',$head->id) }}" method="POST"> -->
                                  <a class="btn btn-primary" href="/admin/edit?type=head&id={{$head->id}}"><i class="bx bx-edit"></i></a>
                                    <!-- <button>
                                    <a class="btn" href="/admin/edit?type=head&id={{ $head->id }}"><i class="bx bx-edit"></i></a>
                                    </button> -->
                                    <form action="{{route('headline.destroy', $head->id)}}" method="POST">    
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction1();">
                                            <i class="bx bx-trash"></i>
                                        </button>                                        
                                    </button>                                        
                                        </button>                                        
                                    </form>
                                    <script>
                                    function myFunction1() {
                                        if(!confirm("Anda yakin akan menghapus headline ini?"))
                                        event.preventDefault();
                                    }
                                    </script>
                                <!-- </form> -->
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $headline->total() }} 
                                {{ $headline->links('pages.pagination.custom') }}
                            </td>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>
      </div>
    </div>
    @endif
    @if($type == "aca")
    <div class="home-content">
      <div class="sales-boxes" style="width:100%;">
        <div class="recent-sales box" style="width:100%;">
          <div class="title">Daftar Acara</div>
          <a href="/admin/create?type=aca" class="btn btn-primary" style="font-size: 12px;color: white;margin-bottom: 10px;">
                Tambah Acara
            </a>
            <div class="sales-details">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="table-bordered">
                            <th>Nama</th>
                            <th>Gambar Utama</th>
                            <th>Ticket</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <!-- <th>Tags</th> -->
                            <th>Aksi</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($acara as $aca)
                        <tr class="table-bordered">
                            <td class="td-bordered col-md-2">{{ $aca->name }}</td>
                            <td class="td-bordered col-md-2">
                                <a href="{{URL::to('/')}}/img/acara/{{$aca->image}}" target="_blank" rel="noopener noreferrer">
                                <img src="{{URL::to('/')}}/img/acara/{{$aca->image}}"
                                style="max-width:70px;max-height:70px;" alt="{{$aca->image}}">
                                </a>
                            </td>
                            <td class="td-bordered col-md-1">{{ $aca->ticket }}</td>
                            <td class="td-bordered col-md-2">
                                {{ $aca->start }}
                            </td>
                            <td class="td-bordered col-md-2">
                                {{ $aca->end }}
                            </td>
                            <!-- <td class="td-bordered col-md-2">
                                {{ $aca->tags }}
                            </td> -->
                            <td class="td-bordered col-md-1" style="text-align: center;">
                                <!-- <form action="{{ route('tempat.destroy',$aca->id) }}" method="POST"> -->
                                    <button>
                                    <a class="btn" href="/admin/edit?type=aca&id={{ $aca->id }}"><i class="bx bx-edit"></i></a>
                                    </button>
                                    <form action="{{route('acara.destroy', $aca->id)}}" method="POST">    
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction1();">
                                            <i class="bx bx-trash"></i>
                                        </button>                                        
                                    </button>                                        
                                        </button>                                        
                                    </form>
                                    <script>
                                    function myFunction1() {
                                        if(!confirm("Anda yakin akan menghapus acara ini?"))
                                        event.preventDefault();
                                    }
                                    </script>
                                <!-- </form> -->
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10" class="punyaku">
                                Jumlah Data : {{ $acara->total() }} 
                                {{ $acara->links('pages.pagination.custom') }}
                            </td>
                        </tr>
                    </table>  
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

</body>
</html>

