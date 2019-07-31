
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Matricule*</label>
            {!! Form::text('matricule', null, ['class' => "form-control required"]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Nom*</label>
            {!! Form::text('last_name', null, ['class' => "form-control required"]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Prénoms*</label>
            {!! Form::text('given_names', null, ['class' => "form-control required"]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Date de naissance*</label>
            @if( isset($student->dob) && !empty($student->dob) )
                <input type="text" value="{{ date('d/m/Y', strtotime($student->dob)) }}" id="datepicker" name="dob" class="form-control @if ($errors->has('dob')) form-control-danger @endif" readonly>
            @else
                <input type="date" name="dob" class="form-control @if ($errors->has('dob')) form-control-danger @endif" id="datepicker" readonly>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Lieu de naissance*</label>
            {!! Form::text('place_birth', null, ['class' => "form-control required"]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Nationalité*</label>
            {!! Form::text('citizenship', null, ['class' => "form-control required"]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Adresse géographique*</label>
            {!! Form::text('address', null, ['class' => "form-control required"]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Code*</label>
            {!! Form::text('code', null, ['class' => "form-control required"]) !!}

        </div>

    </div>

        <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Photo d'identite*</label>
            <input id="demo3" type="file" name="student_avatar"/>
            <script>
                $('#demo3').fileselect();
            </script>
        </div>

    </div>

</div> 
<div class="row"> 
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Famille*</label>
            <select class="select2 form-control" name="familly_id" id="family">
                <option value="">--</option>
                <option value='new-family'>Nouvelle famille</option>
                @foreach($familles as $family)
                <option value="{{ $family->id }}"@if( isset($student->family) && !empty($student->family) && $family->id == $student->family->id ) {{ ' selected' }} @endif>{{ $family->code_family }} {{ $family->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div> 
<hr> 