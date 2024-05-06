 
<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Citizen's Chapter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  
  @include('manage/navbar-manage') 
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
    </section>

    <!-- Main content -->
    <section class="content"> 


        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> </h3>
 
            <form  method="POST" enctype="multipart/form-data" id="" action=" {{ route('storeView') }}" >
              @csrf
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 

                <div class="form-group">
                    <label for="title">Title  </label>
                    {{-- <code>.max 30 characters</code> --}}
                    <input type="text" 
                        class="form-control" 
                        name="title"
                        id="title" 
                        placeholder="Enter title for the custom service view">
                  </div>

                  <div class="form-group">
                    <label>Purpose</label>
                    {{-- <textarea class="form-control" rows="4" name="purpose" placeholder="Enter purpose.... (sample: This is for the new building)"></textarea> --}}
                    <input type="text" 
                        class="form-control" 
                        name="purpose"
                        id="purpose" 
                        placeholder="Enter purpose.... (sample: This is for the new building)">
                  </div>


                  <div class="form-group">
                    
                    <label>Select programs/services:</label>
                    @foreach ($programs as $program)
                    <div class="form-check">
                           
                        {{-- <label class="form-check-label" >
                          <input class="form-check-input" name="selectedPrograms[]" type="checkbox" value="{{$program->id}}" >
                          {{$program->name}}</label>  --}}
                          <input type="checkbox" name="selectedProgramIds[]" value="{{ $program->id }}">{{ $program->name }}<br>
   
                          
                          {{-- onClick="check({{$program->id}});" --}}
                         
                        
                      
                    </div>
                    @endforeach
                  </div>
 
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
             
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
   
          </div> 
          
          <!-- /.card-body -->
          <div class="card-footer"> 
            <div id="message" style="display: none;" class="alert alert-success">
          </div>
                      @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 

            {{-- @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
            @endif --}}
            {{-- <b>Note: </b> The system will only accept files in: Image, PDF & Video formats. <p></p> --}}
  

            {{-- @if (isset($selectedProgram) && $selectedProgram->file)
                <a href="{{ route('delete_file', $selectedProgram->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete File</a>
                <form id="delete-form" action="{{ route('delete_file', $selectedProgram->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endif --}}
            <button type="submit" class="btn btn-success btn-lg  ">Create</button> 
              
            @if (isset($selectedProgram) && $selectedProgram->file)
                <button onclick="window.open('{{ route('view_file', $selectedProgram->id) }}', '_blank')">View File</button>
            @endif

            
            </form>
                  
          </div>
        </div>
  
   
      </div>


    
  

 
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    
    <script>
      // function check(id)
      // {
        
      // alert(id);
      // }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/upload.js') }}"></script> --}}
 
    {{-- <script type="text/javascript">

$(document).ready(function () {

  var selectedProgramId = '';
document.getElementById('program').addEventListener('change', function() {
  selectedProgramId = this.value;
          document.getElementById('selected_program').value = selectedProgramId;
          // alert(selectedProgramId);
      });
      


    document.getElementById('division').addEventListener('change', function() {
      var divisionId = this.value;
      var sectionsSelect = document.getElementById('section');
      sectionsSelect.innerHTML = '<option value="">Select Section</option>';

      var selectedDivision = {!! $divisions->toJson() !!}.find(function(division) {
          return division.id == divisionId;
      });

      if (selectedDivision) {
          selectedDivision.sections.forEach(function(section) {
              var option = document.createElement('option');
              option.value = section.id;
              option.text = section.name;
              sectionsSelect.appendChild(option);
          });
      }
      });

      // Populate Programs based on selected Section
      document.getElementById('section').addEventListener('change', function() {
          var sectionId = this.value;
          var programsSelect = document.getElementById('program');
          programsSelect.innerHTML = '<option value="">Select Program</option>';

          var selectedSection = {!! $divisions->toJson() !!}.flatMap(function(division) {
              return division.sections;
          }).find(function(section) {
              return section.id == sectionId;
          });

          if (selectedSection) {
              selectedSection.programs.forEach(function(program) {
                  var option = document.createElement('option');
                  option.value = program.id;
                  option.text = program.name;
                  programsSelect.appendChild(option);
              });
          }
      });
 
  }); 
  //end of document ready
        // });
 
    </script> --}}


    <script>
      
      

  </script>
  

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
{{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
  
  $(function () {
    bsCustomFileInput.init();
  });
  </script>
</body>
</html>
