<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class StudentBill extends Model
{
  
	protected $fillable = [
        'ref',
        'school_id',
        'classe_id',
        'academic_year_id',
        'student_id',
        'montant_total_attendu',
        'montant_total_paye',
        'montant_total_restant',
        'revoked'
    ];

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }

    public function academic_year() {
        return $this->belongsTo('App\Models\AcademicYear');
    }

    public function school() {
        return $this->belongsTo('App\Models\School');
    }

    public function classe() {
        return $this->belongsTo('App\Models\Classe');
    }

    public function expense_configurations() 
    {
        return $this->belongsToMany('App\Models\ExpenseConfiguration', 'expense_configuration_student_bill')
                    ->withPivot('unitaire', 'quantite', 'remise', 'montant_attendu', 'montant_paye', 'montant_restant')
                    ->withTimestamps();
    }
    
}
