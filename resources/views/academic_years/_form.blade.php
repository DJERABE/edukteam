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
                <label class="control-label">Début</label>
                @if( isset($academic_year->start) && !empty($academic_year->start) )
                    <input type="text" value="{{ date('d/m/Y', strtotime($academic_year->start)) }}" name="start" class="form-control @if ($errors->has('start')) form-control-danger @endif" data-mask="99/99/9999">
                @else
                    <input type="text" name="start" class="form-control @if ($errors->has('start')) form-control-danger @endif" data-mask="99/99/9999">
                @endif
                 @if ($errors->has('start')) <p class="form-control-feedback">{{ $errors->first('start') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('end')) has-danger @endif">
                <label class="control-label">Fin</label>
                @if( isset($academic_year->end) && !empty($academic_year->end) )
                    <input type="text" value="{{ date('d/m/Y', strtotime($academic_year->end)) }}" name="end" class="form-control @if ($errors->has('end')) form-control-danger @endif" data-mask="99/99/9999">
                @else
                    <input type="text" name="end" class="form-control @if ($errors->has('end')) form-control-danger @endif" data-mask="99/99/9999">
                @endif
                @if ($errors->has('end')) <p class="form-control-feedback">{{ $errors->first('end') }}</p> @endif
            </div>
    
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('school_id')) has-danger @endif">
                <label class="control-label">ECOLE*</label>
                <select class="select2 form-control @if ($errors->has('school_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school_id">
                    <option value="">--</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}"  @if( isset($academic_year->school) && !empty($academic_year->school) && $school->id == $academic_year->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                    @endforeach
                </select>
                @if ($errors->has('school_id')) <p class="form-control-feedback">{{ $errors->first('school_id') }}</p> @endif
            </div>
        </div>

        <div class="col-md-4">
            <br><br>
            <div class="form-group @if ($errors->has('is_active')) has-danger @endif">
                
                 
                   <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="is_active"  name="is_active" checked>
                        <label class="custom-control-label" for="is_active">Activez cette session ?</label>
                     </div>
            </div>
        </div>


    </div>


