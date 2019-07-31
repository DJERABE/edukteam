@extends('layouts.backend')

@section('title', 'Inscriptions')

@section('css')
    <link rel="stylesheet" href="/node_modules/dropify/dist/css/dropify.min.css">
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
                    <li class="breadcrumb-item active">Nouvelle inscription</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle inscription</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open( ['method' => 'post', 'url' => route('inscriptions.store')] ) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Ecole*</label>
                                        <select class="form-control" name="school" id="school">
                                            <option value="">--</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Année scolaire*</label>
                                        <select class="form-control" name="academic_year" id="academic_year">
                                            <option value="">--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Eleve*</label>
                                        <select class="form-control" name="student" id="student">
                                            <option value="">--</option>
                                            <option value='new-student'>Nouvel eleve</option>
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->last_name }} {{ $student->given_names }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="student-form">
                                <h4 class="card-title">Élève</h4>
                                <hr >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Matricule*</label>
                                            {!! Form::text('matricule', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nom*</label>
                                            {!! Form::text('last_name', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Prénoms*</label>
                                            {!! Form::text('given_names', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Date de naissance*</label>
                                            {!! Form::text('dob', null, ['class' => "form-control required", 'data-mask' => '99/99/9999']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Lieu de naissance*</label>
                                            {!! Form::text('place_birth', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nationalité*</label>
                                            {!! Form::text('citizenship', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Adresse géographique*</label>
                                            {!! Form::text('address', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Region*</label>
                                            {!! Form::text('county', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District*</label>
                                            {!! Form::text('district', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Numéro de rue*</label>
                                            {!! Form::text('street_no', null, ['class' => "form-control required"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr >
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Niveau détude*</label>
                                        <select class="form-control" name="studylevel" id="studylevel">
                                            <option value="">--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Classe*</label>
                                        <select class="form-control" name="class" id="class">
                                            <option value="">--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Ecole précédente*</label>
                                        {!! Form::text('previous_school', null, ['class' => "form-control"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Dossier académique*</label>
                                        {!! Form::file('academic_file', ['id' => "input-file-now", 'class' => "dropify-fr"]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button>
                            <a href="{{url()->previous()}}" class="btn btn-danger">Annuler</a>
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
    <script src="/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="/js/pages/mask.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#student-form').hide();

            $('#school').change(function() {
                $('#studylevel').empty();
                $('#academic_year').empty();
                if($('#school').val().toString() !== null && $('#school').val().toString() !== '') {
                    var schoolValue = $('#school').val().toString();
                    $.get('/api/schools/'+schoolValue+'/studylevels', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#studylevel').append('<option value="" selected>--</option>');
                            $.each(data, function(index, studylevel){
                                $('#studylevel').append('<option value="' + studylevel.id + '">' + studylevel.name + '</option>');
                            });
                        }
                    });
                    $.get('/api/schools/'+schoolValue+'/academicyears', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#academic_year').append('<option value="" selected>--</option>');
                            $.each(data, function(index, academicyear){
                                $('#academic_year').append('<option value="' + academicyear.id + '">' + academicyear.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#studylevel').change(function() {
                $('#class').empty();
                if($('#studylevel').val().toString() !== null && $('#studylevel').val().toString() !== '') {
                    var studylevelValue = $('#studylevel').val().toString();
                    $.get('/api/studylevels/' + studylevelValue + '/classes', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#class').append('<option value="" selected>--</option>');
                            $.each(data, function(index, dataclass){
                                $('#class').append('<option value="' + dataclass.id + '">' + dataclass.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#student').change(function() {
                $('#student-form').hide();
                if($('#student').val().toString() == 'new-student') {
                    $('#student-form').show();
                } else {
                    $('#student-form').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
    
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
    
            // Used events
            var drEvent = $('#input-file-events').dropify();
    
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
    
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
    
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
    
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endsection