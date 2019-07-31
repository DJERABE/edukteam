<h4 class="card-title">Annee Academique</h4>
<hr />


    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('session_name')) has-danger @endif">
                <label class="control-label">Nom*</label>
                {!! Form::text('session_name', null, ['class' => "form-control @if ($errors->has('session_name')) form-control-danger @endif"]) !!}
                @if ($errors->has('session_name')) <p class="form-control-feedback">{{ $errors->first('session_name') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('session_period')) has-danger @endif">
                <label class="control-label">Période*</label>
                {!! Form::text('session_period', null, ['class' => "form-control @if ($errors->has('session_period')) form-control-danger @endif"]) !!}
                @if ($errors->has('session_period')) <p class="form-control-feedback">{{ $errors->first('session_period') }}</p> @endif
            </div>
        </div>
  <div class="col-md-4">
            <div class="form-group @if ($errors->has('session_startdate')) has-danger @endif">
                <label class="control-label">Debut Session</label>
                 
                <input type="text" class="form-control" value="@if(isset($annee->session_startdate)){{ $annee->session_startdate }} @endif" placeholder="2017-06-04" id="session_startdate" name="session_startdate">
                 @if ($errors->has('session_startdate')) <p class="form-control-feedback">{{ $errors->first('session_startdate') }}</p> @endif
            </div>
        </div>
    </div>
    <div class="row">
           <div class="col-md-4">
            <div class="form-group @if ($errors->has('session_enddate')) has-danger @endif">
                <label class="control-label">Fin Session</label>
                 
                <input type="text" class="form-control" placeholder="2017-06-04" value="@if(isset($annee->session_enddate)){{ $annee->session_enddate }} @endif" id="session_enddate" name="session_enddate">
                @if ($errors->has('session_enddate')) <p class="form-control-feedback">{{ $errors->first('session_enddate') }}</p> @endif
            </div>
        </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school_id')) has-danger @endif">
            <label class="control-label">Ecole*</label>
            <select class="select2 form-control @if ($errors->has('school_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school_id">
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}"  @if( isset($annee->school) && !empty($annee->school) && $school->id == $annee->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school_id')) <p class="form-control-feedback">{{ $errors->first('school_id') }}</p> @endif
        </div>
    </div>


        <div class="col-md-4">
            <br><br>
            <div class="form-group @if ($errors->has('is_active')) has-danger @endif">
                
                 
                   <div class="custom-control custom-checkbox">
                     <input type="hidden"    name="is_active" value="off">
                        <input type="checkbox"    name="is_active" checked value="on">
                        <label  for="is_active">Activez cette session ?</label>
                     </div>
            </div>
        </div>


    </div>


