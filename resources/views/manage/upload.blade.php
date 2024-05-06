@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Upload a file') }}</div> 
                  <div class="card-body">

                    <form  method="POST" enctype="multipart/form-data" id="fileUploadForm" action="{{ route('upload') }}" >
                      @csrf 

                      
                      <div class="row mb-3">
                        <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Select Division') }}</label> 
                        <div class="col-md-6">
                            <select name="division" id="division" class="form-control select2" style="width: 100%;">
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                      
                      <div class="row mb-3">
                        <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Select Section') }}</label> 
                        <div class="col-md-6">
                          <select name="section" id="section" class="form-control select2" style="width: 100%;" id="section">
                            <option value="">Select Section</option>
                          </select> 
                          <input type="hidden" name="selected_section" id="selected_section"> 
                        </div>
                      </div>

                      
                      <div class="row mb-3">
                        <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Select File') }}</label> 
                        <div class="custom-file col-md-6">
                          <input type="file" name="file" class="custom-file-input" id="chooseFile">
                          <label class="custom-file-label" for="chooseFile">Choose file</label>
                        </div>
                      </div>
  

                      <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                             
                            <a href="{{ URL::route('manage')  }}" class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                        </div> 
                      </div> 
                    </form> 
                  </div>  
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
          </div>  
      </div>
  </div> 
@endsection
 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> 
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> 
<script type="text/javascript">

      $(document).ready(function () {


        // var selectedProgramId = '';
        var selectedSectionId = '';
      document.getElementById('section').addEventListener('change', function() {
        selectedSectionId = this.value;
                document.getElementById('selected_section').value = selectedSectionId;
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

           
  $(function () {
            bsCustomFileInput.init();
          }); 

      }); 
</script> 
 
 
  