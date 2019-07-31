<h4 class="card-title">Établissement</h4>
<hr />
<div class="row">
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('nom_matiere')) has-danger @endif">
            <label class="control-label">Nom Matière*</label>
            {!! Form::text('nom_matiere', null, ['class' => "form-control @if ($errors->has('nom_matiere')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom_matiere')) <p class="form-control-feedback">{{ $errors->first('nom_matiere') }}</p> @endif
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('categorie_classe_id')) has-danger @endif">
            <label class="control-label">Categorie Classe*</label>
            <select class="select2 form-control @if ($errors->has('categorie_classe_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="categorie_classe_id" >
                <option value="">--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            @if ($errors->has('categorie_classe_id')) <p class="form-control-feedback">{{ $errors->first('categorie_classe_id') }}</p> @endif
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('categorie_matiere_id')) has-danger @endif">
            <label class="control-label">Categorie Matiere*</label>
            <select class="select2 form-control @if ($errors->has('categorie_matiere_id')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="categorie_matiere_id" >
                <option value="">--</option>
                @foreach($categorie_matieres as $categorie)
                    <option value="{{ $categorie->id }}" @if( isset($matiere->categorie) && !empty($matiere->categorie) && $categorie->id == $matiere->categorie->id ) {{ ' selected' }} @endif >{{ $categorie->nom_categorie_matiere }}</option>
                @endforeach
            </select>
            @if ($errors->has('categorie_matiere_id')) <p class="form-control-feedback">{{ $errors->first('categorie_matiere_id') }}</p> @endif
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school" >
                <option value="">--</option>
                @foreach($schools as $school)matiere
                    <option value="{{ $school->id }}" @if( isset($matiere->school) && !empty($matiere->school) && $school->id == $matiere->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div> 
</div>
