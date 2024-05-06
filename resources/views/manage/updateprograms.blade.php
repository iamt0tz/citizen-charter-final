{{-- 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form action="{{url('upload')}}" method="post" enctype="multipart/form-data">

		@csrf

	<input type="text" name="name" placeholder="Product Name">

	<input type="text" name="description" placeholder="Product description">

	<input type="file" name="file">

	<input type="submit" >


	</form>

</body>
</html> --}}


 
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
  
  @include('navbar') 
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
            {{-- <h3 class="card-title">Update Program</h3> --}}
            <a href="/manage/programs" class="btn  btn-outline-dark btn-xs"> <i class="fa fa-arrow-left"></i> Back</a>
 
            <form  method="POST" 
            enctype="multipart/form-data" 
            id="fileUploadForm" 
            action="{{ url('/manage/editprograms/' . $selectedProgram->id) }}"
            > 
            {{-- @dd($selectedProgram->id); --}}
              @csrf
              @method('PUT')
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group"> 
                </div>
                <!-- /.form-group -->
 




              <div class="form-group"> 
                {{-- DIVISION DROPDOWN --}} 
                {{-- <select name="division" id="division" class="form-control select2" style="width: 100%;">
                  <option value="">Select Division</option>
                  @foreach ($divisions as $division)
                      <option value="{{ $division->id }}">{{ $division->name }}</option>
                  @endforeach
                </select>  --}}


                    <label for="division" >Select Section:</label> <i>(leave blank if you don't want to upate the Section)</i>
                    <select name="section" id="section" class="form-control select2" style="width: 100%;">
                        <option value="">Select Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select> 
                    <input type="hidden" name="selected_section" id="selected_section">
                  </div>
                  <!-- /.form-group -->

                  {{-- <div class="form-group">
                    <label for="section">Select Section:</label>
                    <select name="section" id="section" class="form-control select2" style="width: 100%;" id="program">
                        <option value="">Select Section</option>
                    </select> 
                    <input type="hidden" name="selected_section" id="selected_section">
                  </div>  --}}
{{-- 
                  <div class="form-group">
                    <label for="section">Select Section:</label>
                    <select name="section" id="section" class="form-control select2" style="width: 100%;" id="program">
                        <option value="">Select Section</option>
                    </select> 
                    <input type="hidden" name="selected_section" id="selected_section">
                  </div>  --}}

              
                  <div class="form-group">
                    <label for="program">Program:</label> 
                    {{-- <select name="program"   class="form-control select2" style="width: 100%;" id="program">
                        <option value="{{$programs->name}}">Select Program</option>
                    </select> --}}
                    {{-- 
                      <option value="">Select Program</option>
                      @foreach($programs as $program)
                          <option value="{{ $program->id }}" {{ $selectedProgram && $program->id == $selectedProgram->id ? 'selected' : '' }}>
                              {{ $program->name }}
                          </option>
                      @endforeach
                  </select> --}}
                  {{-- <select hidden name="program" class="form-control select2" style="width: 100%;" id="program"> --}}

                  <input type="text" name="name" id="name" class="form-control" value="{{ $selectedProgram->name ?? '' }}">
                </div>

                <div class="form-group">
                  <label for="customFile">Citizen's Charter File:</label> 
                  {{-- <p><label for="file">Previous File: </label></p> --}}
                  <div class="custom-file">
                    <input class="custom-file-input" type="file" name="file" id="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>   
                <div class="form-group">
                  <label for="customFile">Steps:</label> 
                    <div class="custom-file">
                    <input class="custom-file-input" type="file" name="steps" id="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>   
                <div class="form-group">
                  <label for="customFile">Requirements:</label> 
                    <div class="custom-file">
                    <input class="custom-file-input" type="file"  name="requirements" id="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div> 
 

                <div class="form-group">
                  <div class="progress" id="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
  
                {{--</div> --}}
                
                

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
 

            @if(session()->has('error'))
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
            @endif
            <b>Note: </b> The system will only accept files in: PDF formats. <p></p>
  

            {{-- @if (isset($selectedProgram) && $selectedProgram->file)
                <a href="{{ route('delete_file', $selectedProgram->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete File</a>
                <form id="delete-form" action="{{ route('delete_file', $selectedProgram->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endif --}}
            <button type="submit" class="btn btn-success">Submit</button> 
               

            
            </form>
                  
          </div>
        </div>
  
   
      </div> 
 
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
          var selectedSectionId = ''; // Initialize the selected section ID

      // Update the event listener for the section dropdown
      document.getElementById('section').addEventListener('change', function() {
        selectedSectionId = this.value; // Update the selected section ID
        document.getElementById('selected_section').value = selectedSectionId; // Update a hidden input field with the selected section ID
      });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/upload.js') }}"></script> --}}
  
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
