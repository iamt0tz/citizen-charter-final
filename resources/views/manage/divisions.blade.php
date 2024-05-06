  
  @extends('layouts.app')


  @section('content')
  <div class="row">
    <div class="col-12"> 
      <div class="card">
        <div class="card-header d-flex p-0"> 
                  @if(Auth::user()->is_admin)
                    <h3 class="card-title p-2"><a  class="btn btn-primary" href="/manage/add-division" >Add Division <ion-icon name="business-outline" color="light"></ion-icon> </a></h3>
                      <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">All Divisions</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Inactive Divisions</a></li>
                  @endif
                  </ul>
                </div> 
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                            <table class="table table-hover text-wrap" name="programTable" id="programTable">
                                    <thead>
                                      <tr> 
                                        <th>Division</th>
                                        {{-- <th>Email Address</th>
                                        <th>User Type</th> 
                                        <th>Division Assigned</th>  --}}     
                                        <th>Division Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="user-list">
                                      <tr>
                                        @foreach ($divisions as $division)
                                        <td>{{ $division->name }} ({{ $division->description }})</td> 
                                        {{-- <td>{{ $user->email}}</td>   --}}
                                        {{-- <td >
                                          @if($user->is_admin)
                                              <h6 style="color:blue">Admin</h6>
                                          @else
                                              <h6 style="color:red">User</h6>
                                          @endif
                                      </td>   --}}
                                      {{-- <td>
                                          @if($user->is_admin)
                                              All Divisions
                                          @elseif ($user->division)
                                              {{ $user->division->name }}
                                          @endif
                                      </td>   --}}
                                      <td > 
                                        @if($division->deleted_at != NULL) 
                                          <span class="badge badge-danger">Inactive</span>
                                        @else 
                                          <span class="badge badge-success">Active</span>
                                          
                                        @endif
                                    </td>
                                    
                                    @if($division->deleted_at == NULL)
                                        <td> 
                                            <div class="btn-group">
                                                <a href="{{ url('manage/updatedivision/'.$division->id) }}" class="btn qwee btn-warning" title="Edit Division"> <ion-icon name="create-outline"></ion-icon></a>  
                                                
                                              @if(Auth::user()->is_admin)
                                                  <form method="POST" action="{{ route('delete.division', $division->id) }}">
                                                      @csrf
                                                      @method('DELETE') 
                                                      <button type="submit" class="btn qwee btn-danger" 
                                                      title="Delete Division" 
                                                      onclick="return confirm('BE CAREFUL! This will delete sections under this Division. Are you sure you want to proceed?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                                  </form>
                                              @endif  
                                            </div>
                                        </td>
                                      
                                    @else
                                        <td>
                                            <a href="{{ url('manage/restoredivision/'.$user->id) }}" 
                                                class="btn qwee btn-outline-dark" 
                                                title="Restore Division"
                                                onclick="return confirm('Are you sure you want to restore this division?')" 
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
                                        <th>Division</th>
                                        {{-- <th>Email Address</th>
                                        <th>User Type</th> 
                                        <th>Division Assigned</th>  --}}     
                                        <th>Division Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="user-list">
                                    <tr>
                                        @foreach ($inactiveDivisions as $inactiveDivision)
                                        <td>{{ $inactiveDivision->name }} ({{ $inactiveDivision->description }})</td> 
                                        {{-- <td>{{ $user->email}}</td>   --}}
                                        {{-- <td >
                                        @if($user->is_admin)
                                            <h6 style="color:blue">Admin</h6>
                                        @else
                                            <h6 style="color:red">User</h6>
                                        @endif
                                    </td>   --}}
                                    {{-- <td>
                                        @if($user->is_admin)
                                            All Divisions
                                        @elseif ($user->division)
                                            {{ $user->division->name }}
                                        @endif
                                    </td>   --}}
                                    <td > 
                                        @if($inactiveDivision->deleted_at != NULL) 
                                        <span class="badge badge-danger">Inactive</span>
                                        @else 
                                        <span class="badge badge-success">Active</span>
                                        
                                        @endif
                                    </td>
                                    
                                    @if($inactiveDivision->deleted_at == NULL)
                                        <td> 
                                            <div class="btn-group">
                                                <a href=" " class="btn qwee btn-warning" title="Edit Division"> <ion-icon name="create-outline"></ion-icon></a>  
                                                <form method="POST" action="{{ route('delete.division', $inactiveDivision->id) }}">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <button type="submit" class="btn qwee btn-danger" title="Delete Division" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                                </form> 
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ url('manage/restoredivision/'.$inactiveDivision->id) }}" 
                                                class="btn qwee btn-outline-dark" 
                                                title="Restore Division"
                                                onclick="return confirm('Are you sure you want to restore this division?')" 
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
              </div>@if(session()->has('error'))
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
        
 @endsection
      

     