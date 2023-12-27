@extends('master.adminpanel.master')
@section('content')
<main id="main" class="main">
  <?php
  $countryList = array(
    "AF" => "Afghanistan",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "BQ" => "British Antarctic Territory",
    "IO" => "British Indian Ocean Territory",
    "VG" => "British Virgin Islands",
    "BN" => "Brunei",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CT" => "Canton and Enderbury Islands",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos [Keeling] Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo - Brazzaville",
    "CD" => "Congo - Kinshasa",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "CI" => "Côte d’Ivoire",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "NQ" => "Dronning Maud Land",
    "DD" => "East Germany",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "FQ" => "French Southern and Antarctic Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and McDonald Islands",
    "HN" => "Honduras",
    "HK" => "Hong Kong SAR China",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JT" => "Johnston Island",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Laos",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macau SAR China",
    "MK" => "Macedonia",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "FX" => "Metropolitan France",
    "MX" => "Mexico",
    "FM" => "Micronesia",
    "MI" => "Midway Islands",
    "MD" => "Moldova",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar [Burma]",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NT" => "Neutral Zone",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "KP" => "North Korea",
    "VD" => "North Vietnam",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PC" => "Pacific Islands Trust Territory",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territories",
    "PA" => "Panama",
    "PZ" => "Panama Canal Zone",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "YD" => "People's Democratic Republic of Yemen",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn Islands",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RO" => "Romania",
    "RU" => "Russia",
    "RW" => "Rwanda",
    "RE" => "Réunion",
    "BL" => "Saint Barthélemy",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "MF" => "Saint Martin",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and the Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "CS" => "Serbia and Montenegro",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and the South Sandwich Islands",
    "KR" => "South Korea",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syria",
    "ST" => "São Tomé and Príncipe",
    "TW" => "Taiwan",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania",
    "TH" => "Thailand",
    "TL" => "Timor-Leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UM" => "U.S. Minor Outlying Islands",
    "PU" => "U.S. Miscellaneous Pacific Islands",
    "VI" => "U.S. Virgin Islands",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "SU" => "Union of Soviet Socialist Republics",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "ZZ" => "Unknown or Invalid Region",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VA" => "Vatican City",
    "VE" => "Venezuela",
    "VN" => "Vietnam",
    "WK" => "Wake Island",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe",
    "AX" => "Åland Islands",
    );
    ?>
    <section class="section">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Villa Details</h5>
              {{-- <?php $u =App\Models\User::where('id',Auth::user()->id)->first(); ?> --}}
              {{-- @if($u->isApproved) --}}
              <!-- Multi Columns Form -->
              <form class="row g-3" method="POST" action="{{route('addVilla')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Villa Name</label>
                  <input type="text" class="form-control" name="villaname" placeholder="Villa Name" id="inputName5">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Description</label>
                    <br>
                    <textarea name="desc" id="" cols="30" rows="3" placeholder="Description......." rows="10"></textarea>
                  </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Amenities</label><br>
                  <div class="row">
                  <?php $amenity = App\Models\Amenties::all();
                  foreach($amenity as $c){
                  ?>
                  <div class="col-5">
                  <label for="amenity_{{$c->id}}">{{$c->amenity}}</label>
                   <i class="{{$c->icon}}"></i> <input type="checkbox" name="amenities[]" id="amenity_{{$c->id}}" value="{{$c->amenity}}" >
                  </div>
                    <?php } ?>
                </div>
                </div>

                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Property Owner</label>
                  <input type="text" class="form-control" name="owner" id="inputAddres5s" placeholder="owner name">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Price/Night</label>
                  <input type="text" class="form-control" name="price" id="inputAddress2" placeholder="₹ Price">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Max Guests</label>
                  <input type="number" class="form-control" name="guests" id="inputAddress2" placeholder="No. of Guests Allowed">
                </div>
                <h3>Property Layout</h3>

                <div class="col-6">
                  <label for="inputAddress2" class="form-label"> Bedrooms</label>
                  <input type="number" class="form-control" name="bedrooms" id="inputAddress2" placeholder="No. of Bedrooms">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label"> Bathrooms</label>
                  <input type="number" class="form-control" name="bathrooms" id="inputAddress2" placeholder="No. of Bathrooms">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label"> Kitchens</label>
                  <input type="number" class="form-control" name="kitchens" id="inputAddress2" placeholder="No. of Kitchens">
                </div>
             
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Images</label><br>
                    <input type="file" name="images[]" id="" multiple>
                  </div>
                <h3>Location</h3>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Address 1">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">LandMark</label>
                  <input type="text" class="form-control" name="landmark" id="inputAddress2" placeholder="E.g. near Dav School...">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">City</label>
                  <input type="text" class="form-control" name="city" id="inputAddress2" placeholder="City/State">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">State</label>
                  <input type="text" class="form-control" name="state" id="inputAddress2" placeholder="City/State">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Zip Code</label>
                  <input type="text" class="form-control" name="zipcode" id="inputAddress2" placeholder="Zip Code">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Country</label><br>
                  <select class="form-select" name="country" aria-label="Default select example">
                    <?php foreach($countryList as $country){?>
                    <option value="{{$country}}">{{$country}}</option>
                    <?php }?>
                  </select>
                  {{-- <input type="text" class="form-control" name="country" id="inputAddress2" placeholder="Country"> --}}
                </div>
                {{-- <h2>Selective Prices</h2>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Address 1">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">LandMark</label>
                  <input type="text" class="form-control" name="landmark" id="inputAddress2" placeholder="E.g. near Dav School...">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">City</label>
                  <input type="text" class="form-control" name="city" id="inputAddress2" placeholder="City/State">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Zip Code</label>
                  <input type="text" class="form-control" name="zipcode" id="inputAddress2" placeholder="Zip Code">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Country</label>
                  <input type="text" class="form-control" name="country" id="inputAddress2" placeholder="Country">
                </div> --}}
              
           
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->
              {{-- @else
              <h3 id="lm">Approval Pending ....</h3>
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>

                  Swal.fire({
                    icon: 'error',
                    title: 'Approval Required',
                    text: 'Admin approval pending !',
                  });
               
                
              </script>
              @endif --}}
            </div>
          </div>
    </section>
</main>

@endsection