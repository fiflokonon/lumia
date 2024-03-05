<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'formations';
    protected $fillable = [
      'title',
      'description',
      'enrolment_deadline',
      'duration',
      'start_date',
      'end_date',
      'price',
      'pre_link',
      'official_link',
      'image',
      'status',
      'type_formation_id',
      'field_speciality_id',
       'place'
    ];

    public function type_formation()
    {
        return $this->belongsTo(TypeFormation::class);
    }

    public function field_speciality()
    {
        return $this->belongsTo(FieldSpeciality::class);
    }

    public function enrolment_questions()
    {
        return $this->hasMany(FormationEnrolmentQuestion::class);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }
}
