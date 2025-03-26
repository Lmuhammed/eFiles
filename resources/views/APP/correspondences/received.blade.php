@extends('layouts.app')
@section('title', "Courriers entrants")
@section('content')
<div class="text-center h2">
</div>
@if ($correspondences->isEmpty())
<div class="h1 text-center text-danger">
  AUCUNE courrier !
</div>
@else
<table class="table table-hover">
  <thead>
    <th scope="col">#</th>
    <th scope="col">Code</th>
    <th scope="col">Source</th>
    <th scope="col">Destination</th>
    <th scope="col" >Status</th>
    <th scope="col">Créé à</th>
    <th scope="col">Mis à jour à</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($correspondences as $correspondence)
    <tr>
      <td> {{ ($loop->index) + 1 }} </td>
    <td> {{ $correspondence['code'] }} </td>
    <td> {{ $correspondence['source'] }} </td>
    <td> {{ $correspondence['destination'] }} </td>
    <td > {{ $correspondence['status'] }} </td>
    <td> {{ $correspondence['created_at'] }} </td>
    <td> {{ $correspondence['updated_at'] }} </td>
    <td>
     <div class="row">
       <div class="col-6">
         <a href="{{ route('correspondences.show',$correspondence) }}" target="_blank" class="btn btn-dark">Voir</a>
       </div>
       @can('isAdmin')
       <div class="col-6">
        <form action="{{ route('correspondences.destroy', $correspondence) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce courrier ?');" class="btn btn-danger">Supprimer</button>
      </form>  
      </div>  
       @endcan
     </div>
    </td>
    </tr>
  @endforeach
    @endif 
  </tbody>
</table>
{{-- Pagination --}}
{{ $correspondences->links() }}
@endsection
