  
  @extends('layouts.home')
  
   
  @section('content')
 
    
     
  <div class="container-fluid ">  
    
    <span></span><h2 style="text-align: center" class="header-tag">{{  $division->name   }}</h2>
    <hr> <br>
    <span></span>
      <div class="row col d-flex justify-content-center">   
                @foreach ($data as $item)
                  <div class="card shadow">
                  <div>  
                      {{-- <strong> {{ $item->name }} </strong> --}}
                      <h5   >{{ $item->name }} 
                          <span></span>
                          <code>({{ $item->description }})</code></h5> 
                          <div ></div>
                      <table>
                          <tr>
                              <button data-id="{{$item->id}}"
                                  onClick="view({{$item->id}});"
                                  href="" data-toggle="modal" data-target="#modal-xl">
                                  View Services 
                              </button>
                          </tr> <span></span>
                      </table>     
                    </div>
                  </div>  
                @endforeach
           </div> 
       </div>
    <div class="floating-button">
        <button  onclick="window.location.href = '{{ url('/home') }}';"><ion-icon name="arrow-back-outline"></ion-icon> Back</button>
    </div> 

    
@endsection

  <script>
          function view(id) {     
            $.ajax({ 
                      url: '../psd/file/' + id, // Replace with your route to fetch modal content
                      type: 'GET',
                      success: function (response) { 
                          $('#modal-xl').find('.modal-body').html(response);
                          // $('#modal-xl').find('.modal-title').html(response.name);
                          $('#modal-xl').modal('show');
                      },
                      error: function (error) {
                          console.log(error);
                      }
                  }); 
          }   
  </script>
     