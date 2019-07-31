<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name_fr')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name_fr', null, ['class' => "form-control @if ($errors->has('name_fr')) form-control-danger @endif"]) !!}
            @if ($errors->has('name_fr')) <p class="form-control-feedback">{{ $errors->first('name_fr') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name_en')) has-danger @endif">
            <label class="control-label">Name*</label>
            {!! Form::text('name_en', null, ['class' => "form-control @if ($errors->has('name_en')) form-control-danger @endif"]) !!}
            @if ($errors->has('name_en')) <p class="form-control-feedback">{{ $errors->first('name_en') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" @if( isset($allergy->school->id) && !empty($allergy->school->id) && ($allergy->school->id == $school->id) ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div>
</div>