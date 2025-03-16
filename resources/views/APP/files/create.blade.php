@extends('layouts.app')
@section('title', "All Files")
@section('content')
<div class="text-center h2">
    Upload New File
</div>
<div class="row">    
<div class="col-6">
<div class="d-flex justify-content-center">
<form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
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
</div>
    
@endsection
