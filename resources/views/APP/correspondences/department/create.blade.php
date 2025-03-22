@extends('layouts.app')
@section('title', "eFiles ")
@section('content')
<div class="h2 text-center border border-dark mb-3">
    {{ "Grant Access to " }}
    <a href="{{ route('correspondences.show',$correspondence) }}">{{ $correspondence->code }}</a>
</div>
<div class="h3">
    Correspondence info
    </div>
    <div class="px-2 py-2 mb-3 card">
        <p><strong>Code :</strong> <span id="userEmail"> {{ $correspondence['code'] }} </span></p>
        <p><strong>Object :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Source :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Destination :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Upload  Date :</strong> <span id="userLocation">{{ $correspondence['created_at'] }}</span></p>
    </div>
<div class="h3">
    Grant Access to 
</div>
<form action="{{ route('dp_cor_grantAccess', $correspondence ) }}" method="POST">
    @csrf
    {{-- <input type="hidden" name="file_id" value="{{ $file->id }}"> --}}
    @foreach($departments as $department)
            <div class="mb-2">
                <input class="form-check-input" type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="department_{{ $department->id }}">
                <label for="department_{{ $department->id }}" class="ml-2">{{ $department->name }}</label>
            </div>
    @endforeach

    <button type="submit" class="btn btn-success">Grant Access</button>
</form>

@endsection