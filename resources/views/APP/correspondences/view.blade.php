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
                                <form action="{{ route('files.create')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="correspondence" value="{{ $correspondence->id }}">
                                   <button class="btn btn-success">
                                    Add New
                                   </button>
                                </form>
                            </div>
                        </div>
                        
                    <hr>

                    @foreach ($files as $file)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              File No {{ ($loop->index)+1 }}
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <iframe src="{{ $file['file_path'] }}" frameborder="0"></iframe>   
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    
                  {{--   </div>
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
                    </div> --}}
                 
        </div>
    </div>
</div>


@endsection