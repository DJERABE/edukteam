
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <th>N°</th>
    <th>Article</th>
    <th>Quantité</th>
    <th>Unitaire</th>
    <th>Montant</th>
    <th>Remise</th>
    <th>Attendu</th>
    <th>Obligatoire</th>
    <th>Exclures</th>
    <tr>
        <td>1</td>
        <td>{{$factures->frais->nom}}</td>
        <td> 
            <div class="form-group @if ($errors->has('quantite')) has-danger @endif"> 
                <input type="mun" class="form-control @if ($errors->has('quantite')) form-control-danger @endif" value="1" name="quantite">
                @if ($errors->has('quantite')) <p class="form-control-feedback">{{ $errors->first('quantite') }}</p> @endif
            </div>
        </td>
        <td><input type="text" class="form-control @if ($errors->has('remise')) form-control-danger @endif" value="{{$factures->montant}}" name="unitaire" readonly="true"></td>
        <td><input type="text" class="form-control @if ($errors->has('remise')) form-control-danger @endif" value="{{$factures->montant}}" name="montant" readonly="true"></td>
        <td>
            <div class="form-group @if ($errors->has('remise')) has-danger @endif"> 
                <input type="text" class="form-control @if ($errors->has('remise')) form-control-danger @endif" value="0.0" name="remise">
                @if ($errors->has('remise')) <p class="form-control-feedback">{{ $errors->first('remise') }}</p> @endif
            </div>
        </td>
        <td>
            <div class="form-group @if ($errors->has('attendu')) has-danger @endif">
                <input type="text" class="form-control @if ($errors->has('attendu')) form-control-danger @endif" value="{{$factures->montant}}" name="attendu">
                @if ($errors->has('attendu')) <p class="form-control-feedback">{{ $errors->first('attendu') }}</p> @endif
            </div>
        </td>
        <td>
            <div class="form-group @if ($errors->has('obligatoire')) has-danger @endif"> 
                <input type="checkbox" class="form-control @if ($errors->has('obligatoire')) form-control-danger @endif"   name="obligatoire">
                @if ($errors->has('obligatoire')) <p class="form-control-feedback">{{ $errors->first('obligatoire') }}</p> @endif
            </div>
        </td>
        <td>
            <div class="form-group @if ($errors->has('exclure')) has-danger @endif">
                {{-- {!! Form::checkbox('quantite', null, ['class' => "form-control @if ($errors->has('quantite')) form-control-danger @endif"]) !!}  --}}
                <input type="checkbox" class="form-control @if ($errors->has('exclure')) form-control-danger @endif"  name="exclure">
                @if ($errors->has('exclure')) <p class="form-control-feedback">{{ $errors->first('exclure') }}</p> @endif
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Total</td>
        <td>{{$factures->montant}}</td>
        <td>{{$factures->montant}}</td>
        <td>Remise</td>
        <td>{{$factures->montant}}</td>
        <td></td>
        <td></td>
    </tr>
</table> 
        <input type="hidden"  value="{{$factures->id}}" name="frais_configs_id"> 
        <input type="hidden"  value="{{$etudiant->id}}" name="etudiant_id"> 
</div>