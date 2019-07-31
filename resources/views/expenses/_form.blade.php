<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('name')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
            @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissemenet</label>
            <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
              <option value="{{ $school->id }}" @if(isset($expense->school->id) && !empty($expense->school->id) && $school->id == $expense->school->id ) {{ 'selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div>
</div>
 
