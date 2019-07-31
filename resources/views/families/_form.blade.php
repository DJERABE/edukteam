   
   <div class="row">
        <div class="col-md-6">
            <div class="form-group @if ($errors->has('name')) has-danger @endif">
                <label class="control-label">Nom Famille*</label>
                {!! Form::text('name', null, ['class' => "form-control @if ($errors->has('name')) form-control-danger @endif"]) !!}
                @if ($errors->has('name')) <p class="form-control-feedback">{{ $errors->first('name') }}</p> @endif
            </div>
        </div>
        


    <div class="col-md-6">
            <div class="form-group @if ($errors->has('code_family')) has-danger @endif">
                <label class="control-label">Code Famille *</label>
                {!! Form::text('code_family', null, ['class' => "form-control @if ($errors->has('code_family')) form-control-danger @endif"]) !!}
                @if ($errors->has('code_family')) <p class="form-control-feedback">{{ $errors->first('code_family') }}</p> @endif
            </div>
        </div>
        

    </div>

  



