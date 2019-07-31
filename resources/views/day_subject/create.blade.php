@extends('layouts.backend')

@section('title', 'Assignation emploi du temps')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Assignation emploi du temps</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Assignation emploi du temps</li>
                <a href="{{ route('sessions.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste session</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle assignation</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('day.subject.store', [$timetable->id, $day->id])]) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Jour</label>
                                        <input type="text" name="" id="" class="form-control" value="{{ $day->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group @if ($errors->has('subject')) has-danger @endif">
                                        <label class="control-label">Matière*</label>
                                        <select class="form-control @if ($errors->has('subject')) form-control-danger @endif" name="subject" id="subject">
                                            <option value="">--</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('subject')) <p class="form-control-feedback">{{ $errors->first('subject') }}</p> @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group @if ($errors->has('professor')) has-danger @endif">
                                        <label class="control-label">Professeur*</label>
                                        <select class="form-control @if ($errors->has('professor')) form-control-danger @endif" name="professor" id="professor">
                                            <option value="">--</option>
                                        </select>
                                        @if ($errors->has('professor')) <p class="form-control-feedback">{{ $errors->first('professor') }}</p> @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group @if ($errors->has('start')) has-danger @endif">
                                        <label class="control-label">Début*</label>
                                        {!! Form::text('start', null, ['class' => "form-control @if ($errors->has('start')) form-control-danger @endif", 'data-mask' => "99:99"]) !!}
                                        @if ($errors->has('start')) <p class="form-control-feedback">{{ $errors->first('start') }}</p> @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group @if ($errors->has('end')) has-danger @endif">
                                        <label class="control-label">Fin*</label>
                                        {!! Form::text('end', null, ['class' => "form-control @if ($errors->has('end')) form-control-danger @endif", 'data-mask' => "99:99"]) !!}
                                        @if ($errors->has('end')) <p class="form-control-feedback">{{ $errors->first('end') }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button>
                            <a  href="{{url()->previous()}}" class="btn btn-danger">Annuler</a>
                        </div>
                    {!! Form::close() !!}
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#subject').change(function() {
                $('#professor').empty();
                if($('#subject').val().toString() !== null && $('#subject').val().toString() !== '') {
                    var subjectValue = $('#subject').val().toString();
                    $.get('/api/subject/'+subjectValue+'/professors', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#professor').append('<option value="" selected>--</option>');
                            $.each(data, function(index, professor){
                                $('#professor').append('<option value="' + professor.id + '">' + professor.nom + ' ' + professor.prenoms + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection