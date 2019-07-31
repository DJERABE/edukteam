@extends('layouts.backend')

@section('title', 'Établissements')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Établissements</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Établissements</li>
                    <li class="breadcrumb-item active">Détails établissement</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Détails établissement</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-body">
                            <h4 class="card-title">Établissement</h4>
                            <hr />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <input type="text" class="form-control" value="{{ $school->nom }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Slogan</label>
                                        <input type="text" class="form-control" value="{{ $school->slogan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Site web</label>
                                        <input type="text" class="form-control" value="{{ $school->siteweb }}" readonly>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Contact 1*</label>
                                            <input type="text" class="form-control" value="{{ $school->contact_1 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Contact 2</label>
                                            <input type="text" class="form-control" value="{{ $school->contact_2 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" value="{{ $school->email }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Adresse</label>
                                            <input type="text" class="form-control" value="{{ $school->adresse }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Ville</label>
                                            <input type="text" class="form-control" value="{{ $school->ville->nom }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nom de la banque</label>
                                            <input type="text" class="form-control" value="{{ $school->nom_banque }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nom du compte en banque</label>
                                            <input type="text" class="form-control" value="{{ $school->nom_compte_banque }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">N° du compte</label>
                                            <input type="text" class="form-control" value="{{ $school->numero_compte_banque }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                                <h4 class="card-title">Comptes</h4>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Rôles</th>
                                                <th class="text-nowrap">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($school->users as $user)
                                            <tr>
                                                <td>{{ $user->nom }} {{ $user->prenoms }}</td>
                                                <td>{{ $user->contact_1 }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><span class="label label-info">{{ $user->roles->implode('display_name', ', ') }}</span></td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-original-title="Voir"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="/js/waves.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/custom.min.js"></script>
@endsection