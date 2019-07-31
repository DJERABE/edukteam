@extends('layouts.backend')

@section('title', 'Comptes')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Comptes</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Comptes</li>
                    <li class="breadcrumb-item active">Nouveau compte</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouveau compte</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('users.store')]) !!}
                        <div class="form-body">
                            @include('users._form')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if ($errors->has('password')) has-danger @endif">
                                        <label class="control-label">Mot de passe par défaut*</label>
                                        <input type="password" class="form-control @if ($errors->has('password')) form-control-danger @endif" name="password" required>
                                        @if ($errors->has('password')) <p class="form-control-feedback">{{ $errors->first('password') }}</p> @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if ($errors->has('password_confirmation')) has-danger @endif">
                                        <label class="control-label">Confirmation du mot de passe*</label>
                                        <input type="password" class="form-control @if ($errors->has('password_confirmation')) form-control-danger @endif" name="password_confirmation" required>
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
@endsection