@extends('layouts.app')
@section('title', "Tout les courriers")
@section('content')
    
    <div class="row mb-3">
      <div class="col-6">
        <div class="h2">
          
          <a href="{{ route('correspondences.index') }}">Tout les courriers</a>
          <div>
            <a class="btn btn-warning mt-2" href="{{ route('correspondences.create') }}">Créer nouveau</a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <form action="{{ route('correspondences.search') }}" method="GET">
          <input type="text" name="search" class="form-control" placeholder="Recher par : Code ,Source ou Destination" value="{{ request('search') }}">
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-sm mt-2">Recher</button>
          </div>
      </form>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code</th>
          <th scope="col">Source</th>
          <th scope="col">Destination</th>
          <th scope="col" >Status</th>
          <th scope="col">Date</th>
          <th scope="col">Créé à</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          @if(! ($correspondences->isEmpty()) )
          @foreach ($correspondences as $correspondence)
          <tr>
           <td> {{ ($loop->index) + 1 }} </td>
           <td> {{ $correspondence['code'] }} </td>
           <td> {{ $correspondence['source'] }} </td>
           <td> {{ $correspondence['destination'] }} </td>
           <td> {{ $correspondence['status'] }} </td>
           <td> {{ $correspondence['date'] }} </td>
           <td> {{ $correspondence['created_at'] }} </td>
           <td>
            <div class="row">
              <div class="col-6">
                <a href="{{ route('correspondences.show',$correspondence) }}" class="btn btn-dark"> Voir</a>
              </div>
              <div class="col-6">
                <form action="{{ route('correspondences.destroy', $correspondence) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce courrier ?');" class="btn btn-danger"> Supprimer</button>
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
