@extends('layouts.app')
@section('title', "All Files")
@section('content')
<div class="text-center h2">
    Upload New File
</div>
<div class="row"> 
      
<div class="col-6">
    <div>
        correspondence info
    </div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               {{ "$correspondence->code" }}
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>{{ $correspondence->object }}</strong>
              <div>
                Source : {{ $correspondence->source }}    
            </div> 

            <div>
                Destination : {{ $correspondence->destination }}    
            </div>
            </div>
          </div>
        </div>
      </div>
<form action="{{ route('files.store',$correspondence) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
             <label for="title" class="form-label">File name</label>
             <input type="text" class="form-control" id="title" name="title">
           </div>
 
         <div>
             <label for="file" class="form-label">Upload file</label>
             <input class="form-control form-control-lg" id="file" type="file" name="file">
             <p class="mt-1 text-sm text-success" id="file_input_help">Supported : PDF, PNG, JPG .</p>
         </div>
     <button type="submit" class="btn btn-secondary btn-lg">Upload</button>
 </form>

</div>

</div>
    
@endsection
