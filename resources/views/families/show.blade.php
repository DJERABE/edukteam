@extends('layouts.backend')

@section('title', 'Famille')

@section('css')
<link href="/css/pages/user-card.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Famille</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Famille</li>
                <a href="{{ route('families.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste Famille</a>
                </ol>
            </div>
        </div>
    </div>
   

                <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="m-b-0 text-white">Détails Family</h4>
                                </div>
                                <div class="card-body">
                                    <form action="#">
                                        <div class="form-body">
                                                <div class="row">
            
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Nom Famille*</label>
                                                                    <input type="text" class="form-control" value="{{ $family->name }}" readonly>
                                                                </div>
                                                        </div>
                                                     
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                    <label class="control-label">Code Famille*</label>
                                                                    <input type="text" class="form-control" value="{{ $family->code_family }}" readonly>
                                                                </div>
                                                        </div>
                                                        </div>
                                   
                                        </div>
                                        @if($parents->count()>0)
                                            <h4 class="card-title">Details Parents</h4>
                                            <hr>

                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <table class="table" id="academicsInfo">
                                                                <thead>
                                                                    <th>Type</th>
                                                                    <th>Nom</th>
                                                                    <th>Prenom</th>
                                                                    <th>Contact</th>
                                                                    <th>A contacter</th>
                                                                
                                                                </thead>
                                                                <tbody>
                                                                
                                                                    @foreach($parents as $parent)
                                                                    <tr>
                                                                        <td>{{$parent->guardian_type->name}}</td>
                                                                        <td>{{ $parent->last_name }}</td>
                                                                        <td>{{ $parent->given_names }}</td>
                                                                        <td>{{ $parent->tel_home }}/{{$parent->cell}}</td>
                                                                        <td>@if( $parent->is_contact==1) <span class="label label-success">Oui</span>@else <span class="label label-danger">Non</span> @endif</td>
                        
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($students->count()>0)
                                                <h4 class="card-title"> Details Eleves</h4>
                                                <hr>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <table class="table" id="guardiansInfo">
                                                                    <thead>
                                                                        <th>Nom</th>
                                                                        <th>Prenom</th>
                                                                        <th>Matricule</th>
                                                                        <th>Action</th> 
                                                                    
                                                                    </thead>
                                                                    <tbody>
                                                                    
                                                                        @foreach($students as $student)
                                                                        <tr>
                                                                            <td>{{$student->last_name}}</td>
                                                                            <td>{{ $student->given_names }}</td>
                                                                            <td>{{ $student->matricule }}</td>
                                                                            <td>
                                                                                @include('components._actions', [
                                                                                    'entity' => 'students',
                                                                                    'id' => $student->id
                                                                                ])
                                                                            </td>
                                                                            {{-- <td>{{ $student->classes->first()->name }}</td>  --}}
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
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