@extends('layouts.app')
@section('title', "Update Department")
@section('content')
<div class="text-center h2">
 Edit Department : {{ $department->name }}
</div>
<form action="{{ route('departments.update',$department) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="row">

        <div class="mb-3 col-6">
                <label for="name" class="form-label">Departments name</label>
                <input type="text" class="form-control border border-4" id="name" name="name" value="{{ $department->name }}">
        </div>

        </div>
            <button type="submit" class="btn btn-secondary btn-lg">Update</button>
            
 </form>
    
@endsection
