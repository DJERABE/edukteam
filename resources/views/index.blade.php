@extends('layouts.backend')

@section('title', 'Tableau de bord')

@section('css')
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('body')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Tableau de bord</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>
            </div>
        </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"><span </span><a href="" class="btn waves-effect waves-light btn-rounded btn-primary">Accounting</a></h3>
                                        <h5 class="text-muted m-b-0">bills - payments </h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                         <h3 class="m-b-0"><span </span><a href="" class="btn waves-effect waves-light btn-rounded btn-primary">Students</a></h3>
                                        
                                        <h5 class="text-muted m-b-0">Students Management</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"><span </span><a href="" class="btn waves-effect waves-light btn-rounded btn-primary">Settings</a></h3>
                                        <h5 class="text-muted m-b-0">Settings School</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                                    <div class="m-l-10 align-self-center">
                                   <h3 class="m-b-0"><span </span><a href="" class="btn waves-effect waves-light btn-rounded btn-primary">Settings</a></h3>
                                        <h5 class="text-muted m-b-0">Settings School</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistique Mensuel</h4>
                                <div id="bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
{{--         <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <a href="{{ url('parametres') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Paramètres</h5>
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
                    <a href="{{ url('matieres') }}">
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
                    <a href="{{ url('eleves') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Elèves</h5>
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
            <div class="col-lg-3">
                <div class="card">
                    <a href="{{ url('Paiements') }}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Paiements</h5>
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
        </div> --}}

          {{--   <div class="row el-element-overlay">
                    <div class="col-md-12">
                        <h4 class="card-title">
                        <h6 class="card-subtitle m-b-20 text-muted"></h6></div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('images/accueil/1.jpeg') }}" width="100" height="100" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="#"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">PARAMETRES</h3> <small></small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('images/accueil/2.jpg') }}" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="#"><i class="icon-magnifier"></i></a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">MATIERES</h3> <small></small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('images/accueil/3.jpeg') }}" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="#"><i class="icon-magnifier"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">ELEVES</h3> <small></small>
                                     </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('images/accueil/4.png') }}" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="#"><i class="icon-magnifier"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">PAIEMENTS</h3> <small></small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
                
                </div> --}}
     {{--    <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title text-uppercase">University Earnings<br><small class="text-muted">All Earnings are in million $</small></h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle text-dark"></i> Arts</li>
                                    <li><i class="fa fa-circle text-info"></i> Commerse</li>
                                    <li><i class="fa fa-circle text-success"></i> Science</li>
                                </ul>
                            </div>
                        </div>
                        <div id="morris-bar-chart" style="height:375px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-15">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Earning From Medical college</h5>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <h1 class="text-info">$64057</h1>
                                        <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                                    <div class="col-6">
                                        <div id="sparkline2dash" class="text-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-info m-b-15">
                            <div class="card-body">
                                <h5 class="text-white card-title text-uppercase">Earning From Engineering college</h5>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <h1 class="text-white">$30447</h1>
                                        <p class="text-white">APRIL 2017</p> <b class="text-white">(110 Sales)</b> </div>
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <div id="sales1" class="text-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
        <script src="/node_modules/echarts/echarts-all.js"></script>
    <script src="/node_modules/echarts/echarts-init.js"></script>
@endsection