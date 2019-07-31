<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Jour</label>
            <input type="text" name="" id="" class="form-control" value="{{ $day->name }}" readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('subject')) has-danger @endif">
            <label class="control-label">Matière*</label>
            <select class="form-control @if ($errors->has('subject')) form-control-danger @endif" name="subject" id="subject">
                <option value="">--</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('subject')) <p class="form-control-feedback">{{ $errors->first('subject') }}</p> @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group @if ($errors->has('professor')) has-danger @endif">
            <label class="control-label">Professeur*</label>
            <select class="form-control @if ($errors->has('professor')) form-control-danger @endif" name="professor" id="professor">
                <option value="">--</option>
            </select>
            @if ($errors->has('professor')) <p class="form-control-feedback">{{ $errors->first('professor') }}</p> @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group @if ($errors->has('start')) has-danger @endif">
            <label class="control-label">Début*</label>
            {!! Form::text('start', null, ['class' => "form-control @if ($errors->has('start')) form-control-danger @endif", 'data-mask' => "99:99"]) !!}
            @if ($errors->has('start')) <p class="form-control-feedback">{{ $errors->first('start') }}</p> @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group @if ($errors->has('end')) has-danger @endif">
            <label class="control-label">Fin*</label>
            {!! Form::text('end', null, ['class' => "form-control @if ($errors->has('end')) form-control-danger @endif", 'data-mask' => "99:99"]) !!}
            @if ($errors->has('end')) <p class="form-control-feedback">{{ $errors->first('end') }}</p> @endif
        </div>
    </div>
</div>