  
 
  @extends('layouts.app')


  @section('content')

          <div class="row">
            <div class="col-12"> 
              <div class="card">
                <div class="card-header d-flex p-0">
                  <h3 class="card-title p-2"><a  class="btn btn-primary" href="/manage/adduser" >Add User <ion-icon name="person-add-outline" color="light"></ion-icon> </a></h3>
                    <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">All Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Active</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Inactive</a></li>
                     
                  </ul>
                </div> 
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                            <table class="table table-hover text-wrap" name="programTable" id="programTable">
                                    <thead>
                                      <tr> 
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>User Type</th> 
                                        <th>Division Assigned</th>   
                                        <th>User Status</th>   
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="user-list">
                                      <tr>
                                        @foreach ($users as $user)
                                        <td>{{ $user->name }}</td> 
                                        <td>{{ $user->email}}</td>  
                                        <td >
                                          @if($user->is_admin)
                                              <h6 style="color:blue">Admin</h6>
                                          @else
                                              <h6 style="color:red">User</h6>
                                          @endif
                                      </td>  
                                      <td>
                                          @if($user->is_admin)
                                              All Divisions
                                          @elseif ($user->division)
                                              {{ $user->division->name }}
                                          @endif
                                      </td>  
                                      <td > 
                                        @if($user->deleted_at != NULL) 
                                          <span class="badge badge-danger">Inactive</span>
                                        @else 
                                          <span class="badge badge-success">Active</span>
                                          
                                        @endif
                                    </td>
                                    
                                    @if($user->deleted_at == NULL)
                                        <td class="t5"> 
                                            <div class="btn-group">
                                                <a href="{{ url('manage/update/'.$user->id) }}" class="btn qwee btn-warning" title="Edit User"> <ion-icon name="create-outline"></ion-icon></a>  
                                                <form method="POST" action="{{ route('delete.user', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <button type="submit" class="btn qwee btn-danger" title="Delete User" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                                </form> 
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                          <a href="{{ url('manage/restore/'.$user->id) }}" 
                                                      class="btn qwee btn-outline-dark" 
                                                      title="Restore User"
                                                      onclick="return confirm('Are you sure you want to restore this user?')" 
                                                      > <ion-icon name="refresh-outline"></ion-icon></a> 
                                        </td>
                                    @endif

                                      </tr>
                                      @endforeach 

                                    </tbody>
                            </table>
                    </div> 
                    <div class="tab-pane" id="tab_2">
                          <table class="table table-hover text-wrap" name="programTable" id="programTable">
                                  <thead>
                                    <tr> 
                                      <th>Name</th>
                                      <th>Email Address</th>
                                      <th>User Type</th> 
                                      <th>Division Assigned</th>   
                                      <th>User Status</th>   
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="user-list">
                                    <tr>
                                      @foreach ($activeUsers as $user)
                                      <td>{{ $user->name }}</td> 
                                      <td>{{ $user->email}}</td>  
                                      <td >
                                        @if($user->is_admin)
                                            <h6 style="color:blue">Admin</h6>
                                        @else
                                            <h6 style="color:red">User</h6>
                                        @endif
                                    </td>  
                                    <td>
                                        @if($user->is_admin)
                                            All Divisions
                                        @elseif ($user->division)
                                            {{ $user->division->name }}
                                        @endif
                                    </td>  
                                    <td > 
                                      @if($user->deleted_at != NULL) 
                                        <span class="badge badge-danger">Inactive</span>
                                      @else 
                                        <span class="badge badge-success">Active</span>
                                        
                                      @endif
                                  </td>
                                  
                                  @if($user->deleted_at == NULL)
                                      <td class="t5"> 
                                          <div class="btn-group">
                                              <a href="{{ url('manage/update/'.$user->id) }}" class="btn qwee btn-warning" title="Edit User"> <ion-icon name="create-outline"></ion-icon></a>  
                                              <form method="POST" action="{{ route('delete.user', $user->id) }}">
                                                  @csrf
                                                  @method('DELETE') 
                                                  <button type="submit" class="btn qwee btn-danger" title="Delete User" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                              </form> 
                                          </div>
                                      </td>
                                  @else
                                      <td>
                                        <a href="{{ url('manage/restore/'.$user->id) }}" 
                                                    class="btn qwee btn-outline-dark" 
                                                    title="Restore User"
                                                    onclick="return confirm('Are you sure you want to restore this user?')" 
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
                                      <th>Name</th>
                                      <th>Email Address</th>
                                      <th>User Type</th> 
                                      <th>Division Assigned</th>   
                                      <th>User Status</th>   
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="user-list">
                                    <tr>
                                      @foreach ($inactiveUsers as $user)
                                      <td>{{ $user->name }}</td> 
                                      <td>{{ $user->email}}</td>  
                                      <td >
                                        @if($user->is_admin)
                                            <h6 style="color:blue">Admin</h6>
                                        @else
                                            <h6 style="color:red">User</h6>
                                        @endif
                                    </td>  
                                    <td>
                                        @if($user->is_admin)
                                            All Divisions
                                        @elseif ($user->division)
                                            {{ $user->division->name }}
                                        @endif
                                    </td>  
                                    <td > 
                                      @if($user->deleted_at != NULL) 
                                        <span class="badge badge-danger">Inactive</span>
                                      @else 
                                        <span class="badge badge-success">Active</span>
                                        
                                      @endif
                                  </td>
                                  
                                  @if($user->deleted_at == NULL)
                                      <td class="t5"> 
                                          <div class="btn-group">
                                              <a href="{{ url('manage/update/'.$user->id) }}" class="btn qwee btn-warning" title="Edit User"> <ion-icon name="create-outline"></ion-icon></a>  
                                              <form method="POST" action="{{ route('delete.user', $user->id) }}">
                                                  @csrf
                                                  @method('DELETE') 
                                                  <button type="submit" class="btn qwee btn-danger" title="Delete User" onclick="return confirm('Are you sure?')"> <ion-icon name="trash-outline"></ion-icon></ion-icon></button>
                                              </form> 
                                          </div>
                                      </td>
                                  @else
                                      <td>
                                        <a href="{{ url('manage/restore/'.$user->id) }}" 
                                                    class="btn qwee btn-outline-dark" 
                                                    title="Restore User"
                                                    onclick="return confirm('Are you sure you want to restore this user?')" 
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

  @endsection
   
           