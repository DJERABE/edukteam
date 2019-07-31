@extends('layouts.backend')

@section('title', 'Assigner Matière a un professeur')

@section('css')
<link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="row page-titles">


        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"> Assigner Matière a un professeur</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active"> Assigner Matière a un professeur</li>
                </ol>
                @can('add_schools')
                    <a href="{{ route('professeursMatieres.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nouvelle Assignation</a>
                @endcan
            </div>
        
    </div>
    <div class="row">
        <div class="col-12">

              <form action="{{ route('prof_matiere') }}" method="post">
            {{ csrf_field() }}

            <div class="row">

    <div class="col-md-3">
        <div class="form-group @if ($errors->has('school_id')) has-danger @endif">
            <label class="control-label">Ecole*</label>
            <select class="select2 form-control @if ($errors->has('school_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school_id" id="school" >
                <option value="">----</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->nom }}</option>
                @endforeach
            </select>
               
            @if ($errors->has('school_id')) <p class="form-control-feedback">{{ $errors->first('school_id') }}</p> @endif
        </div>
        
    </div>


        <div class="col-md-3">
        <div class="form-group @if ($errors->has('annee_id')) has-danger @endif" id="annee-form-group">
            <label class="control-label">Annee Academique*</label>
            <select class="select2 form-control @if ($errors->has('annee_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="annee_id"  id="annee">
                <option value="">---</option>
                @foreach($annees as $annee)
                {{-- <option value="{{ $annee->id }}">{{ $annee->session_name }}</option> --}}
                @endforeach
                
            </select>
            @if ($errors->has('annee_id')) <p class="form-control-feedback">{{ $errors->first('annee_id') }}</p> @endif
        </div>
    </div>



        <div class="col-md-3">
          <div class="form-group @if ($errors->has('professeur_id')) has-danger @endif" id="professeur-form-group">
            <label class="control-label">Professeurs*</label>

       <select class="select2 form-control @if ($errors->has('professeur_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="professeur_id" id="professeur">
                <option value="">---</option>
             
                      
            </select>
                        
            @if ($errors->has('professeur_id')) <p class="form-control-feedback">{{ $errors->first('professeur_id') }}</p> @endif
        </div>
    </div>



       <div class="col-md-2">
      
            <br>
            <div class="form-actions">
            <button type="submit" class="btn btn-success" style="margin-top:6px "> <i class="fa fa-check"></i> Valider
            </button>
                        
          </div>
    
    </div>

    </div>

</form>
            <div class="card">
    

                <div class="card-body">
                    @include('flash::message')
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                          {{--         <th>Professeur</th> --}}
                                    <th>Matière</th>
                                    <th>Terms</th>
                                    <th>Classe</th>
                                    <th> Periode</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  @foreach($users as $user)

                                        @foreach($user->matieres as $value) --}}

                                    @if(isset($matieres_profs) && !empty($matieres_profs))

                                        @foreach($matieres_profs as $matieres_prof)
                                <tr>
                                   
                                   
                                    <td>{{ $matieres_prof->nom_matiere }}</td>
                                    <td>term</td>
                                    <td>class</td>
                                    <td>periode</td>
                                    <td>
                                        @include('components._actions', [
                                            'entity' => 'professeursMatieres',
                                            'id' => $matieres_prof->id
                                        ])
                                    </td>
                        </tr>

                        @endforeach

                        @endif
{{--                                 @endforeach
                                @endforeach --}}
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
     <script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script>
            $(".select2").select2();
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
    </script>

     @include('professeurs_matieres._script')
@endsection