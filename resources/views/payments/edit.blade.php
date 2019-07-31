@extends('layouts.backend')

@section('title', 'Configurations de frais')

@section('css')
    <link href="/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
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
                <a href="{{ route('payments.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste paiement</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Modication configuration</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($expense_configuration, ['method' => 'PUT', 'route' => ['expense-configurations.update',  $expense_configuration->id ] ]) !!}
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

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Etablissement*</label>
                                        <input class="form-control" type="text" name="" id="" value="{{ $expense_configuration->school->nom }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('studylevel')) has-danger @endif">
                                        <label class="control-label">Niveau d'étude*</label>
                                        <input class="form-control" type="text" name="" id="" value="{{ $expense_configuration->studylevel->name }}" readonly>
                                    </div>         
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('academic_year')) has-danger @endif">
                                        <label class="control-label">Année academique*</label>
                                        <input class="form-control" type="text" name="" id="" value="{{ $expense_configuration->academic_year->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Frais*</label>
                                        <input class="form-control" type="text" name="" id="" value="{{ $expense_configuration->expense->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('amount')) has-danger @endif">
                                        <label class="control-label">Montant*</label>
                                        {!! Form::number('amount', null, ['class' => "form-control @if ($errors->has('amount')) form-control-danger @endif", "step" => "0.01"]) !!}
                                        @if ($errors->has('amount')) <p class="form-control-feedback">{{ $errors->first('amount') }}</p> @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('echeance')) has-danger @endif">
                                        <label class="control-label">Écheance</label>
                                        {!! Form::text('echeance', null, ['class' => "form-control @if ($errors->has('echeance')) form-control-danger @endif", "data-mask" => "9999-99-99"]) !!}
                                        @if ($errors->has('echeance')) <p class="form-control-feedback">{{ $errors->first('echeance') }}</p> @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('is_required')) has-danger @endif">
                                        <input type="checkbox" @if($expense_configuration->is_required == 1) {{ ' checked' }} @endif name="is_required" id="is_required" class="js-switch" data-color="#009efb">
                                        <label for="is_required" class="control-label">Champ obligatoire ?</label>
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
    <script src="/js/pages/mask.js"></script>
    <script src="/node_modules/switchery/dist/switchery.min.js"></script>
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
@endsection