@extends('layouts.app')
@section('content')
<div class="h5 text-center">
  Bienvenue à {{ env('APP_NAME') }}!
</div>
<div class="row">
    <div class="card w-50 mb-2 col-5">
        <div class="card-body">
          <h5 class="card-title">Connexion</h5>
          <p class="card-text">Connectez-vous si vous avez un compte</p>
          <a href="{{ route('login') }}" class="btn btn-info">Connexion</a>
        </div>
      </div>
      <div class="card w-50 mb-2 col-5">
        <div class="card-body">
          <h5 class="card-title">S'inscrire</h5>
          <p class="card-text">Pas de compte ? </p>
          <a href="{{ route('register') }}" class="btn btn-info">S'inscrire</a>
        </div>
      </div>
</div>

@endsection
