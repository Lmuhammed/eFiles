@extends('layouts.app')
@section('title', "Mettre à jour les informations")
@section('content')
<div class="text-center h2">
Mettre à jour les informations
</div>
<form action="{{ route('users.update',$user) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-6">
                        <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control border border-4" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border border-4" id="email" name="email" value="{{ $user->email }}">
                        </div>  
                        
                        <div class="mb-3">
                                <label for="password" class="form-label">Configurer nouveau mot de passe</label>
                                <input type="password" class="form-control border border-4" id="password" name="password">
                        </div>
                        <div>
                                Département actuel <p> {{ $user->department->name }}</p>
                        </div>
                        <div class="mb-3">
                                <label for="department_id" class="form-label">Attribuer nouveau département</label>
                                @foreach($departments as $department)
                                @if ($user->department->id !== $department->id)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="department_id" id="{{$department->id }}" value="{{ $department->id }}"
                                    <label class="form-check-label" for="{{$department->id}}" >
                                        {{ $department->name }}
                                        
                                    </label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                </div>
               
        </div>
        <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">Modifier</button>
        </div>
            
 </form>
    
@endsection
