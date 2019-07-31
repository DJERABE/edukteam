<h4 class="card-title">Frais de configuration</h4>
<hr />
<div class="row">


        <div class="col-md-4">
        <div class="form-group @if ($errors->has('school_id')) has-danger @endif">
            <label class="control-label">Ecole*</label>
            <select class="select2 form-control @if ($errors->has('school_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school_id" id="school">
                <option value="">---</option>
               

                @foreach($schools as $school)
                 @if(!isset($fraisConfig))
                    <option value="{{ $school->id }}">{{ $school->nom }}</option>
                    @else 
                    <option value="{{ $school->id }}" @if( isset($fraisConfig->school) && !empty($fraisConfig->school) && $school->id == $fraisConfig->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                   @endif

                @endforeach

                   

            </select>
            @if ($errors->has('school_id')) <p class="form-control-feedback">{{ $errors->first('school_id') }}</p> @endif
        </div>
    </div>

 



  


    
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('annee_id')) has-danger @endif" id="annee-form-group">
            <label class="control-label">Annee Academique*</label>
            <select class="select2 form-control @if ($errors->has('annee_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="annee_id" id="annee">
                <option value="">---</option>
                @if(isset($frais_configurations))
                @foreach($frais_configurations as $conf_annee)
                @if(isset($fraisConfig))
                    <option value="{{  $conf_annee->annee->id }}" @if( isset($fraisConfig->annee) && !empty($fraisConfig->annee) && $conf_annee->annee->id == $fraisConfig->annee->id ) {{ ' selected' }} @endif >{{ $conf_annee->annee->session_name }}</option>
                @endif
                @endforeach
                @endif
            </select>
            @if ($errors->has('annee_id')) <p class="form-control-feedback">{{ $errors->first('annee_id') }}</p> @endif
        </div>
    </div> 
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('echeance_id')) has-danger @endif" id="echeance-form-group">
            <label class="control-label">echeance*</label> 
            <select class="select2 form-control @if ($errors->has('echeance_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="echeance_id" id="echeance">
                <option value="">---</option> 
            </select> 
            @if ($errors->has('echeance_id')) <p class="form-control-feedback">{{ $errors->first('echeance_id') }}</p> @endif
        </div>
    </div> 
</div>

<div class="row">


        <div class="col-md-4">
            <div class="form-group @if ($errors->has('classe_id')) has-danger @endif" id="classe-form-group">
                <label class="control-label">Classe*</label> 
                <select class="select2 form-control @if ($errors->has('classe_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="classe_id" id="classe">
                    <option value="{{ old('classe_id') }}">---</option>    
                </select>       
                @if ($errors->has('classe_id')) <p class="form-control-feedback">{{ $errors->first('classe_id') }}</p> @endif
            </div>         
        </div>
    
        <div class="col-md-4">
          <div class="form-group @if ($errors->has('frais_id')) has-danger @endif" id="frais-form-group">
            <label class="control-label">Frais*</label>



     <select class="select2 form-control @if ($errors->has('frais_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="frais_id" id="frais">
                <option value="">---</option>
                {{-- @foreach($frais_configurations as $conf_annee)
                @if(isset($fraisConfig))
                    <option value="{{  $conf_annee->frais->id }}" @if( isset($fraisConfig->frais) && !empty($fraisConfig->frais) && $conf_annee->frais->id == $fraisConfig->frais->id ) {{ ' selected' }} @endif >{{ $conf_annee->frais->nom }}</option>
                @endif
                @endforeach --}}
                 
            </select>
                        
            @if ($errors->has('frais_id')) <p class="form-control-feedback">{{ $errors->first('frais_id') }}</p> @endif
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group @if ($errors->has('montant')) has-danger @endif">
            <label class="control-label">Montant*</label>
            {!! Form::text('montant', "0.00", ['class' => "form-control @if ($errors->has('montant')) form-control-danger @endif",]) !!}
            @if ($errors->has('montant')) <p class="form-control-feedback">{{ $errors->first('montant') }}</p> @endif
        </div>
    </div>

</div>

<div class="row">

      <div class="col-md-4">
            
            <div class="form-group @if ($errors->has('frais_obligatoire')) has-danger @endif">
                
                 
                   <div class="custom-control custom-checkbox">
                         <input type="hidden"    name="frais_obligatoire" value="off">
                        <input type="checkbox"    name="frais_obligatoire" value="on" checked>
                        <label  for="frais_obligatoire">Rendre cette configuration de frais obligatoire ?</label>
                     </div>
            </div>
        </div>

</div>




