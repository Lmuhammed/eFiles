@extends('layouts.app')
@section('title', "Tous les utilisateurs")
@section('content')    
<div class="h2">
  Tous les utilisateurs
<div>
    <a href="{{ route('users.create') }}">Créer nouveau</a>
</div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Rôle</th>
      <th scope="col">Actif ?</th>
      <th scope="col">Créé le</th>
      <th scope="col">Mis à jour le</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
      <tr>
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $user['name'] }} </td>
       <td> {{ $user['email'] }} </td>
       <td> {{ $user['role'] }} </td>
       <td> {{ $user['is_active'] }} </td>
       <td> {{ $user['created_at'] }} </td>
       <td> {{ $user['updated_at'] }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('users.edit',$user) }}" class="btn btn-dark">Modifer</a>
          </div>
          <div class="col-6">
            <form action="{{ route('users.destroy', $user) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce utilisateur ?');" class="btn btn-danger">Supprimer</button>
          </form>  
          </div>
        </div>
       </td>
      </tr>
       @endforeach
  </tbody>
</table>
{{-- Pagination --}}
{{ $users->links() }}
@endsection
