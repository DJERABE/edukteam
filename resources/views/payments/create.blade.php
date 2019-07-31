@extends('layouts.backend')

@section('title', 'Paiements')

@section('css')
    <link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Paiements</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Paiements</li>
                <a href="{{ route('payments.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste paiement</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouveau paiement</h4>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('payments.create2')]) !!}
                        <div class="form-body">
                            @include('payments._form')
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="btn"> <i class="fa fa-check"></i> Valider</button>
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
        jQuery(document).ready(function() {
            $(".select2").select2();
            $('#payment_type_num').hide();

            $("#payment_type").change(function() {
                var paymentTypeValue = $('#payment_type').val().toString();
                if(paymentTypeValue == 2 || paymentTypeValue == 3) {
                    $('#payment_type_num').show();
                } else {
                    $('#payment_type_num').hide();
                }
            });
        });
    </script>

    
   
@endsection