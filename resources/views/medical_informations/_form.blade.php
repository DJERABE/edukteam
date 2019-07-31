    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Groupe sanguin*</label>
                <select class="form-control" name="blood_group" id="">
                    <option value=""></option>
                    @foreach($blood_groups as $group)
                        <option value="{{ $group->id }}" @if(isset($medical_information->bloodgroup_id) && !empty($medical_information->bloodgroup_id) && ($medical_information->bloodgroup_id == $group->id)) {{ ' selected' }} @endif>{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Clinique / Hopital*</label>
                {!! Form::text('emergency_clinic', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Médecin traitant*</label>
                {!! Form::text('family_doctor', null, ['class' => "form-control"]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Tel*</label>
                {!! Form::text('family_doctor_tel', null, ['class' => "form-control", 'data-mask' => '99 99 99 99']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Antécédents médicaux*</label>
                <textarea name="medical_history" id="" cols="30" rows="10" class="form-control">@if(isset($medical_information->medical_history) && !empty($medical_information->medical_history)) {{ $medical_information->medical_history }} @endif</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Allergies*</label>
                <textarea name="allergies" id="" cols="30" rows="10" class="form-control">@if(isset($medical_information->allergies) && !empty($medical_information->allergies)) {{ $medical_information->allergies }} @endif</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Maladies infantiles*</label>
                <textarea name="childhood_diseases" id="" cols="30" rows="10" class="form-control">@if(isset($medical_information->childhood_diseases) && !empty($medical_information->childhood_diseases)) {{ $medical_information->childhood_diseases }} @endif</textarea>
            </div>
        </div>
    </div>