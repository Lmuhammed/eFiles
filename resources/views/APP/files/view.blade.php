@extends('layouts.app')
@section('title', "eFiles - $file->name")
@section('content')
<div class="h2 text-center border border-dark mb-3">
    {{ $file['title'] }}
</div>
<div class="mx-2 my-2 px-2 py-2">
    <div class="row">
        <div class="col-md-4">
            <div class="h3">
            File info
            </div>
            <div class="card">
                <p><strong>File Name :</strong> <span id="userEmail"> {{ $file['title'] }} </span></p>
                <p><strong>Upload Date :</strong> <span id="userPhone"> {{ $file['created_at'] }} </span></p>
                <p><strong>Update Date :</strong> <span id="userLocation">{{ $file['created_at'] }}</span></p>
                <p><strong>Requires approval :</strong> <span id="userLocation"> {{ $file['requires_approval'] }} </span></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="h3">
                Preview
                <a href="{{ $file['file_path'] }}" class="btn btn-dark">Open in new tab</a>
            </div>
            <iframe src=" {{ $file['file_path'] }}" title="{{ $file['title'] }}">
            </iframe> 
        </div>
    </div>
</div>

{{-- Table department can acsses --}}
<div class="h2 text-center border border-dark mb-3">
    Department can acsses
    <a class="btn btn-dark" href="{{ route('dp_file_grantAccessView',$file) }}">Add</a>
</div>
<table class="table">
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
        <th scope="row">1</th>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->department_name  }}</td>
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
{{-- Table department can Approve --}}
@if ($file->requires_approval)
<div class="h2 text-center border border-dark mb-3">
    Department can Approve
    <a class="btn btn-dark" href="{{ route('dp_file_approveFile',$file) }}">Add</a>
</div>
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
        <th scope="row">1</th>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->department_name  }}</td>
            <td>{{ '-'  }}</td>
            <td>{{ '-'  }}</td>
            <td>{{ '-'  }}</td>
            <td>{{ $department->pivot->created_at  }}</td>
            <td >{{ $department->pivot->updated_at  }}</td>
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
{{-- end Table department can Approve --}}

@endsection