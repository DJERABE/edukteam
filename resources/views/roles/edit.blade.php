@extends('layouts.backend')

@section('title', 'Rôles')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Rôles</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Rôles</li>
                    <li class="breadcrumb-item active">Modifier rôle</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Modifier rôle</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ] ]) !!}
                        @include('roles._form')
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
@endsection