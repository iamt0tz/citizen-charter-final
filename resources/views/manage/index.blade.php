 

<style>
  ion-icon {
    font-size: 150 !important;
      max-width: 100% !important;
    color: #007bffdb !important;
  }  
  .row{  
    /* margin-top: 5% !important; */
    padding: 5% !important;
  }
 
</style>

  @extends('layouts.app')
  
   
@section('content')
    <div class="container-fluid">   
        <div class=" row justify-content-center">   
                <div class="col-sm-3 centered  ">
                      <a href="{{url('manage/upload')}}"> 
                          <center>
                              <ion-icon name="cloud-upload-outline"></ion-icon>
                          </center>
                      </a>
                      <h5 class="text-center">Upload New File</h5>
                </div> 
                <div class="col-sm-3 centered">
                  <a href="{{url('manage/sections')}}"> 
                    <center>
                        <ion-icon name="briefcase-outline"></ion-icon>  
                    </center>
                  </a>
                  <h5 class="text-center">Manage Sections</h5>
                </div>  
                <div class="col-sm-3 centered">
                  <a href="{{url('manage/divisions')}}"> 
                    <center>
                      <ion-icon name="business-outline"></ion-icon>
                    </center>
                  </a>
                  <h5 class="text-center">Manage Divisions</h5>
                </div>  
            @if (Auth::user()->is_admin) 
                <div class="col-sm-3 centered">
                    <a href="{{url('manage/users')}}"> 
                      <center>
                        <ion-icon name="people"></ion-icon>
                      </center>
                    </a>
                    <h5 class="text-center">Manage Users</h5>
                </div>      
            @endif  
      </div>
    </div> 

    @endsection

