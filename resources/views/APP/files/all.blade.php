@extends('layouts.app')
@section('title', "All Files")
@section('content')
@if ( ! (Auth::user()->role === "employee") )
    
<div class="text-center h2">
    List of All Files
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">File Name</th>
      <th scope="col">Requires approval</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @if(! ($files->isEmpty()) )
      @foreach ($files as $file)
      <tr>
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $file['title'] }} </td>
       <td> {{ $file['requires_approval'] ? "YES" : "NO"  }} </td>
       <td> {{ $file['created_at'] }} </td>
       <td> {{ $file['updated_at'] }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('files.show',$file) }}" target="_blank" class="btn btn-dark">View</a>
          </div>
          <div class="col-6">
            <form action="{{ route('files.destroy', $file->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete this file ?');" class="btn btn-danger">Delete</button>
          </form>  
          </div>
        </div>
       </td>
      </tr>
       @endforeach
      @else
        <div class="h2 text-center text-danger">
          NO Files uploaded yet !
        <a href="{{ route('files.create') }}" class="btn btn-dark">Add new</a>
        </div>
      @endif
    
  </tbody>
</table>
@endif

@endsection
