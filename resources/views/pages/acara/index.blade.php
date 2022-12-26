@extends('layouts.app')
@section('title')
  <title>Acara</title>
@endsection
@section('content')

  <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400"
    data-natural-height="470">
    <div class="parallax-content-1">
      <div class="animated fadeInDown">
        <h1>Daftar Acara</h1>
        <p>Jelajahi berbagai acara di Kota Salatiga.</p>
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
          <li>Acara</li>
        </ul>
      </div>
    </div>
    <!-- Position -->

    <div class="collapse" id="collapseMap">
      <div id="map" class="map"></div>
    </div>
    <!-- End Map -->

    <div class="container margin_60">

      <div class="row">
        <!-- <aside class="col-lg-4"> -->
        <!-- <p>
        <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
       </p> -->

        <!-- <div class="box_style_cat">
        <ul id="cat_nav">
         @foreach ($acaras as $a)
  <li>
          <a href="javascript:void(0)" id="active"><i class="icon_set_1_icon-53"></i> {{ $a->name }}
          </a>
          <ul>
           <li>Alamat: {{ $a->desa }} {{ $a->kecamatan }}</li>
           <li>Tanggal Mulai: {{ $a->start }}</li>
           <li>Tanggal Selesai: {{ $a->end }}</li>
           <a href="{{ $a->mapUrl }}" target="_blank" rel="noopener noreferrer">Buka lokasi dimap</a>
          </ul>

         </li>
  @endforeach
         @if (count($acaras) == 0)
  Belum ada acara pada bulan ini
  @endif
        </ul>
       </div> -->

        <!-- <div id="filters_col">
        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
        <div class="collapse show" id="collapseFilters">
         <div class="filter_type">
          <h6>Price</h6>
          <input type="text" id="range" name="range" value="">
         </div>
         <div class="filter_type">
          <h6>Rating</h6>
          <ul>
           <li>
            <label>
             <input type="checkbox"><span class="rating">
             <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
             </span>
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox"><span class="rating">
             <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
             </span>
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox"><span class="rating">
             <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
             </span>
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox"><span class="rating">
             <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
             </span>
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox"><span class="rating">
             <i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
             </span>
            </label>
           </li>
          </ul>
         </div>
         <div class="filter_type">
          <h6>Buka</h6>
          <ul>
           <li>
            <label>
             <input type="checkbox">Senin
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox">Groups allowed
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox">Tour guides
            </label>
           </li>
           <li>
            <label>
             <input type="checkbox">Access for disabled
            </label>
           </li>
          </ul>
         </div>
        </div>
       </div> -->
        <!--End filters col-->
        <!-- <div class="box_style_2">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
        <small>Monday to Friday 9.00am - 7.30pm</small>
       </div> -->
        <!-- </aside> -->
        <!--End aside -->
        <div class="col-lg-12">

          <!-- <div id="tools">
        <div class="row">
         <div class="col-md-3 col-sm-4 col-6">
          <div class="styled-select-filters">
           <select name="sort_price" id="sort_price">
            <option value="" selected>Sort by price</option>
            <option value="lower">Lowest price</option>
            <option value="higher">Highest price</option>
           </select>
          </div>
         </div>
         <div class="col-md-3 col-sm-4 col-6">
          <div class="styled-select-filters">
           <select name="sort_rating" id="sort_rating">
            <option value="" selected>Sort by ranking</option>
            <option value="lower">Lowest ranking</option>
            <option value="higher">Highest ranking</option>
           </select>
          </div>
         </div>
         <div class="col-md-6 col-sm-4 d-none d-sm-block text-right">
          <a href="all_tours_grid.html" class="bt_filters"><i class="icon-th"></i></a> <a href="#" class="bt_filters"><i class=" icon-list"></i></a>
         </div>

        </div>
       </div> -->
          <!--/tools -->
          <div id='calendar'></div>
          <!--End strip -->

          <hr>
          <!--
       <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
         <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
           <span aria-hidden="true">&laquo;</span>
           <span class="sr-only">Previous</span>
          </a>
         </li>
         <li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
         </li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
           <span aria-hidden="true">&raquo;</span>
           <span class="sr-only">Next</span>
          </a>
         </li>
        </ul>
       </nav> -->
          <!-- end pagination-->

        </div>
        <!-- End col lg-9 -->
      </div>
      <!-- End row -->
    </div>
    <!-- End container -->
  </main>
  <!-- End main -->
