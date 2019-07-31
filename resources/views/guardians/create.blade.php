@extends('layouts.backend')

@section('title', 'Parents deleves')

@section('css')
    <link href="/node_modules/wizard/steps.css" rel="stylesheet">
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Parents deleves</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Parents deleves</li>
                    <li class="breadcrumb-item active">Nouveau parent délève</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouveau parent délève</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('guardians.store', $student->id)]) !!}
                    <div class="form-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        @include('guardians._form')
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
    <script src="/node_modules/moment/min/moment.min.js"></script>
    <script src="/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="/node_modules/wizard/jquery.validate.min.js"></script>
    <script src="/node_modules/sweetalert/sweetalert.min.js"></script>
    <script src="/node_modules/wizard/steps.js"></script>
    <script src="/js/pages/mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#school').change(function() {
                $('#niveau').empty();
                $('#annee').empty();
                if($('#school').val().toString() !== null && $('#school').val().toString() !== '') {
                    var schoolValue = $('#school').val().toString();
                    $.get('/api/schools/'+schoolValue+'/niveaux', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#niveau').append('<option value="" selected>--</option>');
                            $.each(data, function(index, niveau){
                                $('#niveau').append('<option value="' + niveau.id + '">' + niveau.nom + '</option>');
                            });
                        }
                    });
                    $.get('/api/schools/'+schoolValue+'/annees', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#annee').append('<option value="" selected>--</option>');
                            $.each(data, function(index, annee){
                                $('#annee').append('<option value="' + annee.id + '">' + annee.session_name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#niveau').change(function() {
                $('#classe').empty();
                if($('#niveau').val().toString() !== null && $('#niveau').val().toString() !== '') {
                    var niveauValue = $('#niveau').val().toString();
                    $.get('/api/niveaux/' + niveauValue + '/classes', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#classe').append('<option value="" selected>--</option>');
                            $.each(data, function(index, classe){
                                $('#classe').append('<option value="' + classe.id + '">' + classe.nom + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection