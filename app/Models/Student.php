<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
   
   use SoftDeletes;

    protected $fillable = [
        'matricule',
        'last_name',
        'given_names',
        'dob',
        'place_birth',
        'citizenship',
        'address',
        'school_id',
        'familly_id',
        'code',
        'student_avatar'
    ];

    protected $dates = ['deleted_at'];

    public function guardians() {
        return $this->belongsToMany('App\Models\Guardian', 'guardian_student')->withTimestamps();
    }



    public function classes() {
        return $this->belongsToMany('App\Models\Classe', 'class_student')->withPivot('school_id', 'academic_year_id', 'studylevel_id', 'previous_school', 'academic_file')->withTimestamps();
    }

    public function medical_informations() {
        return $this->hasMany('App\Models\MedicalInformation');
    }

    public function studentbills(){

      return $this->hasMany('App\Models\StudentBill');
  }

  public function family(){
    return $this->belongsTo('App\Models\Familly','familly_id');
  }
  
  public function contacts(){
      return $this->belongsToMany('App\Models\Contact','contact_student')->withTimestamps();
  }

  public static function calcul_age($birth_date){
    //explode the date to get month, day and year
    $birth_date = explode("-", $birth_date);
    //get age from date or birth_date
    $age = (date("md", date("U", mktime(0, 0, 0, $birth_date[0], $birth_date[1], $birth_date[2]))) > date("md")
        ? ((date("Y") - $birth_date[2]) - 1)
        : (date("Y") - $birth_date[2]));
    return $age;
  }

      public function school(){

      return $this->belongsTo('App\Models\School');
    }


}
