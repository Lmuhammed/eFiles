@extends('layouts.app')
@section('title', "All Files")
@section('content')
<div class="text-center h2">
    List of All Files
</div>
<table class="table">
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
    <tr>
      <th scope="row">1</th>
      @if(! ($files->isEmpty()) )
      @foreach ($files as $file)
       <td> {{ 1 }} </td>
       <td> {{ $file['title'] }} </td>
       <td> {{ $file['requires_approval'] }} </td>
       <td> {{ $file['created_at'] }} </td>
       <td> {{ $file['updated_at'] }} </td>
       <td class="py-3 px-6">
             <a href="{{ route('files.show',$file) }}" class="btn btn-dark">View</a>
       </td>
       @endforeach
      @else
        <div class="h2 text-center text-danger">
          NO Files uploaded yet !
        <a href="{{ route('files.create') }}" class="btn btn-dark">Add new</a>
        </div>
      @endif
    </tr>
  </tbody>
</table>

@endsection
