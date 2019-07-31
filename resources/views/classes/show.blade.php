@extends('layouts.backend')

@section('title', "Classes")

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Classes</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Classes</li>
                <a href="{{ route('classes.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste classe</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle classe</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nom*</label>
                                    <input type="text" class="form-control" value="{{ $classe->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Niveau d'étude*</label>
                                    <input type="text" class="form-control" value="{{ $classe->study_level->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Établissement*</label>
                                    <input type="text" class="form-control" value="{{ $classe->school->nom }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Emplois du temps</h4>
                                <hr>
                                @if($classe->timetables->count() > 0)
                                    <table class="table">
                                        <thead>
                                            <th>Nom</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach($classe->timetables as $timetable)
                                                <tr>
                                                    <td>{{ $timetable->name }}</td>
                                                    <td><a class="btn btn-info" href="{{ route('timetables.show', $timetable->id) }}"><i class="fa fa-eye"></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <a href="{{ route('timetables.create', $classe->id) }}" class="btn btn-info">Ajouter l'emploi du temps</a>
                                @endif
                            </div>
                        </div>
                    </div>
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