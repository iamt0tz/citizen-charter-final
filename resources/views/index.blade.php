 
<!DOCTYPE html> 
<html lang="en">
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
ion-icon {
  font-size: 200px !important;
    max-width: 70% !important;
  color: #007bff !important;
}

.padding{
    /* padding-top: 30px !important; */
    /* padding-bottom: 30px !important; */
      
}
 
.img-fluid{
    max-width:50% !important;
    display: block !important;
    margin: 0 auto !important; 
  /* position: absolute !important; */
}
 
.card{
    background: transparent !important;
    box-shadow: 0 0 0px rgba(0,0,0,0), 0 0px 0px rgba(0,0,0,0) !important;
}
.h1{
    color: #010101b5 !important; 
}
.r{
    max-width: 40% !important; 
    background-color: red !important;
}

 


   </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
   
  {{-- @include('navbar')  --}}
  <!-- /.navbar --> 

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <div class="container-fluid ">
        <div class="row padding ">
          <div class="col-sm-12   ">
            <img src="../../dist/img/final.png"  class="img-fluid "      >
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <div class="col-12">
            <div class="card  ">
              {{-- <div class="card-header">
                <h4 class="card-title">Ekko Lightbox</h4>
              </div> --}}
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6 "> 
                        <center>
                        <a href="/home"  data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery"> 
                            <ion-icon name="newspaper"></ion-icon>
                        </a>
                        </center> 
                    <h5 class="text-center">View Citizen's Charter</h5>
                  </div>
                  <div class="col-sm-6  "> 
                      <center>
                    <a href="/manage" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery"> 
                        <ion-icon name="cog"></ion-icon>
                    </a>
                      </center> 
                    <h5 class="text-center m-t-55">Manage Citizen's Charter</h5>
                  </div>
                   
                  </div>
                </div>
                <div class="card-body"> 
                     <h1 class="text-center brand-text font-weight-wide text-xl font-weight-bold h1">Welcome to DSWD - Field Office 7<br /> Citizen's Charter</h1> 
                </div>
              </div> 
              {{-- end of card --}}

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
</body>
</html>



