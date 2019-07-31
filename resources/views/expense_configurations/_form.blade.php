    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('school')) has-danger @endif">
                <label class="control-label">Etablissement*</label>
                <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school" id="school">
                    <option value="">---</option>
                    @foreach($schools as $school)
                        @if(!isset($fraisConfig))
                            <option value="{{ $school->id }}">{{ $school->nom }}</option>
                        @else 
                            <option value="{{ $school->id }}" @if( isset($fraisConfig->school) && !empty($fraisConfig->school) && $school->id == $fraisConfig->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('studylevel')) has-danger @endif">
                <label class="control-label">Niveau d'étude*</label> 
                <select class="select2 form-control @if ($errors->has('studylevel')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="studylevel" id="studylevel">
                    <option value="">---</option>    
                </select>       
                @if ($errors->has('studylevel')) <p class="form-control-feedback">{{ $errors->first('studylevel') }}</p> @endif
            </div>         
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('academic_year')) has-danger @endif">
                <label class="control-label">Année academique*</label>
                <select class="select2 form-control @if ($errors->has('academic_year')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="academic_year" id="academic_year">
                    <option value="">---</option>
                </select>
                @if ($errors->has('academic_year')) <p class="form-control-feedback">{{ $errors->first('academic_year') }}</p> @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('expense')) has-danger @endif">
                <label class="control-label">Frais*</label>
                <select class="select2 form-control @if ($errors->has('expense')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="expense" id="expense">
                    <option value="">---</option>
                </select>
                @if ($errors->has('expense')) <p class="form-control-feedback">{{ $errors->first('expense') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('amount')) has-danger @endif">
                <label class="control-label">Montant*</label>
                {!! Form::number('amount', null, ['class' => "form-control @if ($errors->has('amount')) form-control-danger @endif", "step"=>"any","min"=>"0"]) !!}
                @if ($errors->has('amount')) <p class="form-control-feedback">{{ $errors->first('amount') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('echeance')) has-danger @endif">
                <label class="control-label">Écheance</label>
                {!! Form::text('echeance', null, ['class' => "form-control @if ($errors->has('echeance')) form-control-danger @endif", "data-mask" => "9999-99-99"]) !!}
                @if ($errors->has('echeance')) <p class="form-control-feedback">{{ $errors->first('echeance') }}</p> @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('is_required')) has-danger @endif">
                <input type="checkbox" name="is_required" id="is_required" class="js-switch" data-color="#009efb">
                <label for="is_required" class="control-label">Champ obligatoire ?</label>
            </div>
        </div>
    </div>