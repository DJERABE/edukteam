<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
            @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('study_level')) has-danger @endif">
            <label class="control-label">Niveau d'étude*</label>
            <select class="select2 form-control @if ($errors->has('study_level')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="study_level">
                <option value="">--</option>
                @foreach($study_levels as $niveau)
                    <option value="{{ $niveau->id }}" @if( isset($classe->study_level->id) && !empty($classe->study_level->id) && ($classe->study_level->id == $niveau->id) ) {{ ' selected' }} @endif >{{ $niveau->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('study_level')) <p class="form-control-feedback">{{ $errors->first('study_level') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('student_effectif')) has-danger @endif">
            <label class="control-label">Effectif*</label>
            {!! Form::number('student_effectif', null, ['class' => "form-control @if ($errors->has('student_effectif')) form-control-danger @endif",'min'=>0]) !!}
            @if ($errors->has('student_effectif')) <p class="form-control-feedback">{{ $errors->first('student_effectif') }}</p> @endif
        </div>
    </div>
</div>