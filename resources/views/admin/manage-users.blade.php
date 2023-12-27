@extends('master.adminpanel.master')
@section('content')

<main id="main" class="main">

<section class="section">
<div class="row">
    <div class="col-lg-12"  >
<div class="card">
    <div class="card-body">
      <h5 class="card-title">User Management</h5>

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">isApproved</th>
            <th scope="col" style="font-size: 22px;"><i class=" ri-checkbox-circle-fill"></i>/<i class="ri-close-circle-fill"></i></th>
            <th scope="col">Email Verified</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1?>
          @foreach($users as $user)

          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$user->fname}} {{$user->lname}}</td>
            <td>{{$user->email}}</td>                
            <td>{{$user->userRoles->role}}</td>
            <td class="approved{{$user->id}}" > {{$user->isApproved}}</td>
            <td><i class="ri-checkbox-circle-line" data-id="{{$user->id}}" style="font-size: 22px;color: blue;cursor:pointer;"></i> <i class=" ri-close-circle-line" data-id="{{$user->id}}"  style="font-size: 22px;color: red;cursor:pointer;"></i></td>
            <td>{{$user->email_verified}}</td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
</div>
</div>
</section>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    <script src="js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $('.ri-checkbox-circle-line').on('click',function(){
    var id =$(this).data('id');
    var click = $(this);
    $.ajax({
      type: "get",
      url: "{{url('/approveUser')}}",
      data: {
        id:id,
      },
      success: function (response) {
        $('.approved'+id).text('1');
        console.log('berne');
        // alert(response.success);
      }
    });
  })
  $('.ri-close-circle-line').on('click',function(){
    var id =$(this).data('id');
    var click = $(this);

    $.ajax({
      type: "get",
      url: "{{url('/disapproveUser')}}",
      data: {
        id:id,
      },
      success: function (response) {
        console.log('noo');
        $('.approved'+id).text('0');
        // alert(response.success);
      }
    });
  })
</script>
@endsection