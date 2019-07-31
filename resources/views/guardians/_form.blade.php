    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Type*</label>
                <select class="form-control" name="guardian_type" id="">
                    <option value="">--</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" @if( isset($guardian->guardian_type_id) && !empty($guardian->guardian_type_id) && $guardian->guardian_type_id == $type->id ) {{ ' selected' }} @endif >{{ $type->display_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Nom*</label>
                {!! Form::text('last_name', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Prénoms*</label>
                {!! Form::text('given_names', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Profession*</label>
                {!! Form::text('career', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Employeur*</label>
                {!! Form::text('employer', null, ['class' => "form-control"]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Adresse postale*</label>
                {!! Form::text('mailing_address', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tel. Bureau*</label>
                {!! Form::text('tel_work', null, ['class' => "form-control", 'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tel. Domicile*</label>
                {!! Form::text('tel_home', null, ['class' => "form-control", 'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Cel*</label>
                {!! Form::text('cell', null, ['class' => "form-control", 'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Email*</label>
                {!! Form::text('email', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label class="control-label">Adresse*</label>
                {!! Form::text('address', null, ['class' => "form-control"]) !!}
            </div>
        </div>
    </div>