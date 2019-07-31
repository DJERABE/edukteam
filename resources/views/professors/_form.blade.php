
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('nom')) has-danger @endif">
            <label class="control-label">Nom*</label>
            {!! Form::text('nom', null, ['class' => "form-control @if ($errors->has('nom')) form-control-danger @endif"]) !!}
            @if ($errors->has('nom')) <p class="form-control-feedback">{{ $errors->first('nom') }}</p> @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('prenoms')) has-danger @endif">
            <label class="control-label">Prénoms*</label>
            {!! Form::text('prenoms', null, ['class' => "form-control @if ($errors->has('prenoms')) form-control-danger @endif"]) !!}
            @if ($errors->has('prenoms')) <p class="form-control-feedback">{{ $errors->first('prenoms') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('email')) has-danger @endif">
            <label class="control-label">Email*</label>
            {!! Form::text('email', null, ['class' => "form-control @if ($errors->has('email')) form-control-danger @endif"]) !!}
            @if ($errors->has('email')) <p class="form-control-feedback">{{ $errors->first('email') }}</p> @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('contact_1')) has-danger @endif">
            <label class="control-label">Contact 1*</label>
            {!! Form::text('contact_1', null, ['class' => "form-control @if ($errors->has('contact_1')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
            @if ($errors->has('contact_1')) <p class="form-control-feedback">{{ $errors->first('contact_1') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('contact_2')) has-danger @endif">
            <label class="control-label">Contact 2</label>
            {!! Form::text('contact_2', null, ['class' => "form-control @if ($errors->has('contact_2')) form-control-danger @endif", "data-mask" => "99 99 99 99"]) !!}
            @if ($errors->has('contact_2')) <p class="form-control-feedback">{{ $errors->first('contact_2') }}</p> @endif
        </div>



    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Professor files*</label>
            <input id="demo2" type="file" name="professor_files[]" multiple />
            <script>
                $('#demo2').fileselect();
            </script>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Établissement*</label>
            <select class="form-control" name="school">
                <option value="">--</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}" @if( isset($professor->school->id) && !empty($professor->school->id) && ($professor->school->id == $school->id) ) {{ ' selected' }} @endif >{{ $school->nom }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@if( !isset($professor) || empty($professor) )
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Matières</label>
            <select class="select2 m-b-10 select2-multiple select2-hidden-accessible" style="width: 100%" multiple="" data-placeholder="--" tabindex="-1" aria-hidden="true" name="subject[]">
                <option value="">--</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endif