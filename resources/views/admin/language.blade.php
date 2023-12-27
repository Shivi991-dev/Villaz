@extends('master.adminpanel.master')
@section('content')
<main id="main" class="main">

    <section class="section">
<div>
    <h2>KEY/VALUE</h2>
    <form action="{{route('add.key.value')}}" method="get">
        @csrf
    <label for="">Add Key</label>
    <input type="text" name="key" placeholder="Add Key">
    <label for="">Add Value</label>
    <input type="text" name="value" placeholder="Add Value">
    <button type="submit">Submit</button>
    </form>
</div>
<div class="row">
    <h2>Existing</h2>
    <?php  
    foreach(__('file') as $key => $val){
        echo "<div class = 'col-4'>";
        echo '<label for="">' . $key . '</label><br>';
        echo "<input type='text' class='inputData' name='$key' value='$val' data-id='$key'><br>";
        echo "<span class='col-2 buttonLang' >
                <button id='$key' class='btn btn-primary btn-sm my-2' style='display:none'>Submit</button>
             </span>";
        echo   "<div class='spinner-border text-primary spinner-border-sm '  style='display:none' id='spin$key' role='status'>
                <span class='visually-hidden'>Loading...</span>
             </div>";
        echo '</div>';
        }
    ?>
</div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    <script src="js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- ########## SUBMIT LANGUAGE CHANGE ########--}}
<script>

    $('.inputData').on('keyup', function(){
        var input = $(this).data('id');
        var value = $(this).val();
        $('#' + input).show();
        

        $('#' + input).on('click',function(){
            $('#spin' + input).show();
            setTimeout(() => {
                $('#spin' + input).hide();
                $('#' + input).hide();

            }, 1500);
            $.ajax({
                type: "get",
                url: "{{url('updateLang')}}",
                data: {
                    key:input,
                    value:value,
                },
                success: function (response) {
                }
            });
        })
    });
 
    // $('.buttonLang').append("<button class='btn btn-primary btn-sm my-2'>Submit</button>")
    
</script>
@endsection