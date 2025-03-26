@extends('layouts.app')
@section('title', "All Files")
@section('content')
<div class="text-center h2">
  Télécharger un nouveau fichier
</div>
<div class="row"> 
      
<div class="col-6">
    <div>
      Les informations de la courrier
    </div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               {{ "$correspondence->code" }}
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>{{ $correspondence->object }}</strong>
              <div>
                Source : {{ $correspondence->source }}    
            </div> 

            <div>
                Destination : {{ $correspondence->destination }}    
            </div>
            </div>
          </div>
        </div>
      </div>
<form action="{{ route('files.store',$correspondence) }}" method="post" enctype="multipart/form-data">
        @csrf
 
         <div>
             <label for="file" class="form-label">Fichiers</label>
             <input class="form-control form-control-lg" id="file" type="file" name="files[]" multiple>
             <p class="mt-1 text-sm text-success" id="file_input_help">Extensions de fichier autorisées : PDF, PNG, JPG .</p>
         </div>
          
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-secondary btn-lg">Télécharger</button>
          </div>
 </form>
</div>
</div>
@endsection