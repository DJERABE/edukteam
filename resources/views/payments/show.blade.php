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
                    <h4 class="m-b-0 text-white">Details paiement</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Reference facture*</label>
                                    <input type="text" value="{{ $payment->student_bill->ref }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Eleve*</label>
                                    <input type="text" value="{{ $payment->student_bill->student->last_name }} {{ $payment->student_bill->student->given_names }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Classe*</label>
                                    <input type="text" value="{{ $payment->student_bill->classe->name }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Montant Recu*</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="montant_recu" value="{{ $payment->montant_recu }}" readonly>
                                        <div class="btn btn-info input-group-addon">FCFA</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Type de paiement*</label>
                                    <input type="text" class="form-control" value="{{ $payment->payment_type->display_name }}" readonly>
                                </div>
                            </div>
                            @if($payment->payment_type->id !== 1)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Numero*</label>
                                        <input type="text" class="form-control" name="payment_type_num" value="{{ $payment->payment_type_num }}" readonly>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Article</th>
                                            <th>Montant attendu</th>
                                            <th>Montant payé</th>
                                            <th>Montant restant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payment->student_bill->expense_configurations as $expense)
                                            <tr>
                                                <td>{{ $expense->expense->name }}<input value="{{ $expense->expense_configuration_id }}" name="article[]" hidden></td>
                                                <td><input class="form-control" value="{{ $expense->pivot->montant_attendu }}" name="montant_attendu[]" readonly></td>
                                                <td><input class="form-control" value="{{ $expense->pivot->montant_paye }}" name="montant_paye[]" readonly></td>
                                                <td><input class="form-control" value="{{ $expense->pivot->montant_restant }}" name="montant_restant[]" readonly></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        });
    </script>
@endsection