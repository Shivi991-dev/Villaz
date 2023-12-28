@extends('master.website.master')
@section('content')
  
<style>
*,
*:before,
*:after {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.wrapper {
  position: relative;
  width: 85%;
  background-color: #ffffff;
  /* padding: 50px 40px 20px 40px; */
  border-radius: 10px;
}
.container {
  position: relative;
  /* width: 100%; */
  /* height: 100px; */
  margin-top: 30px;
}
input[type="range"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 100%;
  outline: none;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  background-color: transparent;
  pointer-events: none;
}
.slider-track {
  width: 100%;
  height: 5px;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  border-radius: 5px;
}
input[type="range"]::-webkit-slider-runnable-track {
  -webkit-appearance: none;
  height: 5px;
}
input[type="range"]::-moz-range-track {
  -moz-appearance: none;
  height: 5px;
}
input[type="range"]::-ms-track {
  appearance: none;
  height: 5px;
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  height: 1.7em;
  width: 1.7em;
  background-color: #3264fe;
  cursor: pointer;
  margin-top: -9px;
  pointer-events: auto;
  border-radius: 50%;
}
input[type="range"]::-moz-range-thumb {
  -webkit-appearance: none;
  height: 1.7em;
  width: 1.7em;
  cursor: pointer;
  border-radius: 50%;
  background-color: #3264fe;
  pointer-events: auto;
  border: none;
}
input[type="range"]::-ms-thumb {
  appearance: none;
  height: 1.7em;
  width: 1.7em;
  cursor: pointer;
  border-radius: 50%;
  background-color: #3264fe;
  pointer-events: auto;
}
input[type="range"]:active::-webkit-slider-thumb {
  background-color: #ffffff;
  border: 1px solid #3264fe;
}
.values {
  background-color: #3264fe;
    width: 34%;
    position: relative;
    margin: auto;
    border-radius: 5px;
    text-align: center;
    font-weight: 500;
    font-size: 13px;
    color: #ffffff;
}
.values:before {
  content: "";
  position: absolute;
  height: 0;
  width: 0;
  border-top: 15px solid #3264fe;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  margin: auto;
  bottom: -14px;
  left: 0;
  right: 0;
}

#spinner-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.8); /* Adjust the background color and opacity */
  z-index: 9999;
}
#map-container { position: absolute; top: 0; bottom: 0; width: 100%; }

</style>

