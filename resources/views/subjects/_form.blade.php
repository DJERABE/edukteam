<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('name')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
            @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
        </div>
    </div>
     
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('category')) has-danger @endif">
            <label class="control-label">Catégorie*</label>
            <select class="form-control @if ($errors->has('category')) form-control-danger @endif" name="category">
                <option value="">--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if( isset($subject->category->id) && !empty($subject->category->id) && ($subject->category->id == $category->id) ) {{ ' selected' }} @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category')) <p class="form-control-feedback">{{ $errors->first('category') }}</p> @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('school')) has-danger @endif">
            <label class="control-label">Etablissement*</label>
            <select class="form-control @if ($errors->has('school')) form-control-danger @endif" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" @if( isset($subject->school->id) && !empty($subject->school->id) && ($subject->school->id == $school->id) ) {{ ' selected' }} @endif>{{ $school->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('school')) <p class="form-control-feedback">{{ $errors->first('school') }}</p> @endif
        </div>
    </div> 
</div>
