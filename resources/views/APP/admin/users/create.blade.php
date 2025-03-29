@extends('layouts.app')
@section('title', "Créer nouveau utilisateur")
@section('content')
<div class="text-center h2">
Créer nouveau utilisateur
</div>
<form action="{{ route('users.store') }}" method="post" >
        @csrf
        <div class="row">
                <div class="col-6">
                        <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control border border-4" id="name" name="name">
                        </div>
                        <div class="mb-3">
                                <label for="user_name" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control border border-4" id="user_name" name="user_name">
                        </div>  
                        
                        <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control border border-4" id="password" name="password">
                        </div>

                        <div class="mb-3">
                                <label for="department_id" class="form-label">Choisir département</label>
                                @foreach($departments as $department)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="department_id" id="{{$department->id }}" value="{{ $department->id }}"
                                    <label class="form-check-label" for="{{$department->id}}" >
                                        {{ $department->name }}
                                        
                                    </label>
                                </div>
                            @endforeach
                        </div>
                </div>
               
        </div>
        <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">Créer</button>
        </div>
            
 </form>
    
@endsection
