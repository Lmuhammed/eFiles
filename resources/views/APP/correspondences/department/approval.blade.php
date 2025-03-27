@extends('layouts.app')
@section('title', "Approuvez la courrier ")
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
    <hr>
    @if ($correspondence->note)
    <div class="h3">
        Message
        <p>
            <strong>
                {{ $correspondence->note }}
            </strong>
        </p>
    </div>
    @endif
<div class="h3">
    Choisir status 
</div>
<form action="{{ route('dp_cor_approve', $correspondence ) }}" method="POST">
    @csrf
    
    {{-- status --}}
    <div class="row">
    @foreach ($statuseses as $number => $status)
    <div class="col-4 mt-3 h4">
            <input class="form-check-input" type="radio" id="status_{{ $number }}" name="status" value="{{ $number }}" {{ old('status_number') == $number ? 'checked' : '' }}>
            <label class="form-check-label" for="status_{{ $number }}">{{ $status }}</label>
        </div>
    @endforeach
</div>
      <hr>
      {{-- message --}}
    <div class="mb-3 h4 mt-3">
            <label for="message" class="form-label">Message</label>
            <span class="text-danger">
                ⚠️ Ne peut pas dépasser 50 caractères
            </span>
            <textarea class="form-control" id="message" rows="3" name="message" ></textarea>
        </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success btn-lg">Accorder</button>
    </div>
</form>

@endsection