@extends('layouts.backend')

@section('title', 'Factures')

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
            <h4 class="text-themecolor">Factures</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Factures</li>
                    <li class="breadcrumb-item active">Nouvelle facture</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle facture</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('student_bills.create2')]) !!}
                        <div class="form-body">
                            @include('student_bills._form')
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
    <script src="/js/pages/mask.js"></script>
    <script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script>
            $(".select2").select2();
    </script>
    
    <script>
        $( document ).ready(function() {
            $('#school').on('change', function(e) {
                var school_id = e.target.value;

                if(school_id !== null) {
                    $.get('/api/schools/'+ school_id + '/academicyears' , function(data) {
                        if(data) {
                            $('#academic_year').empty();                      
                            $('#academic_year').append('<option value="">---</option>');
                            $.each(data, function(index, academic_year) {
                                $('#academic_year').append('<option value="' + academic_year.id + '">' + academic_year.name +'</option>');        
                            });
                        }
                    });
                    $.get('/api/schools/'+ school_id + '/classes' , function(data) {
                        if(data) {
                            $('#classe').empty();                      
                            $('#classe').append('<option value="">---</option>');
                            $.each(data, function(index, classe) {
                                $('#classe').append('<option value="' + classe.id + '">' + classe.name +'</option>');        
                            });
                        }
                    });
                }
            });

            $('#classe').on('change', function(e) {
                var classe_id = e.target.value;

                if(classe_id !== null) {
                    $.get('/api/classes/'+ classe_id + '/students' , function(data) {
                        if(data) {
                            $('#student').empty();                      
                            $('#student').append('<option value="">---</option>');
                            $.each(data, function(index, student) {
                                $('#student').append('<option value="' + student.id + '">'+ student.last_name +' '+ student.given_names +'</option>');        
                            });
                        }
                    });
                }
            });
        });
    </script>
   
@endsection