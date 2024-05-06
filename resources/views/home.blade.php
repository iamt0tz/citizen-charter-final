 
  @extends('layouts.home')
  
   
  @section('content') 
      <div class="container-fluid ">  
        <span></span>
            <div class="row col d-flex justify-content-center">   
              @foreach ($data as $item)
                  <div class="card shadow">
                        <span></span>
                        <div>  
                              <h5>{{ $item->name }} </h5>  
                                  <h6><code>({{ $item->description }})</code></h6> 
                                  <br/>
                                <span></span>
                                <button  
                                    onclick="location.href='{{url('/section',$item->id)}}'">
                                    View Sections 
                                </button> 
                              <span></span>
                              <span></span>
                        </div>
                  </div>  
              @endforeach 
            </div>
      </div>
@endsection
    