@extends('master.adminpanel.master')
@section('content')
<main id="main" class="main">

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Measurement</h5>

              <!-- Measurement Form -->
              <form method="POST" action="{{route('addMeasurement')}}">
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Measurement</label>
                  <div class="col-sm-10">
                    <input type="text" name="measurement" class="form-control" id="inputText">
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
            <div class="my-3 mx-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Existing Measurements
                        </button>
                      </h2>
                      <?php $existing = App\Models\Measurements::all(); 
                      if(count($existing) >0){
                        foreach ($existing as $key => $value) {?>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong><?php echo $value->id.'.'; ?></strong> <?php echo $value->measure; ?>
                        </div>
                      </div>
                      <?php }}
                      else{?>
                      
                       <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>No Measure Found !</strong>
                            </div>
                       </div>
                        <?php }?>
                    </div>
                </div>
            </div>
          </div>
    </section>
</main>
@endsection