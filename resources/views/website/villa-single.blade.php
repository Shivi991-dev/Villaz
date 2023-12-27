@extends('master.website.master')
@section('content')
    

<style>
  .form-label{
    color: red;
    font-style: italic;
    height: 24px;
    font-size: 14px;
  }
  .submit-btn{
    color: #fff;
	background-color: #f14634;
	font-weight: 700;
	height: 80px;
	font-size: 18px;
	text-transform: capitalize;
	border: none;
	width: 100%;
  }
  .section {
	position: relative;
	height: 100vh;
}
  
</style>
		<div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="rooms.html">Rooms</a></span> <span>Rooms Single</span></p>
	            
              <h1 class="mb-4 bread">Villa Details</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">

                  <?php $images = explode(',',$villa->images);   ?>
                  @foreach ($images as $i)
                      
          				<div class="item">
                    <div class="room-img" style="background-image: url('{{ asset('assets/villa_images/' . $i) }}');"></div>
          				</div>
                  @endforeach
          			</div>
          		</div>
          		<div class="col-md-12 room-single mt-4 mb-5 ftco-animate">

          			<h2 class="mb-4">{{$villa->name}} <span>( ₹{{$villa->price_per_night}} / Night ) </span></h2> 
                <span style="text-shadow: 0 0 rgb(122, 130, 235);"> ( {{$villa->layout->bedrooms}} Bedrooms · {{$villa->layout->bathrooms}} Baths · Guests : {{$villa->guests}} )</span>
    						<p>{{$villa->description}}</p>
                <?php $amenities = explode(',',$villa->amenities); ?>
                <div class="d-md-flex mt-5 mb-1">
                  @foreach($amenities as $key => $a)
                    @if($key < 9)
                    <?php $amenity = App\Models\Amenties::where('amenity','=',$a)->first(); ?>
                
                    <div class="col-md-4 mb-1">
                      <ul class="list-unstyled">
                        <li><span><i class="{{ $amenity->icon }}"></i></span> {{ $amenity->amenity }}</li>
                      </ul>
                    </div>
                    @if(($key + 1) % 3 == 0) <!-- Add a new row after every 3 amenities -->
                      </div>
                      <div class="d-md-flex mt-1">
                    @endif
                @endif
                  @endforeach
                </div>
                <h4 style="font-size: 20px">Location</h4>
                <p style="font-size: 15px;text-shadow: 0px 0px  black;}">{{$villa->location->address}}, {{$villa->location->landmark}}, {{$villa->location->zip_code}}, {{$villa->location->city}}, {{$villa->location->state}}, {{$villa->location->country}}</p>
          		</div>
          		<div class="col-md-12 room-single ftco-animate mb-5 mt-4">
          			<h3 class="mb-4">Take A Tour</h3>
          			<div class="block-16">
		              <figure>
		                <img src="images/room-4.jpg" alt="Image placeholder" class="img-fluid">
		                <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span class="icon-play"></span></a>
		              </figure>
		            </div>
          		</div>

          		<div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
          			<h4 class="mb-4">Review &amp; Ratings</h4>
          			<div class="row">
          				<div class="col-md-6">
          					<form method="post" class="star-rating">
										  <div class="form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1">
													<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100 Ratings</span></p>
												</label>
										  </div>
										  <div class="form-check">
									      <input type="checkbox" class="form-check-input" id="exampleCheck1">
									      <label class="form-check-label" for="exampleCheck1">
									    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30 Ratings</span></p>
									      </label>
										  </div>
										  <div class="form-check">
									      <input type="checkbox" class="form-check-input" id="exampleCheck1">
									      <label class="form-check-label" for="exampleCheck1">
									      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5 Ratings</span></p>
									     </label>
										  </div>
										  <div class="form-check">
										    <input type="checkbox" class="form-check-input" id="exampleCheck1">
									      <label class="form-check-label" for="exampleCheck1">
									      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
									      </label>
										  </div>
										  <div class="form-check">
									      <input type="checkbox" class="form-check-input" id="exampleCheck1">
									      <label class="form-check-label" for="exampleCheck1">
									      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
										    </label>
										  </div>
										</form>
          				</div>
          			</div>
          		</div>
          	</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate pl-md-5">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Layout</h3>
                <li><a href="#">Bedrooms<span>({{$villa->layout->bedrooms}})</span></a></li>
                <li><a href="#">Bathrooms <span>({{$villa->layout->bathrooms}})</span></a></li>
                <li><a href="#">Kitchens <span>({{$villa->layout->kitchen}})</span></a></li>

              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h1 id="bub">Booking</h1>

              <div id="booking" class="section">
                <div class="section-center">
                  <div class="container">
                    <div class="row">
                      {{-- <div class="booking-form"> --}}
                        @if($nights)
                        <div id="calc" style="font-size: 20px;text-shadow: 0px 0px 0px black;}"><span class="night_price">₹{{$villa->price_per_night * $nights}}</span> / <span class="nights"> {{$nights}}x Night</span></div>
                        @else
                        <div id="calc" style="font-size: 20px;text-shadow: 0px 0px 0px black;}"><span class="night_price">₹{{$villa->price_per_night}}</span> / <span class="nights"> 1x Night</span></div>
                        @endif
                        <form method="get" action="{{route('bookVillaView')}}"  >
                          @csrf
                          <div class="row no-margin">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <span class="form-label">Check In ---- Check Out</span>
                                <input class="form-control" data-price="{{$villa->price_per_night}}" name="selecteddates" id="datePicker" type="date" placeholder="YYYY-MM-DD to YYYY-MM-DD"  required>
                              </div>
                            </div>
                            {{-- <div class="col-sm-6">
                              <div class="form-group">
                                <span class="form-label">Check Out</span>
                                <input class="form-control" id="check-out-date" name="checkOutdate" type="date" required>
                              </div>
                            </div> --}}
                          </div>
                          <div class="row no-margin">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <span class="form-label">Adults (18+)</span>
                                <input class="form-control" id="adults" type="number" value="{{$adults ?? '1'}}" name="adults" id="" min="1" max="{{$villa->guests}}">
                                <span class="select-arrow"></span>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <span class="form-label">Children</span>
                                <input class="form-control" id="children" type="number" value="{{$children ?? '0'}}" name="children" id="" min="0" max="{{$villa->guests}}">
                                <span class="select-arrow"></span>
                              </div>
                            </div>
 
                          </div>
                          <div class="form-group">
                            <span class="form-label">Email</span>
                            <input class="form-control" type="email" name="email" placeholder="Enter your email">
                          </div>
                          <div class="form-group">
                            <span class="form-label">Phone</span>
                            <input class="form-control" type="tel" name="phone" placeholder="Enter your phone number">
                          </div>
                          <div class="row form-group">
                            <div class="col-6" id="calc" style="font-size: 15px;text-shadow: 0px 0px 0px rgb(75, 145, 226);font-weight: bold;}"><span >₹{{$villa->price_per_night}}</span> / <span class="nights"> {{$nights}}x Night</span></div>
                            <div class="col-6 night_price" style="font-size: 16px;text-shadow: 0px 0px 0px rgb(17, 58, 173);display: flex; flex-direction: column; align-items: flex-end;}">₹{{$villa->price_per_night * $nights}} </div>
                            <hr>
                            <div class="col-6"><span class="" style="font-size: 15px;text-shadow: 0px 0px 0px rgb(75, 145, 226);font-weight: bold;">Total before taxes</span></div>
                            <hr>
                            <div  class="col-6 night_price" style="font-size: 16px;text-shadow: 0px 0px 0px rgb(17, 35, 204);display: flex; flex-direction: column; align-items: flex-end;}">₹{{$villa->price_per_night * $nights}} </div>
                            <input type="text" name="totalbeforetax" hidden value="{{$villa->price_per_night * $nights}}" id="">
                          </div>

                          <div class="form-btn">

                            <button class="submit-btn btn btn-danger btn-lg" >Book Now</button>
                          </div>
                        </form>
                      {{-- </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- .section -->


    {{-- <footer class="ftco-footer ftco-section img" style="background-image: url(images/bg_4.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Harbor Lights</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Rooms</a></li>
                <li><a href="#" class="py-2 d-block">Amenities</a></li>
                <li><a href="#" class="py-2 d-block">Gift Card</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Career</a></li>
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> --}}


  <script>
    $(document).ready(function () {
      
      flatpickr("#datePicker", {
        dateFormat: "Y-m-d",
        minDate: "today",
        mode: "range",
        defaultDate: ['{{$checkin}}', '{{$checkout}}'],
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
            var price_per_night = '{{$villa->price_per_night}}';
            total_price = (price_per_night * nightsDiff);
            if (!isNaN(total_price)) {
                $('.night_price').text('₹' + total_price);
            } else {
                $('.night_price').text('₹' + price_per_night);
            }
            if (!isNaN(total_price)) {
                $('.nights').text( nightsDiff +' x Night');
            }else{
                $('.nights').text( ' 1x Night');
            }
            
          }
        },
        
      });
    });

  </script>

<script>
  var Guests = parseInt('{{$villa->guests}}');
  $('#adults').on('change',function(e){
    e.preventDefault();
    adults = parseInt($(this).val());
    children = parseInt($('#children').val());
    total = (adults + children);
    console.log('children  ->' +children);

    maxA = Guests - children;
    maxC = Guests - adults;
    console.log('adultmax ->'+maxA);
    console.log('childmax ->'+maxC);
    $(this).attr('max',maxA)
    $('#children').attr('max',maxC)
  })
  $('#children').on('change',function(e){
    e.preventDefault();
    adults = parseInt($('#adults').val());
    console.log('adults  ->' +adults);
    children = parseInt($(this).val());                                        
    total = adults + children;
    maxC = Guests - adults;
    maxA = Guests - children;
    $(this).attr('max',maxC)
    $('#adults').attr('max',maxA)
    console.log('childrenmax ->'+maxC);
    console.log('adultmax ->'+maxA);
  })
</script>

@endsection