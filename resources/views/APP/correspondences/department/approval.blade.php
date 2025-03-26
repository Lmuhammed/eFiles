@extends('layouts.app')
@section('title', "Accorder l'accès ")
@section('content')
<div class="h2 text-center border border-dark mb-3 px-1 py-1">
    {{ "Accorder l'accès a " }}
    <a href="{{ route('correspondences.show',$correspondence) }}">{{ $correspondence->code }}</a>
</div>
<div class="h3">
    L'informations de la courrier
    </div>
    <div class="px-2 py-2 mb-3 card">
        <p><strong>Code :</strong> <span id="userEmail"> {{ $correspondence['code'] }} </span></p>
        <p><strong>Objet :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Source :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Destination :</strong> <span id="userPhone"> {{ $correspondence['object'] }} </span></p>
        <p><strong>Créé à :</strong> <span id="userLocation">{{ $correspondence['created_at'] }}</span></p>
        <p><strong>Mis à jour à :</strong> <span id="userLocation">{{ $correspondence['created_at'] }}</span></p>
    </div>
<div class="h3">
    Accorder l'accès 
</div>
<form action="{{ route('dp_cor_approve', $correspondence ) }}" method="POST">
    @csrf
<div class="row my-2">
    @foreach($departments as $department)
                    <div class="col-4">
                        <input class="form-check-input" type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="department_{{ $department->id }}">
                        <label for="department_{{ $department->id }}" class="ml-2 border border-dark px-1 py-1">{{ $department->name }}</label>
                    </div>
    @endforeach
</div>  

        <div class="col-md-6">
                @foreach($departments as $department)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="department_id" id="{{$department->id }}" value="{{ $department->id }}"
                    <label class="form-check-label" for="{{$department->id}}" >
                        {{ $department->name }}
                        
                    </label>
                </div>
            @endforeach
        </div>
        
        <div class="mb-3">
            <label for="note" class="form-label">Message</label>
            <textarea class="form-control" id="note" rows="3" name="note" ></textarea>
        </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success btn-lg">Accorder</button>
    </div>
</form>

@endsection