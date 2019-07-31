@extends('layouts.backend')

@section('title', 'Configurations de frais')

@section('css')
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
                </ol>
                @can('add_expense-configurations')
                    <a href="{{ route('expense-configurations.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nouvelle configuration</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Recherche configuration</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('recherche.stor')]) !!}
                        <div class="form-body"> 
                            <div class="row">  

                            <div class="col-md-4">
                                <div class="form-group @if ($errors->has('annee')) has-danger @endif">
                                    <label class="control-label">Niveau*</label>
                                    <select class="select2 form-control @if ($errors->has('annee')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="annee" id="annee">
                                        <option value="">---</option>
                                        @foreach($academique as $school)
                                                <option value="{{ $school->id }}" @if( isset($fraisConfig->school) && !empty($fraisConfig->school) && $school->id == $fraisConfig->school->id ) {{ ' selected' }} @endif >{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('annee')) <p class="form-control-feedback">{{ $errors->first('annee') }}</p> @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if ($errors->has('niveau')) has-danger @endif">
                                    <label class="control-label">Niveau*</label>
                                    <select class="select2 form-control @if ($errors->has('niveau')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="niveau" id="annee">
                                        <option value="">---</option>
                                        @foreach($niveaux as $school)
                                                <option value="{{ $school->id }}" @if( isset($fraisConfig->school) && !empty($fraisConfig->school) && $school->id == $fraisConfig->school->id ) {{ ' selected' }} @endif >{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('niveau')) <p class="form-control-feedback">{{ $errors->first('niveau') }}</p> @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button> 
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if ($datas->count() !=0)
        
  
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('flash::message')
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ecole</th>
                                    <th>Année académique</th> 
                                    <th>Niveau</th>
                                    <th>Frais</th>
                                    <th>Montant</th>
                                    <th>Obligatoire</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $expense)
                                <tr>
                                    <td>{{ $expense->school->nom }}</td>
                                    <td>{{ $expense->academic_year->name }}</td>
                                    <td>{{ $expense->studylevel->name }}</td>
                                    <td>{{ $expense->expense->name }}</td>
                                    {{-- <td>{{ $expense->amount }}</td> --}}
                                    <td>{{  number_format($expense->amount)}} FCFA</td>
                                    <td>@if($expense->is_required == 1) <span>Oui</span> @else <span>Non</span> @endif</td>
                                    <td> @include('components._actions', ['entity' => 'expense-configurations', 'id' => $expense->id ])</td>
                                </tr> 
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
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
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
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