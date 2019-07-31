<h4 class="card-title">Établissement</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nom')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('nom', null, ['class' => "form-control @if ($errors->has('nom')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom')) <p class="form-control-feedback">{{ $errors->first('nom') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('slogan')) has-danger @endif">
            <label class="control-label">Slogan</label>
            {!! Form::text('slogan', null, ['class' => "form-control @if ($errors->has('slogan')) form-control-danger @endif"]) !!}
            @if ($errors->has('slogan')) <p class="form-control-feedback">{{ $errors->first('slogan') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('siteweb')) has-danger @endif">
            <label class="control-label">Site web</label>
            {!! Form::text('siteweb', null, ['class' => "form-control @if ($errors->has('siteweb')) form-control-danger @endif"]) !!}
            @if ($errors->has('siteweb')) <p class="form-control-feedback">{{ $errors->first('siteweb') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('contact_1')) has-danger @endif">
            <label class="control-label">Contact 1*</label>
            {!! Form::text('contact_1', null, ['class' => "form-control @if ($errors->has('contact_1')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
            @if ($errors->has('contact_1')) <p class="form-control-feedback">{{ $errors->first('contact_1') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('contact_2')) has-danger @endif">
            <label class="control-label">Contact 2</label>
            {!! Form::text('contact_2', null, ['class' => "form-control @if ($errors->has('contact_2')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
            @if ($errors->has('contact_2')) <p class="form-control-feedback">{{ $errors->first('contact_2') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('email')) has-danger @endif">
            <label class="control-label">Email*</label>
            {!! Form::text('email', null, ['class' => "form-control @if ($errors->has('email')) form-control-danger @endif"]) !!}
            @if ($errors->has('email')) <p class="form-control-feedback">{{ $errors->first('email') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('adresse')) has-danger @endif">
            <label class="control-label">Adresse*</label>
            {!! Form::text('adresse', null, ['class' => "form-control @if ($errors->has('adresse')) form-control-danger @endif"]) !!}
            @if ($errors->has('adresse')) <p class="form-control-feedback">{{ $errors->first('adresse') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('ville')) has-danger @endif">
            <label class="control-label">Ville*</label>
            <select class="select2 form-control @if ($errors->has('ville')) form-control-danger @endif custom-select select2-hidden-accessible" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" name="ville">
                <option value="">--</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" @if( isset($school->ville) && !empty($school->ville) && $ville->id == $school->ville->id ) {{ ' selected' }} @endif >{{ $ville->nom }}</option>
                @endforeach
            </select>
            @if ($errors->has('ville')) <p class="form-control-feedback">{{ $errors->first('ville') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nom_banque')) has-danger @endif">
            <label class="control-label">Nom de la banque</label>
            {!! Form::text('nom_banque', null, ['class' => "form-control @if ($errors->has('nom_banque')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom_banque')) <p class="form-control-feedback">{{ $errors->first('nom_banque') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nom_compte_banque')) has-danger @endif">
            <label class="control-label">Nom du compte en banque</label>
            {!! Form::text('nom_compte_banque', null, ['class' => "form-control @if ($errors->has('nom_compte_banque')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom_compte_banque')) <p class="form-control-feedback">{{ $errors->first('nom_compte_banque') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('numero_compte_banque')) has-danger @endif">
            <label class="control-label">N° du compte</label>
            {!! Form::text('numero_compte_banque', null, ['class' => "form-control @if ($errors->has('numero_compte_banque')) form-control-danger @endif"]) !!}
            @if ($errors->has('numero_compte_banque')) <p class="form-control-feedback">{{ $errors->first('numero_compte_banque') }}</p> @endif
        </div>
    </div>
</div>

@if(!isset($school))
    <h4 class="card-title">School manager</h4>
    <hr />

    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('nom_school_manager')) has-danger @endif">
                <label class="control-label">Nom*</label>
                {!! Form::text('nom_school_manager', null, ['class' => "form-control @if ($errors->has('nom_school_manager')) form-control-danger @endif"]) !!}
                @if ($errors->has('nom_school_manager')) <p class="form-control-feedback">{{ $errors->first('nom_school_manager') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('prenoms_school_manager')) has-danger @endif">
                <label class="control-label">Prénoms*</label>
                {!! Form::text('prenoms_school_manager', null, ['class' => "form-control @if ($errors->has('prenoms_school_manager')) form-control-danger @endif"]) !!}
                @if ($errors->has('prenoms_school_manager')) <p class="form-control-feedback">{{ $errors->first('prenoms_school_manager') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('email_school_manager')) has-danger @endif">
                <label class="control-label">Email*</label>
                {!! Form::text('email_school_manager', null, ['class' => "form-control @if ($errors->has('email_school_manager')) form-control-danger @endif"]) !!}
                @if ($errors->has('email_school_manager')) <p class="form-control-feedback">{{ $errors->first('email_school_manager') }}</p> @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('contact_1_school_manager')) has-danger @endif">
                <label class="control-label">Contact 1*</label>
                {!! Form::text('contact_1_school_manager', null, ['class' => "form-control @if ($errors->has('contact_1_school_manager')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
                @if ($errors->has('contact_1_school_manager')) <p class="form-control-feedback">{{ $errors->first('contact_1_school_manager') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('contact_2_school_manager')) has-danger @endif">
                <label class="control-label">Contact 2</label>
                {!! Form::text('contact_2_school_manager', null, ['class' => "form-control @if ($errors->has('contact_2_school_manager')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
                @if ($errors->has('contact_2_school_manager')) <p class="form-control-feedback">{{ $errors->first('contact_2_school_manager') }}</p> @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('password_school_manager')) has-danger @endif">
                <label class="control-label">Mot de passe*</label>
                <input type="password" class="form-control @if ($errors->has('password_school_manager')) form-control-danger @endif" name="password_school_manager">
                @if ($errors->has('password_school_manager')) <p class="form-control-feedback">{{ $errors->first('password_school_manager') }}</p> @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('password_school_manager_confirmation')) has-danger @endif">
                <label class="control-label">Confirmation de mot de passe*</label>
                <input type="password" class="form-control @if ($errors->has('password_school_manager_confirmation')) form-control-danger @endif" name="password_school_manager_confirmation">
            </div>
        </div>
    </div>
@endif