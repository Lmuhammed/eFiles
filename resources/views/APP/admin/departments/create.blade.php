@extends('layouts.app')
@section('title', "Create Correspondence")
@section('content')
<div class="text-center h2">
 Create New Department
</div>
<form action="{{ route('departments.store') }}" method="post" >
        @csrf

        <div class="row">

        <div class="mb-3 col-6">
                <label for="name" class="form-label">Departments name</label>
                <input type="text" class="form-control border border-4" id="name" name="name">
        </div>

        </div>
            <button type="submit" class="btn btn-secondary btn-lg">Create</button>
            
 </form>
    
@endsection
