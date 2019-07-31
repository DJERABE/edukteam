@extends('layouts.backend')

@section('title', 'Comptes')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Comptes</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Comptes</li>
                    <li class="breadcrumb-item active">Détails compte</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Détails compte</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <input type="text" class="form-control" value="{{ $user->nom }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Prénoms</label>
                                        <input type="text" class="form-control" value="{{ $user->prenoms }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Contact 1</label>
                                        <input type="text" class="form-control" value="{{ $user->contact_1 }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Contact 2</label>
                                        <input type="text" class="form-control" value="{{ $user->contact_2 }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Rôle*</label>
                                        <input type="text" class="form-control" value="{{ $user->roles->implode('display_name', ', ') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            @if($user->school_id != null && $user->school_id != 0)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Établissement*</label>
                                            <input type="text" class="form-control" value="{{ $user->school->nom }}" readonly>
                                        </div>
                                        <a href="{{ route('schools.show', $user->school->id) }}" target="_blank" class="btn btn-info">Détails</a>
                                        <a  class="btn btn-success" data-toggle="modal" data-target="#myModalpassword">Modifier password</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>



                    <div class="row social-states">
                    <div class="col-6 text-left"> 
                        <form action="{{ route('passwordupdate',$user->id) }}" method="post" enctype= "multipart/form-data">   
                            @csrf
                            {{method_field('PUT')}}
                            <div class="modal fade" id="myModalpassword" role="dialog">
                            <div class="modal-dialog  ">
                                <div class="modal-content">

                                <div class="modal-body">
                          
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">E-mail</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="email" name="email" value="{{ Auth::user()->email}}" readonly>
                                        </div>
                                    </div >
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nouveau Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="password" value="{{ Auth::user()->password}}">
                                        </div>
                                    </div >
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Confirmation Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="password_confirmation" value="{{ Auth::user()->password}}">
                                        </div>
                                    </div>                          
                          
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-blue">Modifier Profil</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        </form>  
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
@endsection