 
  @extends('layouts.app')


@section('content')
          <div class="row">
            <div class="col-12"> 
              <div class="card">
                <div class="card-header d-flex p-0">
                  <h3 class="card-title p-2"><a  class="btn btn-primary" href="/manage/addsection" >Add Section <ion-icon name="briefcase-outline" color="light"></ion-icon> </a></h3>
                    <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">All Sections</a></li> 
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Inactive Sections</a></li>
                     
                  </ul>
                </div> 
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table class="table table-hover text-wrap" name="programTable" id="programTable">
                                <thead>
                                        <tr> 
                                            <th>Section Name</th>
                                            <th>Division</th>
                                            {{-- <th>Abbreviation</th>   --}}
                                            <th>Has External Service?</th>   
                                            <th>Has file uploaded?</th>   
                                            <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody id="user-list">
                                    <tr>
                                        @foreach ($sections as $section)
                                                <td>{{ $section->name }} ({{ $section->description}})</td> 
                                                
                                                
                                                
                                                {{-- <td>{{ $section->division->description }}</td>  --}}
                                                @if($section->division !== null && $section->division->description !== null)
                                                  <td>
                                                    {{ $section->division->description }}
                                                  </td> 
                                                @else
                                                  <td>
                                                    <h6 style="color:red"> Division not available or currently deleted.</h6>
                                                  </td>
                                              @endif



                                                {{-- <td>{{ $section->description }}</td> --}}
                                                <td >
                                                    @if($section->has_external)
                                                      <h6 style="color:blue">Yes</h6>
                                                    @else
                                                      <h6 style="color:red">No</h6>
                                                    @endif
                                                </td>  
                                                <td >
                                                  {{$section->file}}
                                                  {{-- @if($section->file !=NULL)
                                                      <h6 style="color:blue">Yes</h6>
                                                  @else
                                                      <h6 style="color:red">No</h6>
                                                  @endif --}}
                                              </td> 

                                            @if($section->deleted_at == NULL)
                                                <td> 
                                                    <div class="btn-group">
                                                        <a href="{{ url('manage/updatesection/'.$section->id) }}" class="btn qwee btn-warning" title="Edit Section"> <ion-icon name="create-outline"></ion-icon></a>  
                                                        <form method="POST" action="{{ route('delete.section', $section->id) }}">
                                                            @csrf
                                                            @method('DELETE') 
                                                            <button type="submit" class="btn qwee btn-danger" title="Delete Section" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                                        </form> 
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                <a href="{{ url('manage/restoreSection/'.$section->id) }}" 
                                                            class="btn qwee btn-outline-dark" 
                                                            title="Restore Section"
                                                            onclick="return confirm('Are you sure you want to restore this Section?')" 
                                                            > <ion-icon name="refresh-outline"></ion-icon></a> 
                                                </td>
                                            @endif
                        
                                        
                                    </tr>
                                    @endforeach 
                                    </tbody>
                          </table>
                    </div> 
                    <div class="tab-pane" id="tab_3">
                      <table class="table table-hover text-wrap" name="programTable" id="programTable">
                              <thead>
                                      <tr> 
                                          <th>Section Name</th>
                                          <th>Division</th>
                                          {{-- <th>Abbreviation</th>   --}}
                                          <th>Has External Service?</th>   
                                          <th>Has file uploaded?</th>   
                                          <th>Action</th>
                                      </tr>
                              </thead>
                              <tbody id="user-list">
                                  <tr>
                                      @foreach ($inactiveSection as $inactiveSections)
                                              <td>{{ $inactiveSections->name }} ({{ $inactiveSections->description}})</td> 
                                                
                                                @if($inactiveSections->division !== null && $inactiveSections->division->description !== null)
                                                  <td>
                                                    {{ $inactiveSections->division->description }}
                                                  </td> 
                                                @else
                                                  <td>
                                                    <h6 style="color:red"> Division not available or currently deleted.</h6>
                                                  </td>
                                                @endif


                                                {{-- if ($inactiveSections->division !== null && $inactiveSections->division->description !== null) {
                                                  // $inactiveSections->division is not null, and its description property is not null.
                                                  $description = $inactiveSections->division->description;
                                              } else {
                                                  // Either $inactiveSections->division or its description property is null.
                                                  $description = "Description not available"; // or any other default value or handling you prefer
                                              } --}}

                                                  
                                              
                                              
                                              {{-- <td>{{ $section->description }}</td> --}}
                                              <td >
                                                  @if($inactiveSections->has_external)
                                                    <h6 style="color:blue">Yes</h6>
                                                  @else
                                                    <h6 style="color:red">No</h6>
                                                  @endif
                                              </td>  
                                              <td >
                                                @if($inactiveSections->file !=NULL)
                                                    <h6 style="color:blue">Yes</h6>
                                                @else
                                                    <h6 style="color:red">No</h6>
                                                @endif
                                            </td> 

                                          @if($inactiveSections->deleted_at == NULL)
                                              <td> 
                                                  <div class="btn-group">
                                                      <a href="{{ url('manage/updatesection/'.$inactiveSections->id) }}" class="btn qwee btn-warning" title="Edit Section"> <ion-icon name="create-outline"></ion-icon></a>  
                                                      <form method="POST" action="{{ route('delete.section', $inactiveSections->id) }}">
                                                          @csrf
                                                          @method('DELETE') 
                                                          <button type="submit" class="btn qwee btn-danger" title="Delete Section" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                                      </form> 
                                                  </div>
                                              </td>
                                          @else
                                              <td>
                                              <a href="{{ url('manage/restoreSection/'.$inactiveSections->id) }}" 
                                                          class="btn qwee btn-outline-dark" 
                                                          title="Restore Section"
                                                          onclick="return confirm('Are you sure you want to restore this Section?')" 
                                                          > <ion-icon name="refresh-outline"></ion-icon></a> 
                                              </td>
                                          @endif
                      
                                      
                                  </tr>
                                  @endforeach 
                                  </tbody>
                      </table>
                    </div> 
                  </div> 
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
      </div>
      
      @endsection 

     
  