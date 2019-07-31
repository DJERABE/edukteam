@extends('layouts.backend')

@section('title', 'Tparametre')

@section('css')
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
@endsection

@section('body')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor text-uppercase">parametre</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">parametre</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('schools.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">etablissements</h5>
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
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('academicyears.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"> Années academiques</h5>
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
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('sessions.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">sessions</h5>
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
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('classes.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">classes</h5>
                            <div class="text-right"> <span class="text-muted">Yearly Fees</span>
                                <h2><sup><i class="ti-arrow-up text-inverse"></i></sup> $12000</h2>
                            </div>
                            <span class="text-inverse">80%</span>
                            <div class="progress">
                                <div class="progress-bar bg-inverse" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('studylevels.index') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">niveau d'etudes</h5>
                            <div class="text-right"> <span class="text-muted">Yearly Fees</span>
                                <h2><sup><i class="ti-arrow-up text-inverse"></i></sup> $12000</h2>
                            </div>
                            <span class="text-inverse">80%</span>
                            <div class="progress">
                                <div class="progress-bar bg-inverse" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
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