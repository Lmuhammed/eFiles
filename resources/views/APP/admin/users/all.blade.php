@extends('layouts.app')
@section('title', "All Departments")
@section('content')    
<div class="h2">
    All Users
<div>
    <a href="{{ route('users.create') }}">Create New</a>
</div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Active ?</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
      <tr>
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $user['name'] }} </td>
       <td> {{ $user['email'] }} </td>
       <td> {{ $user['role'] }} </td>
       <td> {{ $user['is_active'] }} </td>
       <td> {{ $user['created_at'] }} </td>
       <td> {{ $user['updated_at'] }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('users.edit',$user) }}" class="btn btn-dark">Edit</a>
          </div>
          <div class="col-6">
            <form action="{{ route('users.destroy', $user) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete this user ?');" class="btn btn-danger">Delete</button>
          </form>  
          </div>
        </div>
       </td>
      </tr>
       @endforeach
    
  </tbody>
</table>
{{-- Pagination --}}
{{ $users->links() }}
@endsection
