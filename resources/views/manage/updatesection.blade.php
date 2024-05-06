@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update ' . $selectedSection->name)  }}</div>

                <div class="card-body">


            <form  method="POST" 
            enctype="multipart/form-data" 
            id="fileUploadForm" 
            action="{{ url('/manage/editsection/' . $selectedSection->id) }}"> 

            {{-- @dd($selectedSection->id); --}}
            @csrf
            @method('PUT')

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
                <input type="text" name="name" id="name" class="form-control" value="{{ $selectedSection->name ?? '' }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Abbreviation') }}</label> 
              <div class="col-md-8"> 
                <input type="text" name="description" id="name" class="form-control" value="{{ $selectedSection->description ?? '' }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Has External Services') }}</label> 
              <div class="col-md-8">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="has_external_toggle" {{ $selectedSection->has_external ? 'checked' : '' }}>
                  <label class="custom-control-label" for="has_external_toggle">Has External Services </label><i> this will be the basis in displaying the Section</i>
                </div>
                <input type="hidden" name="has_external" id="has_external_input" value="{{ $selectedSection->has_external ? 1 : 0 }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Select File') }}</label> 
              <div class="custom-file col-md-6">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Choose file</label>
              </div>
            </div>


          <!-- /.card-header -->
          
            <b>Note: </b> The system will only accept files in: PDF formats. <p></p> 
            <button type="submit" class="btn btn-primary">Update</button>  
            <a href="{{ URL::route('managesection')   }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a> 
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
<script> 
      var selectedDivisionId = ''; 
      document.getElementById('division').addEventListener('change', function() {
        selectedDivisionId = this.value;  
        document.getElementById('selected_division').value = selectedDivisionId;  
      });

      const hasExternalToggle = document.querySelector('#has_external_toggle');
    const hasExternalInput = document.querySelector('#has_external_input');

    hasExternalToggle.addEventListener('change', function () {
        const newValue = this.checked ? 1 : 0;
        hasExternalInput.value = newValue;
    }); 
 
</script>
<script>
  
  $(document).ready(function () {
        
    $(function () {
            bsCustomFileInput.init();
          }); 

      }); 
</script>
 