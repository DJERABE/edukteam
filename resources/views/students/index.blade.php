@extends('layouts.backend')

@section('title', 'Eleves')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Eleves</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active">Eleves</li>
                </ol>
                @can('add_students')
                    <a href="{{ route('students.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nouvelle inscription</a>
                @endcan
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('flash::message')
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénoms</th>
                                    <th>Classe</th>
                                    <th>Niveau</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->given_names }}</td>
                                    <td>@foreach($student->classes as $class)
                                        {{ $class->name }}
                                    @endforeach</td>
                                    <td>@foreach($student->classes as $class)
                                        {{ $class->study_level->name }}
                                    @endforeach</td>
                                    <td>
                                        @include('components._actions', [
                                            'entity' => 'students',
                                            'id' => $student->id
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

        
    </div> --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Recherche éiève</h4>
            </div>
            <div class="card-body">
                {!! Form::open( ['method' => 'post', 'url' => route('recherches.stor')]) !!}
                    <div class="form-body"> 
                        <div class="row">   
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('annee')) has-danger @endif">
                                        <label class="control-label">Année Accademique*</label>
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
                                        <select class="select2 form-control @if ($errors->has('niveau')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="niveau" id="niveau">
                                            <option value="">---</option>
                                            @foreach($niveaux as $school)
                                                    <option value="{{ $school->id }}" @if( isset($fraisConfig->school) && !empty($fraisConfig->school) && $school->id == $fraisConfig->school->id ) {{ ' selected' }} @endif >{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('niveau')) <p class="form-control-feedback">{{ $errors->first('niveau') }}</p> @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Classe*</label>
                                        <select class="select2 form-control" name="classe" id="classe">
                                            <option value="">--</option>
                                        </select>
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

            $('#niveau').on('change', function(e) {
                var school_id = e.target.value;
                if(school_id !== null) { 
                    $.get('/api/niveau/'+ school_id + '/classes' , function(data) {

                        if(data) {
                            $('#classe').empty();                      
                            $('#classe').append('<option value="">---</option>');
                            $.each(data, function(index, classe) {
                                $('#classe').append('<option value="' + classe.id + '">' + classe.name +'</option>');        
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
    </script>
@endsection