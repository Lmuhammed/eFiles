@extends('layouts.app')
@section('content')
{{-- <div class="h5 text-center">
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
 --}}

 <h1 class="text-center">Bienvenue sur eFiles</h1>
    <p class="text-center h3 mb-3">Découvrez nos fonctionnalités !</p>

    <div class="row">
      <div class="col-md-4 feature">
        <div class="card bg-danger h4">
          <div class="card-header bg-light h4">{{ __('Fonctionnalité 1') }}</div>
            <div class="card-body">
                <p class="card-text">Interface utilisateur conviviale.</p>
                <p>
                  Une interface intuitive et facile à naviguer pour tous les utilisateurs.
                </p>
            </div>
        </div>
    </div> 
    
    <div class="col-md-4 feature">
      <div class="card bg-warning h4">
        <div class="card-header h4">{{ __('Fonctionnalité 2') }}</div>
          <div class="card-body">
              <p class="card-text">Gestion des utilisateurs.</p>
              <p>
                Possibilité d'ajouter, de modifier ou de supprimer des utilisateurs avec différents niveaux d'accès.
              </p>
          </div>
      </div>
  </div> 
       
  <div class="col-md-4 feature">
    <div class="card bg-info h4">
      <div class="card-header h4 bg-light">{{ __('Fonctionnalité 3') }}</div>
        <div class="card-body">
            <p class="card-text">Partage de documents.</p>
            <p>
              Possibilité de télécharger et de partager des fichiers et des documents en toute sécurité.
            </p>
        </div>
    </div>
</div> 
       
    </div>

    <div class="d-grid gap-2 col-5 mx-auto mb-2 mt-2">
      <a href="{{ route('register') }}" class="btn btn-success btn-lg">S'inscrire</a>
      <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Se connecter</a>
    </div>
@endsection
