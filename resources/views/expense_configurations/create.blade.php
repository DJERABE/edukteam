@extends('layouts.backend')

@section('title', 'Configurations de frais')

@section('css')
    <link href="/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Configurations de frais</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Configurations de frais</li>
                <a href="{{ route('expense-configurations.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste configuration</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle configuration</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('expense-configurations.store')]) !!}
                        <div class="form-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @include('expense_configurations._form')
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
    <script src="/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script>
            jQuery(document).ready(function() {
                // Switchery
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                $('.js-switch').each(function() {
                    new Switchery($(this)[0], $(this).data());
                });
                // For select 2
                $(".select2").select2();
                $('.selectpicker').selectpicker();
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#school').change(function() {
                $('#studylevel').empty();
                $('#academic_year').empty();
                $('#expense').empty();
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
                    $.get('/api/schools/'+schoolValue+'/expenses', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#expense').append('<option value="" selected>--</option>');
                            $.each(data, function(index, expense){
                                $('#expense').append('<option value="' + expense.id + '">' + expense.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
   
@endsection