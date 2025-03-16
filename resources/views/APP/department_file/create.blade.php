@extends('layouts.app')
@section('title', "eFiles - $file->name")
@section('content')
<div class="h2 text-center border border-dark mb-3">
    {{ "Grant Access to " }}
    <a href="{{ route('files.show',$file) }}">{{ $file->title }}</a>
</div>
<div class="h3">
    File info
    </div>
    <div class="px-2 py-2 mb-3 card">
        <p><strong>File Name :</strong> <span id="userEmail"> {{ $file['title'] }} </span></p>
        <p><strong>Upload Date :</strong> <span id="userPhone"> {{ $file['created_at'] }} </span></p>
        <p><strong>Update Date :</strong> <span id="userLocation">{{ $file['created_at'] }}</span></p>
        <p><strong>Requires approval :</strong> <span id="userLocation"> {{ $file['requires_approval'] }} </span></p>
    </div>
<div class="h3">
    Grant Access to 
</div>
<form action="{{ route('dp_file_grantAccess', $file->id) }}" method="POST">
    @csrf
    <input type="hidden" name="file_id" value="{{ $file->id }}">
    @foreach($departments as $department)
            <div class="mb-2">
                <input class="form-check-input" type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="department_{{ $department->id }}">
                <label for="department_{{ $department->id }}" class="ml-2">{{ $department->department_name }}</label>
            </div>
    @endforeach

    <button type="submit" class="btn btn-success">Grant Access</button>
</form>

@endsection