@extends('layouts.app')
@php
    $courrier=$correspondence['object'] ;
@endphp
@section('title', "$courrier")
@section('content')

<div class="mx-2 my-2 px-2 py-2">
    <div class="row">
        <div class="col-10">
            <div class="h2 border border-dark mb-3 px-1 py-1">
                Les informations de la courrier
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 h5">
            <div class="card">
                <div class="card-header">
                    <p><strong>Code :</strong> <span> {{ $correspondence['code'] }} </span></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                    <p><strong>Source :</strong> <span > {{ $correspondence['source'] }} </span></p>
                    <p><strong>Destination :</strong> <span>{{ $correspondence['destination'] }}</span></p>
                    <p><strong>Object :</strong> <span> {{ $correspondence['object']  }} </span></p>
                    <p><strong>Status :</strong> <span> {{ $correspondence['status']  }} </span></p>
                    <p><strong>Type :</strong> <span> {{ $correspondence['type']  }} </span></p>
                    <p><strong>Créé à :</strong> <span> {{ $correspondence['created_at']  }} </span></p>
                    <p><strong>Mis à jour à :</strong> <span> {{ $correspondence['updated_at']  }} </span></p>
                </div>
                 </div>
                     </div>
                        
        </div>
    </div>
                    <div class="row">
                        <div class="h2 col-8 border border-dark px-1 py-1">
                            Fichiers associés
                        </div>
                        <div class="col-4">
                            <a href="{{ route('files.create',$correspondence) }}" class="btn btn-success">Ajouter nouveau fichier </a>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                       @foreach ($files as $file)   
                            <div class="col-5">
                                <iframe src="{{ url("uploads/$file->file_path") }}" frameborder="1">
                                </iframe>
                                <div class="col">
                                    <a target="_blank" href="{{ url("uploads/$file->file_path") }}" class="btn btn-dark">Visualizer</a>
                                </div>
                            </div> 
                       @endforeach
                    </div>

                          
    
</div>
@can('isAdmin')
{{-- Table department can acsses --}}
<table class="table table-striped">
    <thead class="table-warning">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du département</th>
        <th scope="col">Date d'accès accordée</th>
        <th scope="col">Dernière mise à jour</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($correspondence->accessDepartments as $department)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>            
            <td>{{ $department->name  }}</td>
            <td>{{ $department->pivot->created_at  }}</td>
            <td >{{ $department->pivot->updated_at  }}</td>
            <td>
                <div>
                    <form action="{{ route('dp_cor_revokeAccess', ['correspondence' => $correspondence , 'departmentId' => $department->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous supprimer la permession ?');" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endcan

{{-- Table department can Approve --}}
<div class="row">
    <div class="h2 col-8 border border-dark px-1 py-1">
        Liste des approbateurs
    </div>
    @can('isManager')
    <div class="col">
        <a target="_blank" href="{{ route('dp_cor_grantAccess',$correspondence) }}" class="btn btn-dark">Ajouter</a>
    </div>
    @endcan
    {{-- @can('isEmployee') --}}
    <div class="col-4">
        {{-- <form action="{{ route('dp_cor_approve', $correspondence ) }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Approve it ?');" class="btn btn-success">Approuvez-le</button>
        </form>  --}}
        <a href="{{ route('approveView',$correspondence) }}" class="btn btn-success">Approuvez-le</a>
    </div>
    {{-- @endcan --}}
</div>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Département</th>
        <th scope="col">Status</th>
        <th scope="col">Message</th>
        <th scope="col">Dernière mise à jour</th>    
        {{-- <th scope="col">Actions</th> --}}
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($correspondence->approvedDepartments as $approvedD)
       <tr>
        <td>{{ ($loop->index)+1 }} </td>
        <td>{{ $approvedD->name  }}</td>
        <td>{{ $approvedD->pivot->status  }}</td>
        <td>{{ $approvedD->pivot->message  }}</td>
        <td>{{ $approvedD->pivot->created_at  }}</td>
        {{-- <td >{{ $approvedD->pivot->updated_at  }}</td> --}}
        <td>
            {{-- @can('isEmployee')
            <div>
                <form action="{{ route('dp_cor_revokeApproval', ['correspondence' => $correspondence, 'departmentId' => $approvedD->id] ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
            @endcan --}}
        </td>
        </tr>
     @endforeach
    </tbody>
  </table>    
{{-- end Table department can Approve --}}
@endsection