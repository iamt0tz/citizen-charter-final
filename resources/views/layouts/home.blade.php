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
             margin-right: 25px !important;
            }
            .qwe{
                margin-right:  15px !important;
            }
         
            span { color: white !important;}
            .style { color: white !important;}
            .navbar-light{background-color: #007bff !important;} 
            .f {font-size: 25px !important; margin-right: 20px !important;}
         /* #3388ea */
         /* .navbar-toggler-icon{background-color:#ffff !important;} */
    
    

         /* start of custom cars */
          
      .card {
        --card-color: #0080ff;
        --blub-color: #52d4eb;
        position: relative;
        user-select: none;
      }

      @keyframes keyframes-rotate-blubs {
        0% {
          transform: translate(10px) rotate(360deg);
        }

        50% {
          transform: translate(-5px, 10px) rotate(180deg);
        }

        100% {
          transform: translate(10px) rotate(0deg);
        }
      }
      .card{
        margin-left: 20px;
        margin-right: 20px;
        border-radius: 0.5rem;
      }

      .card span {
        width: 100px;
        height: 100px;
        position: absolute;
        background: linear-gradient(0deg, transparent, var(--blub-color));
        border-radius: 100%;
        opacity: 0.2;
        animation: keyframes-rotate-blubs 4s infinite linear;

      }

      .card span:nth-child(1) {
        top: -5%;
        left: -5%;
        width: 60px;
        height: 60px;
        animation-delay: .1s;
        opacity: 0.3;
      }

      .card span:nth-child(2) {
        top: 60%;
        left: -20%;
        width: 80px;
        height: 80px;
        animation-delay: .2s;
        opacity: 0.3;
      }

      .card span:nth-child(3) {
        top: 10%;
        left: 60%;
        animation-delay: .3s;
        opacity: 0.6;
      }

      .card span:nth-child(4) {
        top: 70%;
        left: 50%;
        width: 90px;
        height: 90px;
        animation-delay: .4s;
        opacity: 0.4;
      }

      .card div {
        /* backdrop-filter: blur(5px); */
        /* outline: 1px solid var(--card-color); */
        /* color: var(--card-color); */
        color: var(--card-color);
        width: 210px;
        height: 280px;
        border-radius: 5%;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        
      }

      .card div .check {
        fill: var(--card-color);
        width: 25px;
        height: 25px;
        position: absolute;
        top: 0;
        right: 0;
        transform: translate(50%, -50%);
      }

      .card div strong {
        font-size: 1rem;
        font-weight: 1000;
        text-transform: uppercase; 
        color: #6d5858;
      }

      .card div p {
        font-size: 0.8rem;
        /* color: rgb(0, 0, 0); */
      }

      .card div hr {
        border: none;
        border-top: 1px solid var(--card-color);
        opacity: .5;
      }

      .card div button {
        background-color: transparent;
        color: var(--card-color);
        border: none;
        outline: 1px solid var(--card-color);
        border-radius: 1rem;
        padding: .5rem 1rem;
        font-size: 0.8rem;
        font-weight: 900;
        transition: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
        gap: .2em;
        
      }

      /* .card div button .arrow {
        width: 0px;
        height: 20px;
        fill: var(--blub-color);
        transform: scale(0);
        transition: .3s;
      }

      .card div button:hover .arrow {
        width: 20px;
        margin-left: 1em;
        transform: scale(1);
      } */

      .card div button:hover {
        background-color: var(--card-color);
        color: var(--blub-color);
        cursor: pointer;
      }

      
/* FLOATING */ 

.floating-button button {
        background-color: #0080ff;
        color: white;
        box-shadow: #6d5858;
        border: none;
        border-radius: 10px;  
        width: 75px;  
        height: 40px;  
        font-size: 16px;
        cursor: pointer;
    }

    .floating-button button:hover {
        background-color: #0055aa;  
    }
    

/* FLOATING */
@media (min-width: 100px) and (max-width: 1000px) {
    .custmodal {
    /* max-width: 90% !important; */
      /* padding: 2rem !important; */
    } 
    table {
      width: 100%; /* Set the table width to 100% to occupy the entire available space */ 
      display: flex;
      justify-content: center; /* Horizontally center the table */
      align-items: center; /* Vertically center the table */
      /* border-collapse: collapse;  */
      /* This ensures that borders and padding do not add extra spacing */
  }
    td {
    /* border: 1px solid #000; */
    padding: 10px; /* Add padding to all <td> elements for spacing */
    text-align: center; /* Center-align the content within all <td> elements */
    word-spacing: 0%;
  }
  td:first-child,
  td:last-child {
    text-align: left; /* Align the content in the first and last <td> elements to the left */
  }
    .canvas {
      /* background-color: #6d5858; */
      max-width: 100% !important; 
      max-height: 100% !important; 
      /* height: 80% !important;  */
    } 

    /* back button */
    
}

.floating-button {
        position: fixed;
        bottom: 30%; 
        right: 10%; 
        z-index: 1000;  
    }
@media (min-width: 5001px) {
  .custmodal { 
      padding: 0rem !important;
    }

  table {
      width: 100%; /* Set the table width to 100% to occupy the entire available space */ 
      display: flex;
      justify-content: center; /* Horizontally center the table */
      align-items: center; /* Vertically center the table */
      border-collapse: collapse; /* This ensures that borders and padding do not add extra spacing */
  }
    td {
    /* border: 1px solid #000; */
    padding:50px; /* Add padding to all <td> elements for spacing */
    text-align: center; /* Center-align the content within all <td> elements */
  }          
  /* .c {
      display: flex;
      justify-content: center; 
      align-items: center;   
    } */
  
  .canvas { 
      max-width: 100% !important;  
    }

    /* back button */
    /* .floating-button {
        display: none;  
    } */
    
}
.header-tag{
font-weight:500;
padding-top: 15px; 
font-size: 2rem;
  font-weight: 1000;
  text-transform: uppercase; 
  color: #0080ff;
}
hr{ 

width: 80%; 
margin-bottom: 20px;
margin-top: 20px;
height: 0.8px;
border: none;
background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, rgb(29, 110, 241)));

} 
.ico{
  width: 50px !important;
  height: 50px!important;
  position: relative!important;
  top: 15px!important;
  margin-right: 10px!important;
  fill: #0b0000!important; 
}
.content-wrapper { height: inherit !important;}
 
      
    </style>  

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
  
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
              <a href="" class="navbar-brand ">
                <img src="../../dist/img/dswd_logo.png"   class="brand-image img f"  >
                <!-- <img src="../../dist/img/insignia.png"  class="brand-image img qwe "  > removing this as per memo from secretary -->
                <span class="brand-text font-weight-wide text-xl f"  ><b> Citizen's Charter</b></span>
              </a> 
              <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> 
              <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          @if(Route::currentRouteName() == 'home' || Route::currentRouteName() == 'sectionlist' || Route::currentRouteName() == 'section') 
                <!-- Left navbar links --> 
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/home')}}" class="nav-link style">Divisions</a>
                          </li> 
                          <li class="nav-item">
                            <a href="{{url('/sectionlist')}}" class="nav-link style">Sections</a>
                          </li> 
                    </ul> 
                  @endif   
                    <ul class="navbar-nav ml-auto " id="navbarCollapse"> 
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="nav-link dropdown-toggle style"  >
                                {{-- <ion-icon name="settings-outline" style="ico"></ion-icon>   Manage  "  --}} 
                                Settings <ion-icon name="settings-outline" style="ico"></ion-icon>
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                                  <li><a href="{{url('/manage')}}" class="dropdown-item">Manage </a></li>
                    
                                  <li class="dropdown-divider"></li>
                    
                                  <li><a href="/psd" class="dropdown-item">SWAD - Main</a></li>
                                  <li><a href="/swad-bohol" class="dropdown-item">SWAD - Bohol</a></li>
                                  <li><a href="/swad-siquijor" class="dropdown-item">SWAD - Siquijor</a></li>
                                  <li><a href="/swad-negros" class="dropdown-item">SWAD - Negros</a></li> 
                                  <!-- End Level two -->
                            </ul>
                        </li>  
                    </ul> 
             </div> 
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

{{-- @extends('footer')  <!-- jQuery --> --}}

@extends('footer') 


<script src="../../plugins/jquery/jquery.min.js"></script> 
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../../dist/js/adminlte.min.js"></script> 
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="{{ asset('dist/pdfjs-dist/build/pdf.js') }}"></script>

</html>



<div class="modal fade " id="modal-xl" >
  <div class="modal-dialog modal-xl custmodal">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body custmodal">
        <p> &hellip;</p> 
      </div>
      <div class="modal-footer justify-content-right">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
    </div> 
  </div> 
</div> 
