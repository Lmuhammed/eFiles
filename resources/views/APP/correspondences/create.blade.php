@extends('layouts.app')
@section('title', "Create Correspondence")
@section('content')
<div class="text-center h2">
 Create New Correspondence
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
            <label for="object" class="form-label">Object</label>
            <input type="text" class="form-control border border-4" id="object" name="object">
        </div>
        
        <div class="row mb-3">
            <div class="col-6">
                <select name="status" id="status" class="form-select border border-4" aria-label="Default select example">
                    <option selected >Select Status</option>
                    @forelse ($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @empty
                        <div class="text-center text-danger h5"> No Status available , <a href="http://">insert here</a>  </div>
                    @endforelse
                </select>
            </div>
            
            <div class="col-6">
                <select name="type" id="type" class="form-select border border-4" aria-label="Default select example">
                    <option selected >Select Type</option>
                    @forelse ($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @empty
                        <div class="text-center text-danger h5"> No Status types , <a href="http://">insert here</a>  </div>
                    @endforelse
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control border border-4" id="note" rows="3" name="note" ></textarea>
        </div>

            <button type="submit" class="btn btn-secondary btn-lg">Create</button>
            
 </form>
    
@endsection
