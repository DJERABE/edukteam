<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
            @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('start')) has-danger @endif">
            <label class="control-label">Début*</label>
            {!! Form::text('start', null, ['class' => "form-control @if ($errors->has('start')) form-control-danger @endif", 'data-mask' => "9999-99-99"]) !!}
            @if ($errors->has('start')) <p class="form-control-feedback">{{ $errors->first('start') }}</p> @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('end')) has-danger @endif">
            <label class="control-label">Fin*</label>
            {!! Form::text('end', null, ['class' => "form-control @if ($errors->has('end')) form-control-danger @endif", 'data-mask' => "9999-99-99"]) !!}
            @if ($errors->has('end')) <p class="form-control-feedback">{{ $errors->first('end') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('academic_year')) has-danger @endif">
            <label class="control-label">Année academique*</label>
            <select class="form-control @if ($errors->has('academic_year')) form-control-danger @endif" name="academic_year">
                <option value="">--</option>
                @foreach($academic_years as $academic_year)
                    <option value="{{ $academic_year->id }}" @if( isset($session->academic_year->id) && !empty($session->academic_year->id) && ($session->academic_year->id == $academic_year->id) ) {{ ' selected' }} @endif>{{ $academic_year->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('academic_year')) <p class="form-control-feedback">{{ $errors->first('academic_year') }}</p> @endif
        </div>
    </div>
     
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="form-control @if ($errors->has('school')) form-control-danger @endif" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" @if( isset($session->school->id) && !empty($session->school->id) && ($session->school->id == $school->id) ) {{ ' selected' }} @endif>{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div>

</div>
