@extends('layouts.app')
@section('title', "Tous les départements")
@section('content')    
<div class="h2">
  Tous les départements
<div>
    <a href="{{ route('departments.create') }}">Créer nouveau</a>
</div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du département</th>
      <th scope="col">Créé à</th>
      <th scope="col">Mis à jour à</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($departments as $department)
      <tr>
       <td> {{ ($loop->index) + 1 }} </td>
       <td> {{ $department['name'] }} </td>
       <td> {{ $department['created_at'] }} </td>
       <td> {{ $department['updated_at'] }} </td>
       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('departments.edit',$department) }}" class="btn btn-dark">Modifier</a>
          </div>
          <div class="col-6">
            <form action="{{ route('departments.destroy', $department) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce département ?');" class="btn btn-danger">Supprimer</button>
          </form>  
          </div>
        </div>
       </td>
      </tr>
       @endforeach
  </tbody>
</table>
{{-- Pagination --}}
{{ $departments->links() }}
@endsection
