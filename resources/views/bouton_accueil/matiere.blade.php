@extends('layouts.backend')

@section('title', 'Matières')

@section('css')
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
@endsection

@section('body')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor text-uppercase">Matières</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                        <li class="breadcrumb-item active">Matières</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <a href="{{ route('subjectcategories.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Catégories</h5>
                            <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                                <h2><sup><i class="ti-arrow-up text-success"></i></sup> $1200</h2>
                            </div>
                            <span class="text-success">20%</span>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 20%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <a href="{{ route('subjects.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"> Matières</h5>
                            <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                                <h2><sup><i class="ti-arrow-down text-primary"></i></sup> $5000</h2>
                            </div>
                            <span class="text-primary">30%</span>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 30%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <a href="{{ route('professors.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Professeurs</h5>
                            <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                                <h2><sup><i class="ti-arrow-up text-info"></i></sup> $8000</h2>
                            </div>
                            <span class="text-info">60%</span>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                            </div>
                        </div>
                    </a>
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
    <script src="/node_modules/raphael/raphael-min.js"></script>
    <script src="/node_modules/morrisjs/morris.min.js"></script>
    <script src="/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="/js/dashboard1.js"></script>
@endsection