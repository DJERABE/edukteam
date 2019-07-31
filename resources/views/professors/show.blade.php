@extends('layouts.backend')

@section('title', 'Professeurs')

@section('css')
<link href="/css/pages/user-card.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
@endsection

@section('body')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Professeurs</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                <li class="breadcrumb-item">Professeurs</li>
                <li class="breadcrumb-item active">Détails professeur</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Détails professeur</h4>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" value="{{ $professor->nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Prénoms</label>
                                    <input type="text" class="form-control" value="{{ $professor->prenoms }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $professor->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Contact 1</label>
                                    <input type="text" class="form-control" value="{{ $professor->contact_1 }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Contact 2</label>
                                    <input type="text" class="form-control" value="{{ $professor->contact_2 }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Établissement*</label>
                                    <input type="text" class="form-control" value="{{ $professor->school->nom }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Matière</label>
                                    <input type="text" class="form-control" value="{{ $professor->subjects->implode('name', ', ') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Dossiers du professeur</h4>
                <hr>
                <div class="row el-element-overlay">
                    <div class="col-md-12">

                    </div>
                    @foreach($images as $value)

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                @if($value)
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
                                @else

                                <div class="el-card-avatar el-overlay-1">
                                    <h3>AUCUN FICHIER TELECHARGE </h3>
                                    <div class="el-overlay">
                                        <ul class="el-info">


                                        </ul>
                                    </div>
                                </div>


                                @endif

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr >
                <br>

            </div>
        </form>
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
<script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
@endsection