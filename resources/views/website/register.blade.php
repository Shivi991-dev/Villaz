@extends('master.website.master')
@section('content')


<style>
    .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
    .gradient-form {
    height: 120% !important;
    }
    }
    @media (min-width: 769px) {
    .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
    }
    }
</style>



<section class="h-200 gradient-form" style="background-image: url(images/hero_4.jpg)">
  <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 12%">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="images/logo.png" class="logo" alt="" width="135px">
                    <h4 class="mt-1 mb-5 pb-1">Register</h4>
                  </div>
  
                  <form method="POST" action="{{route('registerUser')}}">
                    @csrf
                    <p style="text-align:center">Register Your Account</p>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">First Name</label>
                      <input type="text" name="fname" id="form2Example11" class="form-control"
                        placeholder="Enter First Name" />
                        <span style="color: red">@error('fname')
                            {{$message}}
                        @enderror </span>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">Last Name</label>
                      <input type="text" name="lname" id="form2Example11" class="form-control"
                        placeholder="Enter Last Name" />
                        <span style="color: red">@error('lname')
                            {{$message}}
                        @enderror </span>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">Email</label>
                      <input type="email" name="email" id="form2Example11" class="form-control"
                        placeholder="Email address" />
                        <span style="color: red">@error('email')
                            {{$message}}
                        @enderror </span>
                    </div>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example22">Password</label>
                      <input type="password" name="password" id="form2Example22" class="form-control" />
                      <span style="color: red">@error('password')
                        {{$message}}
                    @enderror </span>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example22">Register As</label>
                        <select name="userType" id="userType">
                          <option value="simple" selected>Simple</option>
                          <option value="seller">Seller</option>
                        </select>
                        <span style="color: red">@error('password')
                        {{$message}}
                    @enderror </span>
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register
                        </button>
                      <a class="text-muted" href="#!">Forgot password?</a>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2 mx-2">Already have an account?</p>
                      <a type="button" href="/login" class="btn btn-outline-danger">Login Here</a>
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection