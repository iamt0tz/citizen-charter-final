@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register a new User') }}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('createUser') }}"> --}}
                        
            <form  method="POST" enctype="multipart/form-data"   action="{{ route('createUser') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
 

                          <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Select Assigned Division') }}</label>

                            <div class="col-md-6">
                                <select name="division" id="division" class="form-control select2" style="width: 100%;">
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" >{{ $division->name }}</option>
                                    @endforeach
                                <input type="hidden" name="selected_division" id="selected_division">
                                </select>
                            </div>
                        </div>
                         
 
          

                        <div class="row mb-3">
                            <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('Admin Account? (No/Yes)') }}</label>
                            <div class="col-md-6"> 
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_admin_checkbox">
                                    <label class="custom-control-label" for="is_admin_checkbox"></label>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Hidden input field to store the checkbox value -->
                        <input type="hidden" id="is_admin" name="is_admin" value="0">
                    


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ URL::route('manage.users')  }}" class="btn btn-outline-secondary">
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


<script>
    // $(document).ready(function () {
        document.addEventListener("DOMContentLoaded", function () {
        var selectedDivisionId = ''; // Initialize the selected division ID

        // Update the event listener for the division dropdown
        var divisionSelect = document.getElementById('division');
        var selectedDivisionInput = document.getElementById('selected_division');

        if (divisionSelect && selectedDivisionInput) {
            divisionSelect.addEventListener('change', function() {
                selectedDivisionId = this.value; // Update the selected division ID
                selectedDivisionInput.value = selectedDivisionId; // Update a hidden input field with the selected division ID
            });
        }

        const is_admin_checkbox = document.getElementById("is_admin_checkbox");
        const is_admin_input = document.getElementById("is_admin");

        is_admin_checkbox.addEventListener("change", function () {
            // Set the hidden input value to 1 if the checkbox is checked, or 0 if it's not
            is_admin_input.value = this.checked ? "1" : "0";
        });
    });  
   
  </script>