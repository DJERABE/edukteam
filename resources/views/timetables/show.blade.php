@extends('layouts.backend')

@section('title', 'Emplois du temps')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Emplois du temps</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Emplois du temps</li>
                    <li class="breadcrumb-item active">Détails emploi du temps</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Détails emploi du temps</h4>
                </div>
                <div class="card-body">
                    @include('flash::message')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <input type="text" class="form-control" value="{{ $timetable->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Classe</label>
                                        <input type="text" class="form-control" value="{{ $timetable->class->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Établissement</label>
                                        <input type="text" class="form-control" value="{{ $timetable->school->nom }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Année académique</label>
                                        <input type="text" class="form-control" value="{{ $timetable->academic_year->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Session</label>
                                        <input type="text" class="form-control" value="{{ $timetable->session->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('day.timetable.create', $timetable->id) }}" class="btn btn-info pull-right">Assigner un jour</a>
                                    <h4 class="card-title">Emplois du temps</h4>
                                    <hr ><br >
                                </div>
                                @foreach($timetable->days as $day)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="pull-right">
                                                        {!! Form::open( ['method' => 'delete', 'url' => route('day.timetable.destroy', [$timetable->id, $day->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Êtes-vous sur de vouloir supprimer cet element ?")']) !!} 
                                                            <a href="{{ route('day.subject.create', [$timetable->id, $day->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        {!! Form::close() !!}
                                                    
                                                </div>
                                                <center><h4 class="card-title">{{ $day->name }}</h4></center>
                                                <hr >
                                                <table class="table">
                                                    <thead>
                                                        <th>Heure</th>
                                                        <th>Matière</th>
                                                        <th>Professeur</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($day->subjects as $subject)
                                                            <tr>
                                                                <td>{{ $subject->pivot->start }} - {{ $subject->pivot->end }}</td>
                                                                <td>{{ $subject->name }}</td>
                                                                <td>{{ \App\Models\Professor::find($subject->pivot->professor_id)->nom }} {{ \App\Models\Professor::find($subject->pivot->professor_id)->prenoms }}</td>
                                                                <td>
                                                                    {!! Form::open( ['method' => 'delete', 'url' => route('day.subject.destroy', [$timetable->id, $day->id, $subject->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Êtes-vous sur de vouloir supprimer cet element ?")']) !!} 
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                                    {!! Form::close() !!}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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