@stop
@section('footer-scripts')

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>

  <script>
    $(document).ready(function() {

      var SITEURL = "{{ url('/') }}";

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var items = Array('purple', 'red', 'blue', 'green');
      var calendar = $('#calendar').fullCalendar({
        editable: false,
        events: SITEURL + "/fullcalender",
        displayEventTime: false,
        editable: true,
        plugins: ['dayGrid'],
        eventColor: items[Math.floor(Math.random() * items.length)],
        eventTextColor: 'white',
        eventDidMount: function(info) {
          var tooltip = new Tooltip(info.el, {
            title: info.event.extendedProps.description,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
          });
        },
        eventRender: function(event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
          element.text(event.name);
        },
        selectable: true,
        selectHelper: true,
        // select: function (start, end, allDay) {
        //     var title = prompt('Event Title:');
        //     if (title) {
        //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
        //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
        //         $.ajax({
        //             url: SITEURL + "/fullcalenderAjax",
        //             data: {
        //                 title: nama,
        //                 start: start,
        //                 end: end,
        //                 type: 'add'
        //             },
        //             type: "POST",
        //             success: function (data) {
        //                 displayMessage("Event Created Successfully");

        //                 calendar.fullCalendar('renderEvent',
        //                     {
        //                         id: data.id,
        //                         title: title,
        //                         start: start,
        //                         end: end,
        //                         allDay: allDay
        //                     },true);

        //                 calendar.fullCalendar('unselect');
        //             }
        //         });
        //     }
        // },
        // eventDrop: function (event, delta) {
        //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
        //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

        //     $.ajax({
        //         url: SITEURL + '/fullcalenderAjax',
        //         data: {
        //             title: event.title,
        //             start: start,
        //             end: end,
        //             id: event.id,
        //             type: 'update'
        //         },
        //         type: "POST",
        //         success: function (response) {
        //             displayMessage("Event Updated Successfully");
        //         }
        //     });
        // },
        eventClick: function(event) {
          // var deleteMsg = confirm("Do you really want to delete?");
          jQuery.noConflict();

          $('#myReview').modal({
            show: true
          });
          console.log(event);
          $("h4.modal-title").text(event.name);
          $("#desc").text(event.desc);
          $("#address").text("Alamat: " + event.desa + " " + event.kecamatan);
          $("#tanggal").text("Tanggal Mulai: " + event.start._i);
          if (event.end) {
            $("#tanggal2").text("Tanggal Selesai: " + event.end._i);
          } else {
            $("#tanggal2").text("Tanggal Selesai: " + event.start._i);
          }
          $("#link").attr("href", event.mapurl);
          $("#url").attr("href", "{{ URL::to('/') }}/acara/" + event.id);
          $("#image").attr("src", "{{ URL::to('/') }}/img/acara/" + event.image);

          // if (deleteMsg) {
          //     $.ajax({
          //         type: "POST",
          //         url: SITEURL + '/fullcalenderAjax',
          //         data: {
          //                 id: event.id,
          //                 type: 'delete'
          //         },
          //         success: function (response) {
          //             calendar.fullCalendar('removeEvents', event.id);
          //             displayMessage("Event Deleted Successfully");
          //         }
          //     });
          // }
        }

      });

    });

    function displayMessage(message) {
      toastr.success(message, 'Event');
    }
  </script>
@endsection
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myReviewLabel">Tulis Review Anda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id="message-review">
          <img src="" id="image" alt=""
            style="width: 100%;max-height: 450px;object-fit: cover;">
          <br>
        </div>
        <form action="{{ route('review.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <ul>
                  <li id="address"></li>
                  <li id="desc"></li>
                  <li id="tanggal"></li>
                  <li id="tanggal2"></li>
                </ul>
                <!-- <a href="" id="link" target="_blank">Buka lokasi di maps</a> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="" id="url">Buka Lebih Detail</a>
              </div>
            </div>

          </div>
          <!-- End row -->
          <hr>
        </form>
      </div>
    </div>
  </div>
</div>
