<h4 class="card-title">Frais</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nom')) has-danger @endif">
            <label class="control-label">Nom de l'écheance de payeent*</label>
            {!! Form::text('nom', null, ['class' => "form-control @if ($errors->has('nom')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom')) <p class="form-control-feedback">{{ $errors->first('nom') }}</p> @endif
        </div>
    </div>

            <div class="col-md-4">
            <div class="form-group @if ($errors->has('echeance_date')) has-danger @endif">
                <label class="control-label">Écheance</label>
                {!! Form::text('echeance_date', null, ['class' => "form-control @if ($errors->has('echeance_date')) form-control-danger @endif", "data-mask" => "9999-99-99"]) !!}
                @if ($errors->has('echeance_date')) <p class="form-control-feedback">{{ $errors->first('echeance_date') }}</p> @endif
            </div>
        </div>
<div class="col-md-4">
      <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">École</label>
            <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
              <option value="{{ $school->id }}" @if(isset($frai->school) && !empty($frai->school) && $school->id == $frai->school->id ) {{ 'selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div>
</div>
 
