    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('name')) has-danger @endif">
                <label class="control-label">Nom*</label>
                {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
                @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Classe*</label>
                <input type="text" name="" id="" value="{{ $class->name }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Etablissement*</label>
                <input type="text" name="" id="" value="{{ $class->school->nom }}" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Année académique*</label>
                <select class="form-control" name="academic_year" id="academic_year">
                    <option value="">--</option>
                    @foreach($class->school->academic_years as $academic_year)
                        <option value="{{ $academic_year->id }}">{{ $academic_year->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Session*</label>
                <select class="form-control" name="session" id="session">
                    <option value="">--</option>
                </select>
            </div>
        </div>
    </div>