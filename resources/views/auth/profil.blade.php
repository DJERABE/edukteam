@extends('layouts.backend')

@section('title', 'Profil')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Profil</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="/images/users/5.jpg" class="img-circle" width="150">
                        <h4 class="card-title m-t-10">{{ Auth::user()->nom }} {{ Auth::user()->prenoms }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->roles->implode('display_name', ', ') }}</h6>
                        @if(Auth::user()->school_id != null)
                            <h6 class="card-subtitle">{{ Auth::user()->school->nom }}</h6>
                        @endif
                    </center>
                </div>
                <div><hr></div>
                <div class="card-body">
                    <small class="text-muted">Adresse email </small><h6>{{ Auth::user()->email }}</h6>
                    <small class="text-muted p-t-30 db">Contact </small><h6>{{ Auth::user()->contact_1 }} @if( isset(Auth::user()->contact_2) ) {{ ' / '.Auth::user()->contact_2 }} @endif</h6>
                    
                    
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#settings" role="tab" aria-selected="true">Informations du compte</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="post" action="{{ route('profil.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Nom</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" name="nom" class="form-control form-control-line" value="{{ Auth::user()->nom }}">
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label class="col-md-12">Prenom</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" name="prenoms" class="form-control form-control-line" value="{{ Auth::user()->prenoms }}">
                                    </div>
                                </div>

                       
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" name="contact_1" class="form-control form-control-line" value="{{ Auth::user()->contact_1 }}">
                                    </div>
                                </div>
                      
                    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Modifier Profil</button>
                                       
                                    </div>
                                </div>
                            </form>
                            





                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
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