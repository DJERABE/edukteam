    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Ecole*</label>
                <select class="form-control" name="school" id="school">
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
                <select class="form-control" name="academic_year" id="academic_year">
                    <option value="">--</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Eleve*</label>
                <select class="form-control" name="student" id="student">
                    <option value="">--</option>
                    <option value='new-student'>Nouvel eleve</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->last_name }} {{ $student->given_names }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div id="student-form">
        <h4 class="card-title">Élève</h4>
        <hr >
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Matricule*</label>
                    {!! Form::text('matricule', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nom*</label>
                    {!! Form::text('last_name', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Prénoms*</label>
                    {!! Form::text('given_names', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Date de naissance*</label>
                    {!! Form::text('dob', null, ['class' => "form-control required", 'data-mask' => '99/99/9999']) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Lieu de naissance*</label>
                    {!! Form::text('place_birth', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nationalité*</label>
                    {!! Form::text('citizenship', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Adresse géographique*</label>
                    {!! Form::text('address', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Region*</label>
                    {!! Form::text('county', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">District*</label>
                    {!! Form::text('district', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Numéro de rue*</label>
                    {!! Form::text('street_no', null, ['class' => "form-control required"]) !!}
                </div>
            </div>
        </div>
        <hr >
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Niveau détude*</label>
                <select class="form-control" name="studylevel" id="studylevel">
                    <option value="">--</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Classe*</label>
                <select class="form-control" name="class" id="class">
                    <option value="">--</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Ecole précédente*</label>
                {!! Form::text('previous_school', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Dossier académique*</label>
                {!! Form::file('academic_file', ['id' => "input-file-now", 'class' => "dropify-fr"]) !!}
            </div>
        </div>
    </div>