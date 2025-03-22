@extends('layouts.app')
@php
    $fileName=$correspondence['object'];
@endphp
@section('title', "eFiles - $fileName")
@section('content')

<div class="mx-2 my-2 px-2 py-2">
    <div class="row">
        <div class="col-md-8 h5">
            <div class="card">
                <div class="card-header">
                    Correspondence info
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                    <p><strong>Code :</strong> <span> {{ $correspondence['code'] }} </span></p>
                    <p><strong>Source :</strong> <span > {{ $correspondence['source'] }} </span></p>
                    <p><strong>Destination :</strong> <span>{{ $correspondence['destination'] }}</span></p>
                    <p><strong>Object :</strong> <span> {{ $correspondence['object']  }} </span></p>
                    <p><strong>Status :</strong> <span> {{ $correspondence['status']  }} </span></p>
                    <p><strong>Type :</strong> <span> {{ $correspondence['type']  }} </span></p>
                    <p><strong>Created_at :</strong> <span> {{ $correspondence['created_at']  }} </span></p>
                    <p><strong>Updated at :</strong> <span> {{ $correspondence['updated_at']  }} </span></p>
                </div>
                 </div>
                     </div>
                    <hr>
                        <div class="row h5">
                            <div class="col-6">
                                Files 
                            </div>
                            <div class="col-3">
                                <a href="{{ route('files.create',$correspondence) }}" class="btn btn-success">Add New </a>
                            </div>
                        </div>
                        
                    <hr>
                    <div class="accordion" id="accordionExample">
                    @foreach ($files as $file)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
                              File No {{ ($loop->index)+1 }}
                             
                            </button>
                          </h2>
                          <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <iframe src="{{ $file['file_path'] }}" frameborder="0"></iframe>   
                            </div>
                          </div>
                           {{-- delete file --}}
                           <div class="col-4">
                            <form action="{{ route('files.destroy', $file) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this file ?');" class="btn btn-danger">Delete</button>
                            </form>  
                        </div>
                        {{-- preview --}}
                        <div class="col-8">
                            <a target="_blank" href="{{ $file['file_path'] }}" class="btn btn-dark">Open in new tab</a>
                        </div>
                        </div>
                        {{-- delete file --}}

                    @endforeach
                </div>
        </div>
    </div>
    
</div>

{{-- Table department can acsses --}}
<div class="row">
    <div class="col-4">
        <div class="h2 text-center border border-dark mb-3">
            Department can acsses
        </div>
    </div>
    
    <div class="col-4">
        <a class="btn btn-dark" target="_blank" href="{{ route('dp_cor_grantAccessView',$correspondence) }}">Add</a>
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
        @foreach ($correspondence->accessDepartments as $department)
        <tr>
            <td>{{"1"}}</td>            
            <td>{{ $department->name  }}</td>
            <td>{{ $department->pivot->created_at  }}</td>
            <td >{{ $department->pivot->updated_at  }}</td>
            <td>
                <div>
                    <form action="{{ route('dp_file_revokeAccess', ['correspondence' => $correspondence, 'departmentId' => $department->id] ) }}" method="POST">
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
@endsection