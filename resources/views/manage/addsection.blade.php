@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Upload a file') }}</div> 
                  <div class="card-body">

                  <form  method="POST" enctype="multipart/form-data" id="fileUploadForm" action="{{ route('addsection') }}" >
                                @csrf 

                                <div class="row mb-3">
                                  <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Select Division') }}</label> 
                                  <div class="col-md-8">
                                    <select name="division" id="division" class="form-control select2" style="width: 100%;">
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                        <input type="hidden" name="selected_division" id="selected_division">
                                    </select>
                                  </div>
                                </div> 
                                <div class="row mb-3">
                                  <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Section Name') }}</label> 
                                  <div class="col-md-8"> 
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Please input section name">  
                                  </div>
                                </div> 
                                <div class="row mb-3">
                                  <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Abbreviation') }}</label> 
                                  <div class="col-md-8"> 
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Please input abbreviation letters">  
                                  </div>
                                </div> 
                          <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                 
                                <a href="{{ URL::route('managesection')  }}" class="btn btn-outline-secondary">
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
          var selectedDivisionId = ''; // Initialize the selected division ID

          // Update the event listener for the division dropdown
          document.getElementById('division').addEventListener('change', function() {
            selectedDivisionId = this.value; // Update the selected division ID
            document.getElementById('selected_division').value = selectedDivisionId; // Update a hidden input field with the selected division ID
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


          });

        $(function () {
          bsCustomFileInput.init();
        });
 
</script>
 