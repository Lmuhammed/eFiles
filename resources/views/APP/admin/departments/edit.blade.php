@extends('layouts.app')
@section('title', "Modifier les informations du département")
@section('content')
<div class="text-center h2">
Modifier les informations du département : {{ $department->name }}
</div>
<form action="{{ route('departments.update',$department) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="row">

        <div class="mb-3 col-6">
                <label for="name" class="form-label">Nom du département</label>
                <input type="text" class="form-control border border-4" id="name" name="name" value="{{ $department->name }}">
        
        <div class="d-grid gap-2 mt-2 mb-2">
                <button type="submit" class="btn btn-success btn-lg">Mise à jour</button>
        </div>
        </div>
        </div>
            
 </form>
@endsection
