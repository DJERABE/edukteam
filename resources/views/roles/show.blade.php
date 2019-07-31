@extends('layouts.backend')

@section('title', 'Rôles')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Rôles</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Rôles</li>
                    <li class="breadcrumb-item active">Détails rôle</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Détails rôle</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label">Nom</label>
                                            <input type="text" class="form-control" value="{{ $role->display_name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permissions</label>
                                        <div class="row">
                                            @if($role->permissions)
                                                @php
                                                    $perms_array = $permissions->chunk(4);
                                                    foreach($perms_array as $perms) {
                                                        echo '<div class="card" style="padding: 1rem; width: 18rem;">
                                                            <ul class="list-group list-group-flush">';
                                                                foreach($perms as $perm) {
                                                                    if($role->hasPermissionTo($perm->id)) {
                                                                        echo '
                                                                        <li class="list-group-item">
                                                                            <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" checked disabled>
                                                                            <span class="custom-control-label">'.$perm->name.'</span>
                                                                            </label>
                                                                        </li>';
                                                                    }
                                                                    else {
                                                                        echo '
                                                                        <li class="list-group-item">
                                                                            <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" disabled>
                                                                            <span class="custom-control-label">'.$perm->name.'</span>
                                                                            </label>
                                                                        </li>';
                                                                    }
                                                                }
                                                            echo '</ul>
                                                        </div>';
                                                    }
                                                @endphp
                                            @endif
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
@endsection
@section('js')
    <script src="/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="/js/waves.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/custom.min.js"></script>
@endsection