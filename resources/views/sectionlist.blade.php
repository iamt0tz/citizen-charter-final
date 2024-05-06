  
  @extends('layouts.home')
  
   
  @section('content')  
       
        {{-- <div class="container-fluid ">   --}}
          <span></span>
            {{-- <div class="row col d-flex justify-content-center">    --}}
                @foreach ($data as $item)
                  <div class="card shadow"> 
                      <span></span> 
                      <div>  
                          <h5   >{{ $item->name }} <code>({{ $item->description }})</code></h5><h6> {{ $item->division->name }} </h6> 
                              <div ></div><span></span>
                          <table>
                              <tr>
                                  <button 
                                      data-id="{{$item->id}}"
                                      onClick="view({{$item->id}});"
                                      href="" data-toggle="modal" data-target="#modal-xl">
                                      View Services 
                                  </button>
                              </tr>  
                          </table>     
                        </div>
                    </div>  
                @endforeach
            {{-- </div> --}}
          {{-- </div>  --}}
@endsection 
<script>
  function view(id) {     
      $.ajax({ 
                url: '../psd/file/' + id,  
                type: 'GET',
                success: function (response) { 
                    $('#modal-xl').find('.modal-body').html(response); 
                    $('#modal-xl').modal('show');
                },
                error: function (error) {
                    console.log(error);
                }
            }); 
        }   
</script>

  