@extends('layouts.app')
@section('title', "Create New user")
@section('content')
<div class="text-center h2">
 Create New User
</div>
<form action="{{ route('users.store') }}" method="post" >
        @csrf
        <div class="row">
                <div class="col-6 h3">
                        <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control border border-4" id="name" name="name">
                        </div>
                        <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border border-4" id="email" name="email">
                        </div>  
                        
                        <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control border border-4" id="password" name="password">
                        </div>

                        <div class="mb-3">
                                <label for="department_id" class="form-label">Chose departments</label>
                                @foreach($departments as $department)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="department_id" id="{{$department->id }}" value="{{ $department->id }}"
                                    <label class="form-check-label" for="{{$department->id}}" >
                                        {{ $department->name }}
                                        
                                    </label>
                                </div>
                            @endforeach
                        </div>
                </div>
               
        </div>
            <button type="submit" class="btn btn-secondary btn-lg">Create</button>
            
 </form>
    
@endsection
