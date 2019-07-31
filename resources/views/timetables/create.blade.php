@extends('layouts.backend')

@section('title', 'Emplois du temps')

@section('css')
@endsection

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Emplois du temps</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item">Emplois du temps</li>
                    <li class="breadcrumb-item active">Nouvel emploi du temps</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Nouvel emploi du temps</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open( ['method' => 'post', 'url' => route('timetables.store', $class->id)]) !!}
                        <div class="form-body">
                            @include('timetables._form')
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Valider</button>
                            <a  href="{{url()->previous()}}" class="btn btn-danger">Annuler</a>
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
    <script src="/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="/js/pages/mask.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#academic_year').change(function() {
                $('#session').empty();
                if($('#academic_year').val().toString() !== null && $('#academic_year').val().toString() !== '') {
                    var academicyearValue = $('#academic_year').val().toString();
                    $.get('/api/academicyear/'+academicyearValue+'/sessions', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#session').append('<option value="" selected>--</option>');
                            $.each(data, function(index, session){
                                $('#session').append('<option value="' + session.id + '">' + session.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection