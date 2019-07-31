<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
            @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
        </div>
    </div>
     
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="form-control @if ($errors->has('school')) form-control-danger @endif" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" @if( isset($category->school->id) && !empty($category->school->id) && $school->id == $category->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div> 
</div>
