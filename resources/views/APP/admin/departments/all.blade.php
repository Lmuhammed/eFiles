@extends('layouts.app')
@section('title', "All Departments")
@section('content')    
<div class="h2">
    All Departments
<div>
    <a href="{{ route('departments.create') }}">Create New</a>
</div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Department name</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($departments as $department)
      <tr>
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $department['name'] }} </td>
       <td> {{ $department['created_at'] }} </td>
       <td> {{ $department['updated_at'] }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('departments.edit',$department) }}" class="btn btn-dark">Edit</a>
          </div>
          <div class="col-6">
            <form action="{{ route('departments.destroy', $department) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete this Departments ?');" class="btn btn-danger">Delete</button>
          </form>  
          </div>
        </div>
       </td>
      </tr>
       @endforeach
    
  </tbody>
</table>
{{-- Pagination --}}
{{ $departments->links() }}
@endsection
