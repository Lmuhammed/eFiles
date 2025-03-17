@extends('layouts.app')
@php
    $fileName=$file['title'];
@endphp
@section('title', "eFiles - $fileName")
@section('content')

<div class="mx-2 my-2 px-2 py-2">
    <div class="row">
        <div class="col-md-8 h5">
            <div class="card">
                <div class="card-header">
                    File info
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                    <p><strong>File Name :</strong> <span> {{ $file['title'] }} </span></p>
                    <p><strong>Upload Date :</strong> <span > {{ $file['created_at'] }} </span></p>
                    <p><strong>Update Date :</strong> <span>{{ $file['created_at'] }}</span></p>
                    <p><strong>Requires approval :</strong> <span> {{ $file['requires_approval'] ? "YES" : "NO" }} </span></p>
                    </div>
                    <div class="col-4">
                        <hr>
                        <p><strong>Preview :</strong></p>
                        <iframe src="{{ $file['file_path'] }}" frameborder="0"></iframe>   
                        <hr>
                        <div class="row">
                            <p><strong>Actions :</strong></p>
                            <div class="col-8">
                                <a target="_blank" href="{{ $file['file_path'] }}" class="btn btn-dark">Open in new tab</a>
                            </div>
                            <div class="col-4">
                              <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this file ?');" class="btn btn-danger">Delete</button>
                            </form>  
                            </div>
                        </div>     
                    </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>

@if ( ! (Auth::user()->role === "employee") )

{{-- Table department can acsses --}}
<div class="row">
    <div class="col-4">
        <div class="h2 text-center border border-dark mb-3">
            Department can acsses
        </div>
    </div>
    
    <div class="col-4">
        <a class="btn btn-dark" target="_blank" href="{{ route('dp_file_grantAccessView',$file) }}">Add</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Department name</th>
        <th scope="col">Date acsses granted</th>
        <th scope="col">Last Update</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($departments as $department)
        <tr>
            <td>{{"1"}}</td>            
            <td>{{ $department->name  }}</td>
            <td>{{ $department->pivot->created_at  }}</td>
            <td >{{ $department->pivot->updated_at  }}</td>
            <td>
                <div>
                    <form action="{{ route('dp_file_revokeAccess', ['file' => $file->id, 'departmentId' => $department->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

{{-- end Table department can acsses --}}
    
@endif

{{-- Table department can Approve --}}
@if ($file->requires_approval)
<div class="row">
    <div class="col-4">
        <div class="h2 text-center border border-dark mb-3">
            Department can Approve
        </div>
    </div>
    
    <div class="col-4">
        <form action="{{ route('dp_file_approveFile', ['file'=>$file,'departmentId' => Auth::user()->department_id]) }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Approve it ?');" class="btn btn-dark">Approve it</button>
        </form>  
    </div>
</div>
@if ( ! (Auth::user()->role === "employee") )

<table class="table">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Department</th>
        <th scope="col">Status</th>
        <th scope="col">Notes</th>
        <th scope="col">Approved at</th>
        <th scope="col">Last Update</th>    
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($file->approvedDepartments as $approvedD)
        <tr>
            <td>{{ "1"  }}</td>
            <td>{{ $approvedD->name  }}</td>
            <td>{{ $approvedD->pivot->status  }}</td>
            <td>{{ '-'  }}</td>
            <td>{{ $approvedD->pivot->created_at  }}</td>
            <td >{{ $approvedD->pivot->updated_at  }}</td>
            <td>
                <div>
                    <form action="{{ route('dp_file_revokeApproval', ['file' => $file->id, 'departmentId' => $department->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endif
@endif

  {{-- end Table department can Approve --}}

@endsection