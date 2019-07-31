@extends('layouts.backend')

@section('title', 'Nouveau Contact')

@section('css')
    <link href="/node_modules/wizard/steps.css" rel="stylesheet">
    <link href="/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <a href="{{ route('contacts.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste Contact</a>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Nouveau Contact</li>
                    <a  href="{{url()->previous()}}" class="btn btn-inverse">Annuler</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouveau Contact</h4>
                </div>
                <div class="card-body">
                    {!! Form::open( ['method' => 'post', 'url' => route('contacts.store')]) !!}
                    <div class="form-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        @include('contacts._form')
                    </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button>
                            <button type="button" class="btn btn-danger">Annuler</button>
                        </div>
                    {!! Form::close() !!}
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
    <script src="/node_modules/moment/min/moment.min.js"></script>
    <script src="/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="/node_modules/wizard/jquery.validate.min.js"></script>
    <script src="/node_modules/sweetalert/sweetalert.min.js"></script>
    <script src="/node_modules/wizard/steps.js"></script>
    <script src="/js/pages/mask.js"></script>
    <script src="/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="/node_modules/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="/node_modules/multiselect/js/jquery.multi-select.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#school').change(function() {
                $('#niveau').empty();
                $('#annee').empty();
                if($('#school').val().toString() !== null && $('#school').val().toString() !== '') {
                    var schoolValue = $('#school').val().toString();
                    $.get('/api/schools/'+schoolValue+'/niveaux', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#niveau').append('<option value="" selected>--</option>');
                            $.each(data, function(index, niveau){
                                $('#niveau').append('<option value="' + niveau.id + '">' + niveau.nom + '</option>');
                            });
                        }
                    });
                    $.get('/api/schools/'+schoolValue+'/annees', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#annee').append('<option value="" selected>--</option>');
                            $.each(data, function(index, annee){
                                $('#annee').append('<option value="' + annee.id + '">' + annee.session_name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#niveau').change(function() {
                $('#classe').empty();
                if($('#niveau').val().toString() !== null && $('#niveau').val().toString() !== '') {
                    var niveauValue = $('#niveau').val().toString();
                    $.get('/api/niveaux/' + niveauValue + '/classes', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#classe').append('<option value="" selected>--</option>');
                            $.each(data, function(index, classe){
                                $('#classe').append('<option value="' + classe.id + '">' + classe.nom + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
@endsection