{{-- 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">

		@csrf

	<input type="text" name="name" placeholder="Product Name">

	<input type="text" name="description" placeholder="Product description">

	<input type="file" name="file">

	<input type="submit" >


	</form>

</body>
</html> --}}


 
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    .btn-queue {
        padding: 25px;
        font-size: 47px;
        line-height: 36px;
        height: auto;
        margin: 10px;
        letter-spacing: 0;
        text-transform: none;
    }

    .custom {
      
      border-top-left-radius: 0.25rem !important; 
      border-top-right-radius: 0.25rem !important;
      border-bottom-left-radius: 0.25rem !important; 
      border-bottom-right-radius: 0.25rem !important;
        /* width: 850px !important; */
        width: 75% !important;
        height: 200px !important;
        padding: 20px !important;
        font-size: 0.5rem !important;
        /* line-height: 40px !important; */
        height: auto !important;
        margin: 10px !important;
        /* letter-spacing: 1px !important; */
        text-transform: none !important;
    }
    .customfooter{
      padding-top: 1px !important;
    }
    .font{
      font-size: 1rem !important;
    }
    .top{
      height: 120px !important;
    }
    .bottom{
      height: 0px !important;
    }
     
    .custmodal{
      max-width: 90% !important;
      padding: 0rem !important;
      /* margin: 1 !important; */
    }
</style> 
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  
  @include('navbar') 
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
    </section>

    <!-- Main content -->

    {{-- <section class="content">
		THIS IS THE SECTION LIST. A TABLE MUST BE HERE
  	</div> --}}

    {{-- <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                 
                <div class="card-tools"> 
                    <form action="{{ route('programlist') }}" method="GET">
                      <div class="input-group input-group-sm" style="width: 350px;">
                    <input type="text" name="query" id="search" class="form-control float-right" placeholder="Press enter to search" value="{{ request()->input('query') }}"> 
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </form> 
    
    
                  </div>  
                </div>
            </div>
              
              <div class="card-body "> 

                      
              <div class="card-body offset-2">
 
                  @foreach ($programs as $program)
                    <a class="btn btn-block bg-gradient-info btn-flat custom"  href="{{url('/view',$program->id)}}"> {{$program->name}} </a>
                   
                  @endforeach 
              </div>
              </div>
            </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                 
                    <li class="page-item">  {{ $programs->links() }}  </li>  
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div> 
        </div>
      </div>
    </section>  --}}

    
    <div class="content-wrapper">
      {{-- start --}}
     <div class="container-fluid ">
              
      {{-- <hr class="hr" /> --}}
        {{-- <h5 class="marginleft"><center>{{ $item->name }}
          <code>({{ $item->description }})</code></center>
        </h5>  --}}
        <div class="row col d-flex justify-content-center">  
        
          @foreach ($data as $item)
          <div class="col-md-4">  
            <div class="card card-widget widget-user shadow  "> 
              {{-- @php
                $randomClassList = $classLists[array_rand($classLists)];
                $randomClass = $randomClassList[array_rand($randomClassList)];
              @endphp  --}}
              <div class="widget-user-header bg-info top"> 
                <h4 class="widget-user-desc font">{{ $item->name }}</h4>    
              </div>    

              <div class="card-footer customfooter">
                <div class="row"> 

                  <div class="col-sm-4 border-right">
                    <div class="description-block bottom"> 
                      @if ($item->steps )
                      <a class="btn btn-app bg-lightblue shadow" href=""
                      onClick="viewSteps({{$item->id}});"
                         href="" data-toggle="modal" data-target="#modal-xl"
                      > 
                        <i class="fas fa-list-ol"></i> Steps
                      </a> 
                      @endif
                    </div>
                    <!-- /.description-block -->
                  </div>


                  <div class="col-sm-4 border-right ">
                    <div class="description-block ">
                      {{-- @if ($q->file ) --}}
                      <a class="btn btn-app bg-success shadow"  data-id="{{$item->id}}"
                         onClick="view({{$item->id}});"
                         href="" data-toggle="modal" data-target="#modal-xl"
                         > 
                        <i class="fas fa-file-image"></i> Citizen's Charter
                      </a> 
                      {{-- @endif --}}
                    </div> 
                    <!-- /.description-block -->
                  </div> 

                  <div class="col-sm-4  ">
                    <div class="description-block bottom"> 
                    @if ($item->requirements)
                        <a class="btn btn-app bg-lightblue shadow" href=""
                        onClick="viewRequirements({{$item->id}});"
                          href="" data-toggle="modal" data-target="#modal-xl"
                        > 
                        <i class="fas fa-list-ul"></i> Requirements
                      </a>
                    @endif
                    </div>
                    <!-- /.description-block -->
                  </div>

                  
                   
                    
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div> 
          </div>
            
      @endforeach
        <!-- /.row -->
      </div>
 
      <hr class="hr" />
      
      {{-- @include('psd\modal');
        <div id="modal" class="modal"></div> --}}
      
      {{-- end --}}

      <!-- /.container-fluid -->
     </div> 
 
      <script>

        
        
      function view(id) {     
       $.ajax({
                url: '../psd/show-modal/' + id, // Replace with your route to fetch modal content
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
      function viewSteps(id) {     
       $.ajax({
                url: ' ../psd/show-steps/' + id, // Replace with your route to fetch modal content
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

      function viewRequirements(id) {     
       $.ajax({
                url: '../psd/show-requirements/' + id, // Replace with your route to fetch modal content
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

     

    <!-- /.container-fluid -->
   </div>



  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 @include('footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script> 

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

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


</body>
</html>

