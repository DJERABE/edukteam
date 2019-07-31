@extends('layouts.backend')

@section('title', ' Assignation de matieres professeur')

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
            <h4 class="text-themecolor"> Assignation Matière aux professeurs</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Assignation Matière aux professeurs</li>
                    <li class="breadcrumb-item active">Nouvelle Assignation Matière aux professeurs</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvelle Assignation Matière aux professeurs</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('store')]) !!}
                        <div class="form-body">
                            @include('professeurs_matieres._form')
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
    <script src="/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script>
            $(".select2").select2();
    </script>

    @include('professeurs_matieres._script')
   
@endsection