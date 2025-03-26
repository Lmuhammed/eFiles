@extends('layouts.app')
@section('title', "Create Correspondence")
@section('content')
<div class="text-center h2">
    Créer une nouvelle courrier
</div>
<form action="{{ route('correspondences.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

        <div class="mb-3 col-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control border border-4" id="code" name="code">
        </div>

        </div>

        <div class="row">

            <div class="mb-4 col-6">
                <label for="source" class="form-label">Source</label>
                <input type="text" class="form-control border border-4" id="source" name="source">
            </div>

            <div class="mb-4 col-6">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" class="form-control border border-4" id="destination" name="destination">
            </div>

        </div>
        
        <div class="mb-4">
            <label for="object" class="form-label">Objet</label>
            <input type="text" class="form-control border border-4" id="object" name="object">
        </div>
        
        <div class="row mb-3">
            <div class="col-6">
                <select name="status" id="status" class="form-select border border-4" aria-label="Default select example">
                    <option selected >Sélectionner statut</option>
                    @forelse ($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @empty
                        <div class="text-center text-danger h5"> AUCUNE Status </div>
                    @endforelse
                </select>
            </div>
            
            <div class="col-6">
                <select name="type" id="type" class="form-select border border-4" aria-label="Default select example">
                    <option selected >Sélectionner le type</option>
                    @forelse ($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @empty
                        <div class="text-center text-danger h5"> AUCUNE types </div>
                    @endforelse
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Remarque</label>
            <textarea class="form-control border border-4" id="note" rows="3" name="note" ></textarea>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg">Créer</button>
        </div>            
 </form>
    
@endsection
