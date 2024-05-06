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
        .ico{text-align: center !important;}
        /* #3388ea */
        /* .navbar-toggler-icon{background-color:#ffff !important;} */
</style> 
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="/home" class="navbar-brand ">
      <img src="../../dist/img/dswd_logo.png"   class="brand-image img "  >
      <img src="../../dist/img/insignia.png"  class="brand-image img qwe "  >
      <span class="brand-text font-weight-wide text-xl f"  ><b> Citizen's Charter</b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">

        <li class="nav-item">
          <a href="{{url('/home')}}" class="nav-link style">Divisions</a>
        </li> 
        <li class="nav-item">
          <a href="{{url('/sectionlist')}}" class="nav-link style">Sections</a>
        </li> 
        
        {{-- <li class="nav-item"> 
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a> 
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form> 
        </li>   --}}
        
      </ul>

            
      <ul class="navbar-nav ml-auto "> 
        <li class="nav-item dropdown">
          <a class="nav-link style" href="{{url('/manage')}}"  >
            <ion-icon name="settings-outline" style="ico"></ion-icon>   Manage 
          </a>
 
      </li> 
         
      </ul>
    </div>
       
  </div>
</nav>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>