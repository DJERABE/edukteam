<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
	
    protected $fillable = ['nom','school_id','echeance_date'];


    public function school(){

    	return $this->belongsTo('App\Models\School');
    }

    public function expense_configurations(){

    	return $this->hasMany('App\Models\ExpenseConfiguration');
    }
}