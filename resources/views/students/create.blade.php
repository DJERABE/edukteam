@extends('layouts.backend')

@section('title', 'Eleves')

@section('css')
<link href="/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/node_modules/fileselect/bootstrap-fileselect.js"></script>
<link rel="stylesheet" href="/node_modules/dist/ladda.min.css">
<script src="/node_modules/dist/spin.min.js"></script> 
<script src="/node_modules/dist/ladda.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
@endsection
@section('body')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Eleves</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                <li class="breadcrumb-item">Eleves</li>
            <a href="{{ route('students.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Liste élève</a>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Nouvel eleve</h4>
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

                {!! Form::open( ['method' => 'post', 'url' => route('students.store'), 'enctype' => 'multipart/form-data']) !!}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Ecole*</label>
                                <select class="select2 form-control" name="school" id="school" >
                                    <option value="">--</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Année scolaire*</label>
                                <select class="select2 form-control" name="academic_year" id="academic_year">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Eleve*</label>
                                <select class="select2 form-control" name="student" id="student">
                                    <option value="">--</option>
                                    <option value='new-student'>Nouvel eleve</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->last_name }} {{ $student->given_names }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div   id="student-form">
                        <h4 class="card-title">Élève</h4>
                        <hr >
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nom*</label>
                                    {!! Form::text('last_name', null, ['class' => "form-control required",'id'=>'last_name']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Prénoms*</label>
                                    {!! Form::text('given_names', null, ['class' => "form-control required",'id'=>'given_names']) !!}
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Photo d'identite*</label>
                                    <input id="demo3" type="file" name="student_avatar"/>
                                    <script>
                                        $('#demo3').fileselect();
                                    </script>
                                </div> 
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Date de naissance*</label>
                                    {!! Form::text('dob', null, ['class' => "form-control required",'id'=>'datepicker', 'readonly']) !!}
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Lieu de naissance*</label>
                                    {!! Form::text('place_birth', null, ['class' => "form-control required"]) !!}
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Code*</label>
                                    <div class="input-group">
                                        {!! Form::text('code', null, ['class' => "form-control required",'id' =>'single-input']) !!}
                                        <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-primary bb">Generer</button>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Nationalité*</label>
                                    {!! Form::text('citizenship', null, ['class' => "form-control required"]) !!}
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Adresse géographique*</label>
                                    {!! Form::text('address', null, ['class' => "form-control required"]) !!}
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Matricule*</label>
                                    <div class="input-group">
                                        {!! Form::text('matricule', null, ['class' => "form-control required mat",'id' =>'single-input']) !!}
                                        <button type="button" data-style="expand-right" id="" class="btn waves-effect waves-light btn-primary ladda-button bb">Generer</button>
                                    </div>
                                </div> 
                            </div>  
                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Famille*</label>
                                    <select class="select form-control" name="family" id="family">
                                        <option value="">--</option> 
                                            @foreach($families as $family)
                                            <option value="{{ $family->id }}" >{{ $family->code_family }} {{ $family->name }}</option>
                                            @endforeach
                                                                                
                                        </select>
                                </div>
                            </div> 
                        </div>  
                        <h5 class="card-title">Inscription dans une classe</h5><hr > 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Niveau détude*</label>
                                <select class="select2 form-control" name="studylevel" id="studylevel">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Classe*</label>
                                <select class="select2 form-control" name="class" id="class">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ecole précédente*</label>
                                {!! Form::text('previous_school', null, ['class' => "form-control"]) !!}
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fiche d'inscription*</label>
                                <input id="demo2" type="file" name="academic_file[]" multiple />
                                <script>
                                    $('#demo2').fileselect(); 
                                </script>
                            </div> 
                        </div> 
                    </div>
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
<script src="/node_modules/popper/popper.min.js"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">


</script>
<script src="/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/js/waves.js"></script>
<script src="/js/sidebarmenu.js"></script>
<script src="/js/custom.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
} );
</script>
<script src="/node_modules/switchery/dist/switchery.min.js"></script>
<script src="/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script type="text/javascript" src="/node_modules/multiselect/js/jquery.multi-select.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#student-form').hide();

            $('#school').change(function() {
                $('#studylevel').empty();
                $('#academic_year').empty();
                if($('#school').val().toString() !== null && $('#school').val().toString() !== '') {
                    var schoolValue = $('#school').val().toString();
                    $.get('/api/schools/'+schoolValue+'/studylevels', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#studylevel').append('<option value="" selected>--</option>');
                            $.each(data, function(index, studylevel){
                                $('#studylevel').append('<option value="' + studylevel.id + '">' + studylevel.name + '</option>');
                            });
                        }
                    });
                    $.get('/api/schools/'+schoolValue+'/academicyears', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#academic_year').append('<option value="" selected>--</option>');
                            $.each(data, function(index, academicyear){
                                $('#academic_year').append('<option value="' + academicyear.id + '">' + academicyear.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#studylevel').change(function() {
                $('#class').empty();
                if($('#studylevel').val().toString() !== null && $('#studylevel').val().toString() !== '') {
                    var studylevelValue = $('#studylevel').val().toString();
                    $.get('/api/studylevels/' + studylevelValue + '/classes', function(data) {
                        if(data.id !== null && data.id !== '') {
                            $('#class').append('<option value="" selected>--</option>');
                            $.each(data, function(index, dataclass){
                                $('#class').append('<option value="' + dataclass.id + '">' + dataclass.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#student').change(function() {
                $('#student-form').hide();
                if($('#student').val().toString() == 'new-student') {
                    $('#student-form').show();
                } else {
                    $('#student-form').hide();
                }
            });
        });
    </script>

    <script>
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
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
            $('#select-all').click(function() {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function() {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function() {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function() {
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
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
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
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

    </script>

    <script>

        Ladda.bind( '.bb', {
            callback: function( instance ) {
                var progress = 0;
                var interval = setInterval( function() {
                    
                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                    instance.setProgress( progress );

                    if( progress === 1 ) {
                        instance.stop();
                        var name = $('#given_names').val();
                        var prenom = $('#last_name').val();
                        var dat = $('#dob').val();
                        var my_date = new Date(dat)
                        var month = my_date.getMonth()+1
                           month =  month < 10 ? '0' + month : '' + month;
                        //alert(dat.toString().substr(6,3))
                        var year = my_date.getFullYear().toString().substr(-2);
                        

                        var initial_name = name.charAt(0).toUpperCase();
                        var initial_prenom = prenom.charAt(0).toUpperCase();


                        var matricule = year+month+initial_prenom+initial_name;
                        $('.mat').val(matricule);


                        //alert("Votre nom est : "+ name.charAt(0).toUpperCase());

                        clearInterval( interval );
                    }
                }, 100 );
            }
        } );

    </script>

    
@endsection