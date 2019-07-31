<h4 class="card-title">Établissement</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nom_categorie_matiere')) has-danger @endif">
            <label class="control-label">Nom Categorie*</label>
            {!! Form::text('nom_categorie_matiere', null, ['class' => "form-control @if ($errors->has('nom_categorie_matiere')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom_categorie_matiere')) <p class="form-control-feedback">{{ $errors->first('nom_categorie_matiere') }}</p> @endif
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('ordre')) has-danger @endif">
            <label class="control-label">Ordre Categorie*</label>
            <select class="select2 form-control @if ($errors->has('ordre')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="ordre" >
                <option value="">--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            @if ($errors->has('ordre')) <p class="form-control-feedback">{{ $errors->first('ordre') }}</p> @endif
        </div>
    </div> 
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="select2 form-control @if ($errors->has('school')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="school" >
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" @if( isset($categorieMatiere->school) && !empty($categorieMatiere->school) && $school->id == $categorieMatiere->school->id ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div> 
</div>
