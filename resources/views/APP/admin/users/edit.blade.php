@extends('layouts.app')
@section('title', "Mettre à jour les informations")
@section('content')
<div class="text-center h2">
Mettre à jour les informations
</div>

        <div class="row">
                <div class="col-6">
                        <form action="{{ route('users.update',$user) }}" method="post" >
                                @csrf
                                @method('PUT')
                        <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control border border-4" id="name" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                                <label for="user_name" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control border border-4" id="user_name" name="user_name" value="{{ $user->user_name }}">
                        </div>  
                        
                        <div class="mb-3">
                                <label for="password" class="form-label">Configurer nouveau mot de passe</label>
                                <input type="password" class="form-control border border-4" id="password" name="password">
                        </div>
                        <div>
                                Département actuel <p class="border border-1"> {{ $user->department->name }}</p>
                        </div>

                        <select class="form-select mb-3" aria-label="Default select example">
                                <option selected>Attribuer nouveau département</option>
                                @foreach($departments as $department)
                                @if ($user->department->id !== $department->id)
                                <option name="department_id" value="{{$department->id }}" >{{$department->name }}</option>
                                @endif
                            @endforeach
                        </select>
{{-- 
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
                        </div> --}}
                        <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-secondary btn-lg">Modifier</button>
                        </div>
                </form>
                </div> 
        </div>    
@endsection
