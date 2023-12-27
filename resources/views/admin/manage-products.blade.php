@extends('master.adminpanel.master')
@section('content')

<main id="main" class="main">

<section class="section">
<div class="row">
    <div class="col-lg-12"  >
        
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Product Management</h5>

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Images</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Measurement</th>
            <th scope="col">Price</th>
            <th scope="col">isApproved</th>
            <th scope="col">by_Seller</th>
            <th scope="col" style="font-size: 22px;"><i class=" ri-checkbox-circle-fill"></i>/<i class="ri-close-circle-fill"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1?>
          @foreach($products as $product)
           <?php $imageurls = explode(',',$product->image_url); ?>
            
          <tr >
            <th scope="row">{{$i++}}</th>
            <th scope="row"><img src="{{asset('assets/'.strtolower($product->category->category).'/'.$imageurls[0])}}" width="100px" alt="" srcset=""></th>
            <td>{{$product->name}}</td>
            <td>{{$product->category->category}}</td>                
            <td>{{$product->value}}{{$product->measure->measure}}</td>
            <td>{{$product->price}}</td>
            <td class="approved{{$product->id}}" > {{$product->isApproved}}</td>
            <td>{{$product->user->fname}}</td>
            <td><i class="ri-checkbox-circle-line" data-id="{{$product->id}}" style="font-size: 22px;color: blue;cursor:pointer;"></i> <i class=" ri-close-circle-line" data-id="{{$product->id}}"  style="font-size: 22px;color: red;cursor:pointer;"></i></td> 
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
      url: "{{url('/approveProduct')}}",
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
      url: "{{url('/disapproveProduct')}}",
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