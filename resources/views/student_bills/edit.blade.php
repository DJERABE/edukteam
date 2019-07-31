@extends('layouts.backend')

@section('title', 'Factures')

@section('css')
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
                    <li class="breadcrumb-item active">Modification facture</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Modification facture</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($student_bill, ['method' => 'put', 'route' => ['student_bills.update', $student_bill->id]]) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ecole</label>
                                        <input type="text" value="{{ $student_bill->school->nom }}" class="form-control" readonly>
                                        <input name="school" value="{{ $student_bill->school->id }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Année academique</label>
                                        <input type="text" value="{{ $student_bill->academic_year->name }}" class="form-control" readonly>
                                        <input name="academic_year" value="{{ $student_bill->academic_year->id }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Classe</label>
                                        <input type="text" value="{{ $student_bill->classe->name }}" class="form-control" readonly>
                                        <input name="classe" value="{{ $student_bill->classe->id }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Eleve</label>
                                        <input type="text" value="{{ $student_bill->student->last_name }} {{ $student_bill->student->given_names }}" class="form-control" readonly>
                                        <input name="student" value="{{ $student_bill->student->id }}" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Echeance</th>
                                                <th>Article</th>
                                                <th>Quantité</th>
                                                <th>Prix unitaire</th>
                                                <th>Remise</th>
                                                <th>Montant attendu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($student_bill->expense_configurations->sortByDesc('echeance') as $expense)
                                                <tr>
                                                    <td><span class="label label-info">{{ date('d-m-Y', strtotime($expense->echeance)) }}</span></td>
                                                    <td>{{ $expense->expense->name }}<input value="{{ $expense->id }}" name="article[]" hidden></td>
                                                    <td><input type="number" class="form-control" value="{{ $expense->pivot->quantite }}" name="quantite[]"></td>
                                                    <td><input class="form-control" value="{{ $expense->amount }}" name="unitaire[]" readonly></td>
                                                    <td><input type="number" class="form-control" name="remise[]" min="0" max="1"value="{{ $expense->pivot->remise }}" step="0.01"></td>
                                                    <td><input class="form-control" value="{{ $expense->amount }}" min="0" name="montant_attendu[]" readonly></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button>
                            <button type="button" class="btn btn-danger">Annuler</button>
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