@extends('layouts.app')
@section('title', "All Correspondences")
@section('content')
<div class="text-center h2">
    Received  Correspondences
</div>
<table class="table table-hover">
  <thead>
    <th scope="col">#</th>
    <th scope="col">Code</th>
    <th scope="col">Source</th>
    <th scope="col">Destination</th>
    <th scope="col" >Status</th>
    <th scope="col">Created at</th>
    <th scope="col">Updated at</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody>
      @if(! ($correspondences->isEmpty()) )
      @foreach ($correspondences as $correspondence)
        <tr>
          <td> {{ ($loop->index) + 1 }} </td>
        <td> {{ $correspondence['code'] }} </td>
        <td> {{ $correspondence['source'] }} </td>
        <td> {{ $correspondence['destination'] }} </td>
        <td > {{ $correspondence['status'] }} </td>
        <td> {{ $correspondence['created_at'] }} </td>
        <td> {{ $correspondence['updated_at'] }} </td>
        <td>
         <div class="row">
           <div class="col-6">
             <a href="{{ route('correspondences.show',$correspondence) }}" target="_blank" class="btn btn-dark">View</a>
           </div>
           <div class="col-6">
             <form action="{{ route('correspondences.destroy', $correspondence) }}" method="POST">
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
        NO Correspondences !
        <a href="{{ route('correspondences.create') }}" class="btn btn-dark">Add new</a>
      </div>
      @endif
  </tbody>
</table>
{{-- Pagination --}}
{{ $correspondences->links() }}
@endsection
