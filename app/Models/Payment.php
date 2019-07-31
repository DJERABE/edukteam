<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	
    protected $fillable = ['school_id', 'montant_recu', 'payment_type_id', 'payment_type_num', 'student_bill_id'];

    public function payment_type()
    {
        return $this->belongsTo('App\Models\PaymentType', 'payment_type_id');
    }

    public function student_bill()
    {
        return $this->belongsTo('App\Models\StudentBill', 'student_bill_id');
    }
}
