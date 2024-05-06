<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citizen's Charter</title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  
    <style>
            body{ font-family:"Source Sans Pro","Segoe UI","Roboto","Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol" !important;}
             
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
            .wrap  {  display: flex !important;
            min-height: 100vh !important;
            flex-direction: column !important; min-height:100svh !important;
          }
    
.content-wrapper { height: inherit !important;}
   
   </style>  

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
 
 
        
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
              <a href="/manage" class="navbar-brand ">
                <img src="../../dist/img/dswd_logo.png"   class="brand-image img "  >
                <!-- <img src="../../dist/img/insignia.png"  class="brand-image img qwe "  > removing this as per memo from secretary -->
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
                @if (Auth::user())
                  <li class="nav-item">
                    <a href="{{url('manage/upload')}}" class="nav-link style">Upload</a>
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
                @endif
                
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
         
          <body class="hold-transition layout-top-nav">
         
            <div class="content-wrapper"> 
                <section class="content-header"> 
                    <div class="container-fluid ">   
                        <div class="row col d-flex justify-content-center">                                                                                                                                                                                                                                                                                                                      
                             @yield('content') 
                        </div> 
                    </div> 
                </section>
 
            </div>  
      </body>

{{-- @include('footer') --}}

@extends('footer') 
<script src="../../plugins/jquery/jquery.min.js"></script> 
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../../dist/js/adminlte.min.js"></script> 
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>
