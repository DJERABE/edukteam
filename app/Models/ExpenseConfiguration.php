<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseConfiguration extends Model
{
  
    protected $fillable =
    [
      'school_id',
      'academic_year_id',
      'expense_id',
      'studylevel_id',
      'echeance',
      'amount',
      'is_required',
      'echeance'
    ];

    public function school() {
       return $this->belongsTo('App\Models\School');
    }

    public function expense() {
       return $this->belongsTo('App\Models\Expense');
    }

    public function studylevel() {
       return $this->belongsTo('App\Models\StudyLevel', 'studylevel_id');
    }

    public function academic_year() {
       return $this->belongsTo('App\Models\AcademicYear');
    }

    public function student_bills() {
      return $this->belongsToMany('App\Models\StudentBill', 'expense_configuration_student_bill')
                  ->withPivot('unitaire', 'quantite', 'remise', 'montant_attendu', 'montant_paye', 'montant_restant')
                  ->withTimestamps();
    }

    
}
