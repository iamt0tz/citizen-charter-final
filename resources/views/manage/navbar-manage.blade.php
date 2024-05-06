<style>
  .img {
             
            height: 30px !important; 
            margin-top: -5px !important;
            margin-right: 5px !important;
        }
  .qwe{
      margin-right:  15px !important;
  }
        
        span { color: white !important;}
        .style { color: white !important;}
        .navbar-light{background-color: #007bff !important;} 
        .f {font-size: 25px !important;}
        /* #3388ea */
        /* .navbar-toggler-icon{background-color:#ffff !important;} */
</style>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="/manage" class="navbar-brand ">
      <img src="../../dist/img/dswd_logo.png"   class="brand-image img "  >
      <!-- <img src="../../dist/img/insignia.png"  class="brand-image img qwe "  >removing this as per memo from secretary -->
      <span class="brand-text font-weight-wide text-xl f"  ><b> Citizen's Charter</b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">

        <li class="nav-item">
          <a href="{{url('/home')}}" class="nav-link style">Home</a>
        </li> 
        <li class="nav-item">
          <a href="{{url('/upload')}}" class="nav-link style">Upload File</a>
        </li> 
        
        <li class="nav-item">
          <a href="{{url('manage/sections')}}" class="nav-link style">Sections</a>
        </li> 
        <li class="nav-item">
          <a href="{{url('manage/divisions')}}" class="nav-link style">Divisions</a>
        </li> 
        
        @if (Auth::user()->is_admin)
         <li class="nav-item">
          <a href="{{url('manage/users')}}" class="nav-link style">Users</a>
        </li>    
        @endif 
 
        
      </ul>
      
      @if (Auth::user()) 
                <ul class="navbar-nav ml-auto "> 
                    <li class="nav-item dropdown"> 
                      <a class="nav-link dropdown-toggle style" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Hello <b>{{ Auth::user()->name }}</b>!
                      </a>
            
                      
            
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a href="{{ url('manage/updateuser/'.$section->id) }}" class="btn btn-warning">Edit</a> --}}
                        <a class="dropdown-item" href="{{ url('manage/update/'.Auth::user()->id) }}">
                          My Profile
                        </a> 
            
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                        
            
                      </div>
                  </li> 
                     
                  </ul>
                  @endif
</nav>