{{-- ////////////////////////////////////////////////////////// --}}
    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">{{$urlData['travel_location']}}</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section bg-light pb-0"  >
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form action="{{route('searchVilla')}}" method="get">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="travel_to" class="font-weight-bold text-black">Travelling to</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><i class="ri-map-pin-line"></i></div>
                    <input type="text" id="travel_to" name="travel_location" class="form-control "  placeholder="Where are you going ?" required>
                  </div>
                  <span>@error('travel_location')
                      {{$message}}
                  @enderror</span>
                </div>              
                <div class="col-md-8 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkindate" class="font-weight-bold text-black">Check In --- Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"></div>
                    <input type="date" id="datepicker"  class="form-control" placeholder="2015-04-13 • 2015-04-17">
                  </div>
                </div>
           
                <input type="text" id="checkindate" name="checkindate" class="form-control" placeholder="DD/MM/YYYY" hidden>
                <input type="text" id="checkoutdate" name="checkoutdate" class="form-control" placeholder="DD/MM/YYYY" hidden>
                
                <div class="col-md-12 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults (18+)</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="adults" id="adults" class="form-control">
                          <?php for($i=1;$i<=10;$i++){ ?>
                            @if($adults == $i)
                          <option value="{{$i}}" selected>{{$i}}</option>
                            @endif
                          <option value="{{$i}}">{{$i}}</option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">

                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="children" id="children" class="form-control">
                          <option value="0" selected>0</option>
                          <?php for($i=1;$i<=10;$i++){ ?>
                            @if($children == $i)
                          <option value="{{$i}}" selected>{{$i}}</option>
                            @endif
                            <option value="{{$i}}">{{$i}}</option>
                            <?php }?>
                        </select>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 align-self-end">
                    <button type="submit" class="btn btn-primary btn-block ">Check Availabilty</button>
                  </div>
                </div>
              </div>
              <div class="dropdown">
              <ul class="dropdown-menu" id="dropmenu" style="display: none;width: 22.8%;font-size: 97%;">
                
              </ul>
            </div>
            </form>
          </div>


        </div>
      </div>
    </section>

    <section class="section">
      <div class="container-fluid">
        
        <div class="row">
          <!-- Filter Section -->
          <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
            <div class="product-categori">
                <div class="search-product">
                    {{-- <form action="#">
                        <input class="form-control" placeholder="Where to Go ?" type="text">
                        <button type="submit"> <i class="fa fa-search"></i> </button>
                    </form> --}}
                    {{-- slider price --}}
                    
                </div>
                <div class="filter-sidebar-left">
                    <div class="title-left">
                        <h3>Categories</h3>
                        
                    <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                        <div class="list-group-collapse sub-men">
                          <?php $amenities = App\Models\Amenties::all();
                           $count = count($amenities);?>
                            <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1"> Amenities <small class="text-muted">({{$count}})</small></a>
                            <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                              <div class="list-group">
                                  <?php foreach($amenities as $a){?>   
                                  <div class="list-group-item list-group-item-action ">
                                    <input type="checkbox" class="amenityFilter" name="amenity" id="" value="{{$a->amenity}}">  <i class="{{$a->icon}}"></i>    {{$a->amenity}}</div>
                                
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-collapse sub-men">
                            <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Vegetables 
        <small class="text-muted">(50)</small>
        </a>
                            <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">Vegetables 1 <small class="text-muted">(10)</small></a>
                                    <a href="#" class="list-group-item list-group-item-action">Vegetables 2 <small class="text-muted">(20)</small></a>
                                    <a href="#" class="list-group-item list-group-item-action">Vegetables 3 <small class="text-muted">(20)</small></a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a>
                        <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                        <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a>
                    </div>
                </div>
                <div class="filter-price-left">
                    <div class="title-left">
                        <h3>Price</h3>
                    </div>
                    <div class="price-box-slider">
                      <div class="wrapper">
                        <div class="values">
                          <span id="range1">
                            5000
                          </span>
                          <span> &dash; </span>
                          <span id="range2">
                            7000
                          </span>
                        </div>
                        <div class="container">
                          <?php 
                          $villaIDs =[];
                          foreach($villa as $v){ 
                            $villaIDs[]  = $v->id;
                            $villaIDsString = implode(',', $villaIDs);
                           }
                            ?>
                          
                          <input type="text" name="villa_ids" id="VillaIDs" value="{{$villaIDsString}}" hidden>
                          <div class="slider-track"></div>
                          <input type="range" min="4500" max="25000" value="5000" id="slider-1" oninput="slideOne()">
                          <input type="range" min="4500" max="25000" value="7000" id="slider-2" oninput="slideTwo()">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            <div class="row col-md-6 col-lg-4 mb-5" id="villaContainer" data-aos="fade-up">

                  <?php 
              $villaIDs =[];
              foreach($villa as $v){ 
                $villaIDs [] = $v->id; 
                $images  = explode(',',$v->images);
                ?>
                
                <a href="{{ route('singleVilla') }}?checkin={{ $urlData['checkindate'] ?? '' }}&checkout={{ $urlData['checkoutdate'] ?? '' }}&guests={{ $urlData['guests'] ?? '' }}&property_id={{ $v->id }}&adults={{ $adults ?? '' }}&children={{ $children ?? '' }}" class="room">
                  
                  
                  <figure class="img-wrap">
                    <img src="{{asset('assets/villa_images/'.$images[1])}}" alt="Free website template" class="img-fluid mb-3">
                  </figure>
                  <div class="p-3 text-center room-info">
                    <h2>{{$v->name}}</h2>
                    <span class="text-uppercase letter-spacing-1">₹{{$v->price_per_night}} / per night</span>
                  </div>
                </a>
                <?php }?>
            </div>
            <div class="row col-md-6 col-lg-4 mb-5 mx-5" id="villaContainer" data-aos="fade-up">
              <div id="map-container" style="height: 400px;"></div>
            </div>
            <div id="spinner-overlay" class="d-flex justify-content-center align-items-center" style="visibility: hidden">
              <div class="spinner-border "  style="width: 8rem;height: 8rem;border-width: thick;color: rgb(4, 153, 4); display: none" role="status">
                <span class="visually-hidden"></span>
              </div>
            </div>
        </div>
      </div>
    </section>
    
    <section class="section bg-light">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
      
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
          <a href="#" class="image d-block bg-image-2" style="background-image: url('images/img_1.jpg');"></a>
          <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary">$199</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Family Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
          <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('images/img_2.jpg');"></a>
          <div class="text order-1">
            <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Presidential Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>

      </div>
    </section>

    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
      <div class="container" >
        <div class="row align-items-center">
          <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
            <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
            <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
          </div>
        </div>
      </div>
    </section>
    {{-- /////////////////////////////////// --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
   selectedAmenity = [];
   var $villaIDsString = [];
   var  timeoutId ;
    $('.amenityFilter').on('change', function () {
      clearTimeout(timeoutId);
        var value = $(this).val();
        if ($.inArray(value, selectedAmenity) !== -1) {
            selectedAmenity.splice($.inArray(value, selectedAmenity), 1);
        } else {
            selectedAmenity.push(value);
        }
        villaContainer = $('#villaContainer');
        villaContainer.empty();
        $('#spinner-overlay').css('visibility','visible');
        $('.spinner-border').show();
        timeoutId =setTimeout(() => {
        $.ajax({
          type: "get",
          url: "{{url('/filterAmenity')}}",
          data: {
            amenity:selectedAmenity,
            location:'{{$urlData["travel_location"]}}',
          },
          success: function (response) {
              $villas = response.success;
              console.log($villas);
                $.each($villas, function (index, villa) { 
                  if($villaIDsString.includes(villa.id)){
                     $villaIDsString.pop(villa.id);
                  } else {
                      // Add villa.id if it's not in $villaIDsString
                      $villaIDsString.push(villa.id);
                  }
                  // $villaIDsString = Array.from(new Set($villaIDsString));
                  
                  $('#VillaIDs').val($villaIDsString);
                  var images = villa.images.split(',');
                  var imageUrl = '{{ asset("assets/villa_images/") }}' + '/' + images[1];
                  var villaHtml = ' <a href="{{ route("singleVilla") }}?checkin=' + encodeURIComponent("{{ $urlData['checkindate'] ?? '' }}") +
                                '&checkout=' + encodeURIComponent("{{ $urlData['checkoutdate'] ?? '' }}") +
                                '&guests=' + encodeURIComponent("{{ $urlData['guests'] ?? '' }}") +
                                '&property_id=' + villa.id +
                                '&adults=' + encodeURIComponent("{{ $adults ?? '' }}") +
                                '&children=' + encodeURIComponent("{{ $children ?? '' }}") +
                                '" class="room">' +
                                '<figure class="img-wrap">' +
                                '<img src="' + imageUrl + '" alt="Villa Image" class="img-fluid mb-3">' +
                                '</figure>' +
                                '<div class="p-3 text-center room-info">' +
                                '<h2>' + villa.name + '</h2>' +
                                '<span class="text-uppercase letter-spacing-1">₹' + villa.price_per_night + ' / per night</span>' +
                                '</div>' +
                                '</a>';
                                villaContainer.append(villaHtml);

                });
              }
            });
              $('#spinner-overlay').css('visibility','hidden');
              $('.spinner-border').hide();
            }, 1200);

    });
/////////////////////////


    </script>


<script>
  flatpickr("#datepicker", {
    dateFormat: "Y-m-d",
    minDate: "today",
    mode: "range",
    defaultDate: ['{{$urlData["checkindate"]}}', '{{$urlData["checkoutdate"]}}'],
    conjunction: " • ",
    disable: [
        function(date) {
            // disable every multiple of 8
            return !(date.getDate() % 8);
        }
    ],     
    onChange: function(selectedDates, dateStr, instance) {
      // Custom onChange event
      console.log("Selected dates: ", selectedDates);
      dates = dateStr.split('to');
      console.log("Formatted date string: ", dates[0]);
      start= dates[0];
      end= dates[1];
      if (selectedDates.length === 2) {
        $('#checkindate').val(start);
        $('#checkoutdate').val(end);
        var startDate = selectedDates[0];
        var endDate = selectedDates[1];
        var timeDiff = endDate.getTime() - startDate.getTime();
        var nightsDiff = timeDiff / (1000 * 3600 * 24);
        
      }
    },
    
  });

</script>
{{-- send to json file lol --}}
    <script>
      var villaData = @json($villa)
    </script>
  <script>
      var timeoutId;

      $('#travel_to').on('keyup', function (e) {
      e.preventDefault();
      var travel_location = $(this).val();

      // Clear the previous timeout to avoid multiple requests
      clearTimeout(timeoutId);

      // Set a new timeout to delay the AJAX request
      timeoutId = setTimeout(function () {
      $('#dropmenu').empty(); // Clear previous suggestions
      $.ajax({
        type: "get",
        url: "{{ url('/search/location') }}",
        data: {
          travel_location: travel_location,
        },
        success: function (response) {
          for (result of response) {
            console.log(result['city'], result['state'], result['country']);
            $('#dropmenu').append(`<li class="dropdown-item dropitem" style="cursor:pointer">${result['city']}, ${result['state']}, ${result['country']}</li>`);
          }
          $('#dropmenu').show(); // Show the dropdown after adding suggestions
            }
          });
        }, 1200); // Adjust the delay as needed (e.g., 500 milliseconds)
      });
  </script>
  <script>
    $('#dropmenu').on('click', '.dropdown-item', function () {
    loc = $(this).text();
    $('#travel_to').val(loc);
    $('#dropmenu').hide();
    });
  </script>


<script>
  var  timeoutId ;
      //   window.onload = function () {
      //   slideOne();
      //   slideTwo();
      // };

      let sliderOne = document.getElementById("slider-1");
      let sliderTwo = document.getElementById("slider-2");
      let displayValOne = document.getElementById("range1");
      let displayValTwo = document.getElementById("range2");
      let minGap = 0;
      let sliderTrack = document.querySelector(".slider-track");
      let sliderMaxValue = document.getElementById("slider-1").max;

      function slideOne() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
          sliderOne.value = parseInt(sliderTwo.value) - minGap;
        }
        villaContainer = $('#villaContainer');
        villaContainer.empty();
        displayValOne.textContent = sliderOne.value;
        // console.log(sliderTwo.value)
      
       

        updatePrices();
        fillColor();
      }
      function slideTwo() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
          sliderTwo.value = parseInt(sliderOne.value) + minGap;
        }
        villaContainer = $('#villaContainer');
        villaContainer.empty();
        displayValTwo.textContent = sliderTwo.value;
        // console.log(sliderTwo.value)
        updatePrices();
        fillColor();
      }
      function fillColor() {
        percent1 = (sliderOne.value / sliderMaxValue) * 70;
        percent2 = (sliderTwo.value / sliderMaxValue) * 70;
        sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
      }
      function updatePrices(){
        clearTimeout(timeoutId);
        ids = $('#VillaIDs').val();
        villaContainer = $('#villaContainer');
        villaContainer.empty();
        $('#spinner-overlay').css('visibility','visible');
        $('.spinner-border').show();
       
        timeoutId =setTimeout(() => {
          $.ajax({
            type: "get",
            url: "{{url('/filterPrices')}}",
            data: {
              ids:ids,
              priceLow : parseInt(sliderOne.value),
              priceHigh : parseInt(sliderTwo.value),
            },
            success: function (response) {
                $villas = response.success;
                $.each($villas, function (index, villa) {
                    var images = villa.images.split(',');
                    var imageUrl = '{{ asset("assets/villa_images/") }}' + '/' + images[1];
                    var villaHtml = ' <a href="{{ route("singleVilla") }}?checkin=' + encodeURIComponent("{{ $urlData['checkindate'] ?? '' }}") +
                                  '&checkout=' + encodeURIComponent("{{ $urlData['checkoutdate'] ?? '' }}") +
                                  '&guests=' + encodeURIComponent("{{ $urlData['guests'] ?? '' }}") +
                                  '&property_id=' + villa.id +
                                  '&adults=' + encodeURIComponent("{{ $adults ?? '' }}") +
                                  '&children=' + encodeURIComponent("{{ $children ?? '' }}") +
                                  '" class="room">' +
                                  '<figure class="img-wrap">' +
                                  '<img src="' + imageUrl + '" alt="Villa Image" class="img-fluid mb-3">' +
                                  '</figure>' +
                                  '<div class="p-3 text-center room-info">' +
                                  '<h2>' + villa.name + '</h2>' +
                                  '<span class="text-uppercase letter-spacing-1">₹' + villa.price_per_night + ' / per night</span>' +
                                  '</div>' +
                                  '</a>';
                                  villaContainer.append(villaHtml);
                  });
                },
                
              });
                  $('#spinner-overlay').css('visibility','hidden');
                  $('.spinner-border').hide();
              }, 1200);
      }


</script>
<script>
  // Initialize the map
  windows.onload = function (){

    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        .openPopup();
  }
</script>


    @endsection