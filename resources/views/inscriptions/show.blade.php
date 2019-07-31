@extends('layouts.backend')

@section('title', 'Inscriptions')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Inscriptions</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Inscriptions</li>
                    <li class="breadcrumb-item active">Détails inscription</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Détails inscription</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-body">
                            <h4 class="card-title">Informations de lélève</h4>
                            <hr >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Matricule</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->matricule }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->last_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Prénoms</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->given_names }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date de naissance</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->dob }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Lieu de naissance</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->place_birth }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nationalité</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->citizenship }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Adresse géographique</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->address }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Region</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->county }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">District</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->district }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Numero de rue</label>
                                        <input type="text" class="form-control" value="{{ $inscription->student->street_no }}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="card-title">Renseignements académiques</h4>
                            <hr >
                            <table class="table">
                                <thead>
                                    <th>Ecole</th>
                                    <th>Année académique</th>
                                    <th>Classe</th>
                                    <th>Etablissement précédent</th>
                                    <th>Dossier scolaire</th>
                                </thead>
                                <tbody>
                                    @foreach($inscription->student->inscriptions as $inscription)
                                    <td>{{ $inscription->school->nom }}</td>
                                    <td>{{ $inscription->academic_year->name }}</td>
                                    <td>{{ $inscription->class->name }}</td>
                                    <td>{{ $inscription->previous_school }}</td>
                                    <td><a href="/images/academicfiles/{{ $inscription->academic_file }}" class="btn btn-info"><i class="fa fa-download"></i></a></td>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <h4 class="card-title">Informations parentales</h4>
                            <hr >
                            @if($inscription->student->guardians->count() > 0)
                            @else
                                <a href="{{ route('guardians.add', $inscription->student->id) }}" target="_blank" class="btn btn-warning">Ajouter un parent</a>
                            @endif
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
    <script src="/js/pages/mask.js"></script>
@endsection