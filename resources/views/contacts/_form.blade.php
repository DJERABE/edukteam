    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Type*</label>
                <select class="form-control" name="guardian_type" id="">
                    <option value="">--</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}"@if( isset($contact->guardian_type) && !empty($contact->guardian_type) && $type->id == $contact->guardian_type->id ) {{ ' selected' }} @endif>{{ $type->display_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6"> 
            <div class="form-group">
                <label class="control-label">Code Famille*</label>
                <select class="select2 form-control" name="family" >
                        <option value="">--</option>
                    @foreach($families as $family)
                    <option value="{{ $family->id }}"@if( isset($contact->family) && !empty($contact->family) && $family->id == $contact->family->id ) {{ ' selected' }} @endif>{{ $family->code_family }} </option>
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
                <label class="control-label">Email*</label>
                {!! Form::text('email', null, ['class' => "form-control"]) !!}
            </div>
        </div>
    </div>
    {{--  <div class="row">
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
    </div>  --}}
    <div class="row">


        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Adresse*</label>
                {!! Form::text('address', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tel. Bureau*</label>
                {!! Form::text('tel_home', null, ['class' => "form-control",'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Mobile*</label>
                {!! Form::text('cell', null, ['class' => "form-control",'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
        
        <div class="col-md-3">
        <div class="form-group @if ($errors->has('is_contact')) has-danger @endif">                
                <br><br>  
                <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="is_contact"  name="is_contact" checked>
                     <label class="custom-control-label" for="is_contact">A contacter ?</label>
                  </div>
         </div>
        </div>
    </div>


