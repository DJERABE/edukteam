<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Reference facture*</label>
            <select class="select2 form-control" name="student_bill" id="student_bill">
                <option value="">--</option>
                @foreach($student_bills as $student_bill)
                <option value="{{$student_bill->id}}">{{ $student_bill->ref}} | {{$student_bill->student->last_name}} {{$student_bill->student->given_names}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Montant Recu*</label>
            <div class="input-group">
                <input class="form-control" type="number" name="montant_recu" min="0">
                <div class="btn btn-info input-group-addon">FCFA</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Type de paiement*</label>
            <select class="form-control" name="payment_type" id="payment_type">
                <option value="">--</option>
                @foreach($payment_types as $type)
                    <option value="{{ $type->id }}" >{{ $type->display_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4" id="payment_type_num">
        <div class="form-group">
            <label class="control-label">Numero*</label>
            <input type="text" class="form-control" name="payment_type_num">
        </div>
    </div>
</div>