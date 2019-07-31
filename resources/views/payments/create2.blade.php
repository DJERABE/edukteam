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
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('payments.store')]) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Reference Facture*</label>
                                        <input type="text" value="{{ $student_bill->ref }}" class="form-control" readonly>
                                        <input name="student_bill" value="{{ $student_bill->id }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Eleve*</label>
                                        <input type="text" value="{{ $student_bill->student->last_name }} {{ $student_bill->student->given_names }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Classe*</label>
                                        <input type="text" value="{{ $student_bill->classe->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Montant Recu*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="montant_recu" value="{{ $montant_init_recu }}" readonly>
                                            <div class="btn btn-info input-group-addon">FCFA</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Type de paiement*</label>
                                        <input type="text" class="form-control" value="{{ $payment_type->display_name }}" readonly>
                                        <input name="payment_type" value="{{ $payment_type->id }}" hidden>
                                    </div>
                                </div>
                                @if($payment_type->id !== 1)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Numero*</label>
                                            <input type="text" class="form-control" name="payment_type_num" value="{{ $payment_type_num }}" readonly>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Statut</th>
                                                <th>Article</th>
                                                <th>Montant attendu</th>
                                                <th>Montant payé</th>
                                                <th>Montant restant</th>
                                                <th>Montant à payer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($expense_configurations as $expense)
                                                <tr>
                                                    <td>@if($expense['montant_restant'] == 0) {{ 'Soldé' }} @else {{ 'Non-soldé' }}@endif</td>
                                                    <td>{{ \App\Models\ExpenseConfiguration::findOrFail($expense['expense_configuration_id'])->expense->name }}<input value="{{ $expense['expense_configuration_id'] }}" name="article[]" hidden><input value="{{ $expense['unitaire'] }}" name="unitaire[]" hidden><input value="{{ $expense['quantite'] }}" name="quantite[]" hidden><input value="{{ $expense['remise'] }}" name="remise[]" hidden></td>
                                                    <td><input class="form-control" value="{{ $expense['montant_attendu'] }}" name="montant_attendu[]" readonly></td>
                                                    <td><input class="form-control" value="{{ $expense['montant_paye'] }}" name="montant_paye[]" readonly></td>
                                                    <td><input class="form-control" value="{{ $expense['montant_restant'] }}" name="montant_restant[]" readonly></td>
                                                    <td><input class="form-control" value="{{ $expense['montant'] }}" name="montant[]" readonly></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="btn"> <i class="fa fa-check"></i> Valider</button>
                            <button type="button" class="btn btn-inverse">Annuler</button>
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
        });
    </script>
@endsection