@extends('layouts.app')
@section('title', "Tous les utilisateurs")
@section('content')    
<div class="row mb-2">
  <div class="col-6">
    <div class="h2">
      Tous les utilisateurs
    <div>
        <a href="{{ route('users.create') }}">Créer nouveau</a>
    </div>
    </div>
    
  </div>
  <div class="col-6">
    <form method="GET" action="{{ route('users.index') }}">

      <p class="h4">
        Filtrage
      </p>
      <div class="form-check">
        <label class="form-check-label" for="show_inactive">
          inactif
        </label>
        <input class="form-check-input" type="checkbox" name="show_inactive" value="1" {{ request('show_inactive') ? 'checked' : '' }} id="show_inactive">
      </div>
      
      <label for="role">Par Role :</label>
      <select name="role" id="role" class="form-select">
        <option selected value="">Ouvrez ce menu</option>
          <option value="admin" {{ request('role') == 'amin' ? 'selected' : '' }}>Admin</option>
          <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
          <option value="employee" {{ request('role') == 'employee' ? 'selected' : '' }}>Employé</option>
      </select>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-secondary mt-2">Filter</button>
      </div>
    </form>
  </div>
</div>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">User name</th>
      <th scope="col">Rôle</th>
      <th scope="col">Actif ?</th>
      <th scope="col">Créé le</th>
      <th scope="col">Service</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
      <tr>
        {{-- @dd($user) --}}
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $user['name'] }} </td>
       <td> {{ $user['user_name'] }} </td>
       <td> {{ $user['role'] }} </td>
       <td> {{ $user['is_active'] }} </td>
       <td> {{ $user['created_at'] }} </td>
       <td> {{ $user->department->name }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('users.edit',$user) }}" class="btn btn-dark mb-1">Modifer</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce utilisateur ?');" class="btn btn-danger">Supprimer</button>
          </form>  
        </div>
        <div class="col-6">
          @if (! $user['is_active'])
          <div>
            <form action="{{ route('users.activate',$user) }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir activer cet utilisateur ?');" class="btn btn-success">Activer</button>
            </form>
          </div>
          @else
          <div>
            <form action="{{ route('users.disactivate',$user) }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir désactiver cet utilisateur ?');" class="btn btn-warning">Désactiver</button>
            </form>
          </div> 
          @endif
        </div>
        </div>
       </td>
      </tr>
       @endforeach
  </tbody>
</table>
{{-- Pagination --}}
{{-- {{ $users->links() }} --}}
@endsection
