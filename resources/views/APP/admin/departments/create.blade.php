@extends('layouts.app')
@section('title', "Create Correspondence")
@section('content')
<div class="text-center h2">
Créer nouveau départemen
</div>
<form action="{{ route('departments.store') }}" method="post" >
        @csrf

        <div class="row">

        <div class="mb-3 col-6">
                <label for="name" class="form-label">Nom du département</label>
                <input type="text" class="form-control border border-4" id="name" name="name">
        </div>

        </div>

        <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">Accorder</button>
        </div>
 </form>
    
@endsection
