@extends('layouts.backend')

@section('title', 'Eleves')

@section('css')
<link href="/css/pages/user-card.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

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
                <li class="breadcrumb-item">Eleves</li>
            <a href="{{ route('students.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste Elève</a>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Détails eleve</h4>
            </div>
            <div class="card-body">


                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="http://s3.eu-gb.objectstorage.softlayer.net/eschool-bucket-2/{{$student->student_avatar}}" width="150" height="150" alt="{{ $student->last_name }}  {{ $student->given_names }}" />
                                <div class="el-overlay">

                                </div>
                                <br>
                            </div>
                            <div class="el-card-content">
                                <h5 class="card-title text-uppercase">{{ $student->last_name }}  {{ $student->given_names }}</h5> 
                                <br/>
                                <small>Age: {{ $age }} ans </small>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="#">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-10">
                           <h4 class="card-title">Informations de l'élève</h4>
                        </div>
                        <div class="col-md-2">
                        <a href="{{ route('students.edit', $student->id) }}"  class="btn btn-primary pull-right">Modifier</a>
                        </div>
                        </div>
                        <hr >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Matricule</label>
                                    <input type="text" class="form-control" value="{{ $student->matricule }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" value="{{ $student->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prénoms</label>
                                    <input type="text" class="form-control" value="{{ $student->given_names }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date de naissance</label>
                                    <input type="text" class="form-control" value="{{date("d-M-Y", strtotime($student->dob))}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Lieu de naissance</label>
                                    <input type="text" class="form-control" value="{{ $student->place_birth }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nationalité</label>
                                    <input type="text" class="form-control" value="{{ $student->citizenship }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Adresse géographique</label>
                                    <input type="text" class="form-control" value="{{ $student->address }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Code</label>
                                    <input type="text" class="form-control" value="{{ $student->code }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Code Famille</label>
                                        <input type="text" class="form-control" value="{{ $student->family->code_family}}" readonly>
                                    </div>
                                </div>
                        </div> 


                        @if($student->medical_informations->count() > 0)
                        <a href="{{ route('medicalinformations.edit', $student->medical_informations->first()->id) }}" class="btn btn-primary pull-right">Modifier</a><br>
                        @else
                              <a href="{{ route('medicalinformations.create', $student->id) }}" target="_blank" class="btn btn-info pull-right">Renseigner</a><br>
                        @endif

                        <h4 class="card-title">Informations médicales</h4>
                        <hr >
                        @if($student->medical_informations->count() > 0)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Groupe sanguin</label>
                                        <input type="text" class="form-control" value=" {{ $student->medical_informations->first()->bloodgroup->name }} " readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Clinique / Hopital</label>
                                        <input type="text" class="form-control" value="{{ $student->medical_informations->first()->emergency_clinic }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Medecin de la famille</label>
                                        <input type="text" class="form-control" value="{{ $student->medical_informations->first()->family_doctor }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tel</label>
                                        <input type="text" class="form-control" value="{{ $student->medical_informations->first()->family_doctor_tel }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Antécédents médicaux</label>
                                        <textarea cols="30" rows="10" class="form-control" readonly>{{ $student->medical_informations->first()->medical_history }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Allergies</label>
                                        <textarea cols="30" rows="10" class="form-control" readonly> {{ $student->medical_informations->first()->allergies }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Maladies infantiles</label>
                                        <textarea cols="30" rows="10" class="form-control" readonly>{{ $student->medical_informations->first()->childhood_diseases }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        @else
                      
                        @endif
                
                        <h4 class="card-title">Renseignements académiques</h4>
                        <hr >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table" id="academicsInfo">
                                        <thead>
                                            <th>Ecole</th>
                                            <th>Année académique</th>
                                            <th>Classe</th>
                                            <th>Etablissement précédent</th>
                                            <th>Dossier scolaire</th>
                                        </thead>
                                        <tbody>
                                            @foreach($student->classes as $class)
                                            <tr>
                                                <td>{{ $class->school->nom }}</td>
                                                <td>{{ \App\Models\AcademicYear::findOrFail($class->pivot->academic_year_id)->name }}</td>
                                                <td>{{ $class->name }}</td>
                                                <td>{{ $class->pivot->previous_school }}</td>

                                                <td><a href="{{ route('get_image',$student) }}" target="_b" class="btn btn-info"><i class="fa fa-download"></i></a></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                {{--         <h4 class="card-title">Dossiers académiques</h4>
                        <hr>
                        <div class="row el-element-overlay">
                            <div class="col-md-12">
                                
                            </div>
                            @foreach($images as $value)

                               <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1">
                                            <img src="{{ asset('storage/'.$value) }}" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li>
                                                        <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('storage/'.$value) }}">
                                                            <i class="icon-magnifier"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn default btn-outline" href="javascript:void(0);">
                                                            <i class="icon-link"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div> --}}
                         {{--    <hr >
                            <br> --}}

                          {{--   <a href="{{ route('guardians.create', $student->id) }}" target="_blank" class="btn btn-info pull-right">Ajouter un parent</a>
                            <h4 class="card-title">Informations parentales</h4>
                            <hr >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($student->guardians->count() > 0)
                                        <table class="table" id="guardiansInfo">
                                            <thead>
                                                <th>Type</th>
                                                <th>Nom & prénoms</th>
                                                <th>Profession</th>
                                                <th>Contacts</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                @foreach($student->guardians as $guardian)
                                                <tr>
                                                    <td>{{ $guardian->guardian_type->display_name }}</td>
                                                    <td>{{ $guardian->last_name }} {{ $guardian->given_names }}</td>
                                                    <td>{{ $guardian->career }}</td>
                                                    <td>{{ $guardian->tel_work }} / {{ $guardian->tel_home }} / {{ $guardian->cell }}</td>
                                                    <td>{{ $guardian->email }}</td>
                                                    <td>
                                                        @include('components._actions', [
                                                            'entity' => 'guardians',
                                                            'id' => $guardian->id
                                                            ])
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <a href="{{ route('guardians.create', $student->id) }}" target="_blank" class="btn btn-warning">Ajouter un parent</a>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <hr >
                                <br> --}}

                            </div>
                        </form>
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
        <script src="/node_modules/datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
        <script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>


        <script>
            $(document).ready(function() {
                $('#academicsInfo').DataTable();
                $('#guardiansInfo').DataTable();
            });
        </script>
        <script>
            $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
        </script>
        @endsection