@extends('layouts.app')
@php
    $courrier=$correspondence['object'] ;
@endphp
@section('title', "$courrier")
@section('content')

<div class="mx-2 my-2 px-2 py-2">
    <div class="row">
        <div class="col-10">
            <div class="h2 text-center border border-dark mb-3">
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
                    <hr>
                        <div class="row h3">
                            <div class="col-8">
                                Fichiers associés 
                            </div>
                            <div class="col-4">
                                <a href="{{ route('files.create',$correspondence) }}" class="btn btn-success">Ajouter nouveau fichier </a>
                            </div>
                        </div>
                        
                    <hr>
                    <div class="accordion" id="accordionExample">
                    @foreach ($files as $file)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
                            No fichier {{ ($loop->index)+1 }}
                             
                            </button>
                          </h2>
                          <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <iframe src="{{ $file['file_path'] }}" frameborder="0"></iframe>   
                            </div>
                          </div>
                           {{-- delete file --}}
                           <div class="col-4">
                            <form action="{{ route('files.destroy', $file) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?');" class="btn btn-danger">Supprimer</button>
                            </form>  
                        </div>
                        {{-- preview --}}
                        <div class="col-8">
                            <a target="_blank" href="{{ $file['file_path'] }}" class="btn btn-dark">Ouvrir dans un nouvel onglet                            </a>
                        </div>
                        </div>
                        {{-- delete file --}}

                    @endforeach
                </div>
        </div>
    </div>
    
</div>

{{-- Table department can acsses --}}
<div class="row">
    <div class="col-10">
        <div class="h2 text-center border border-dark mb-3">
            Les départements ayant accès
        </div>
    </div>
    
    <div class="col-2 ">
        <a class="btn btn-dark" target="_blank" href="{{ route('dp_cor_grantAccessView',$correspondence) }}">Ajouter</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
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
            <td>{{"1"}}</td>            
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

{{-- Table department can Approve --}}
<div class="row">
    <div class="col-10">
        <div class="h2 text-center border border-dark mb-3">
            Liste des approbateurs
        </div>
    </div>
    
    <div class="col-2">
        <form action="{{ route('dp_cor_approve', $correspondence ) }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Approve it ?');" class="btn btn-dark">Approuvez-le</button>
        </form>  
    </div>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Département</th>
        <th scope="col">Status</th>
        <th scope="col">Approuvé à</th>
        <th scope="col">Dernière mise à jour</th>    
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($correspondence->approvedDepartments as $approvedD)
        <tr>
            <td>{{ "1"  }}</td>
            <td>{{ $approvedD->name  }}</td>
            <td>{{ $approvedD->pivot->status  }}</td>
            <td>{{ '-'  }}</td>
            <td>{{ $approvedD->pivot->created_at  }}</td>
            <td >{{ $approvedD->pivot->updated_at  }}</td>
            <td>
                <div>
                    <form action="{{ route('dp_cor_revokeApproval', ['correspondence' => $correspondence, 'departmentId' => $approvedD->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>    

{{-- end Table department can Approve --}}

@endsection