<h4 class="card-title">Assigner Sujet aux professeurs</h4>
<hr />
<div class="row">


        <div class="col-md-4">
        <div class="form-group @if ($errors->has('school_id')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="select2 form-control @if ($errors->has('school_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school_id" id="school">
                <option value="">---</option>
                @foreach($schools as $school)matiere
                    <option value="{{ $school->id }}" @if( isset($matiere->school) && !empty($matiere->school) && $school->id == $matiere->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
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
                
            </select>
            @if ($errors->has('annee_id')) <p class="form-control-feedback">{{ $errors->first('annee_id') }}</p> @endif
        </div>
    </div> 
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('categorie_matiere_id')) has-danger @endif">
            <label class="control-label">Terms*</label>
            <select class="select2 form-control @if ($errors->has('categorie_matiere_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="categorie_matiere_id" >
                <option value="">--</option>
               
            </select>
            @if ($errors->has('categorie_matiere_id')) <p class="form-control-feedback">{{ $errors->first('categorie_matiere_id') }}</p> @endif
        </div>
    </div> 

</div>

<div class="row">


        <div class="col-md-4">
          <div class="form-group @if ($errors->has('classe_id')) has-danger @endif">
            <label class="control-label">Classe*</label>

    <select class="select2 form-control @if ($errors->has('classe_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="classe_id" id="school">
                <option value="">---</option>

                <option value="1">CE1</option>
                <option value="2">CE2</option>
                <option value="3">CM1</option>
                <option value="4">CM2</option>
                    
               
            </select>
                        
            @if ($errors->has('classe_id')) <p class="form-control-feedback">{{ $errors->first('classe_id') }}</p> @endif
        </div>
    </div>
    
        <div class="col-md-4">
          <div class="form-group @if ($errors->has('matiere_id')) has-danger @endif">
            <label class="control-label">Sujet*</label>



     <select class="select2 form-control @if ($errors->has('matiere_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="matiere_id" id="school">
                <option value="">---</option>
                 @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->nom_matiere }}</option>  
                     @endforeach 
            </select>
                        
            @if ($errors->has('matiere_id')) <p class="form-control-feedback">{{ $errors->first('matiere_id') }}</p> @endif
        </div>
    </div>


        <div class="col-md-4">
          <div class="form-group @if ($errors->has('professeur_id')) has-danger @endif" id="professeur-form-group">
            <label class="control-label">Professeurs*</label>

       <select class="select2 form-control @if ($errors->has('professeur_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="professeur_id" id="professeur">
                <option value="">---</option>
             
                      
            </select>
                        
            @if ($errors->has('professeur_id')) <p class="form-control-feedback">{{ $errors->first('professeur_id') }}</p> @endif
        </div>
    </div>

</div>




