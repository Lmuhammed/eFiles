@extends('layouts.app')
@section('title', "All Files")
@section('content')
<div class="text-center h2">
  Les courrier envoyée
</div>
<table class="table table-hover">
  <thead>
    <tr>
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
    <tr>
      @if(! ($correspondences->isEmpty()) )
      @foreach ($correspondences as $correspondence)
       <td> {{ 1 }} </td>
       <td> {{ $correspondence['code'] }} </td>
       <td> {{ $correspondence['source'] }} </td>
       <td> {{ $correspondence['destination'] }} </td>
       <td> {{ $correspondence['object'] }} </td>
       <td> {{ $correspondence['status'] }} </td>
       <td> {{ $correspondence['created_at'] }} </td>
       <td> {{ $correspondence['updated_at'] }} </td>

       <td>
        <div class="row">
          <div class="col-6">
            <a href="{{ route('correspondences.show',$correspondence) }}" target="_blank" class="btn btn-dark">Voir</a>
          </div>
           <div class="col-6">
            <form action="{{ route('correspondences.destroy', $correspondence) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce courrier ?');" class="btn btn-danger">Supprimer</button>
          </form>  
          </div> 
        </div>
       </td>
      </tr>
       @endforeach
      @else
        <div class="h2 text-center text-danger">
          AUCUNE courrier !
        </div>
      @endif
  </tbody>
</table>
{{-- Pagination --}}
{{ $correspondences->links() }}
@endsection