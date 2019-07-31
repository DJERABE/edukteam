@extends('layouts.backend')

@section('title', 'Contacts')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contacts</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                        <li class="breadcrumb-item active">Famile</li>
                    </ol>
                    <a href="{{ route('contacts.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nouveau Contact</a>
                    
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('flash::message')
                    {!! Form::open( ['method' => 'post', 'url' => route('recherchecontact.stor')]) !!}
                        <div class="form-body"> 
                            <div class="row">  
                                <div class="col-md-6"> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if ($errors->has('name')) has-danger @endif">
                                        <input type="text" name="name" class="form-control @if ($errors->has('name')) form-control-danger @endif" placeholder="Recherche nom de famille " >
                                        @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="col-md-2">  
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-search-minus"></i> Recherche</button> 
                                   
                                </div>
                            </div>
                        </div>
                       
                    {!! Form::close() !!}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Code Famille</th>
                                    <th>Nom</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Enfants</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)                                 
                                <tr>
                                    <td>{{ $contact->family['code_family']}}</td>
                                    <td>{{ $contact->given_names}} {{$contact->last_name}}</td>
                                    
                                    <td>{{ $contact->tel_home }} / {{ $contact->cell }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->family->students->implode('given_names', ' ,') }}</td>
                                    <td>
                                        @include('components._actions', [
                                            'entity' => 'contacts',
                                            'id' => $contact->id
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
        $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
    </script>
@endsection