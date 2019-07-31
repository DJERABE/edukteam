@extends('layouts.backend')

@section('title', 'Factures')

@section('css')
@endsection

@section('body')
    <div class="row page-titles"> 
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"> Factures</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active"> Factures</li>
                </ol>
                @can('add_student_bills')
                    <a href="{{ route('student_bills.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nouvelle Facture</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('flash::message')
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Eleve</th>
                                    <th>Classe</th>
                                    <th>Montant</th>
                                    <th>Montant payé</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($student_bills as $student_bill)
                                <tr>
                                  <td>{{ $student_bill->ref }}</td>
                                    <td>{{ $student_bill->student->last_name }} {{ $student_bill->student->given_names }}</td>
                                    <td>{{ $student_bill->classe->name }}</td>
                                    <td>{{ $student_bill->montant_total_attendu }} FCFA</td>
                                    <td>{{ $student_bill->montant_total_paye }} FCFA</td>
                                    <td>
                                        @if($student_bill->montant_total_paye == $student_bill->montant_total_attendu)
                                            <span class="label label-success">Soldé !</span>
                                        @elseif($student_bill->montant_total_paye < $student_bill->montant_total_attendu)
                                            <span class="label label-danger">Non-soldé !</span>
                                        @endif
                                    </td>
                                    <td>
                                        @include('components.actions', [
                                            'entity' => 'student_bills',
                                            'id' => $student_bill->id
                                        ])
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
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
    <script src="/node_modules/datatables/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
    </script>
@endsection