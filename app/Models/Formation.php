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
      'progress_status',
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

    public function resources()
    {
        return $this->hasMany(FormationResource::class)->orderBy('created_at');
    }

    public function exams()
    {
        return $this->hasMany(FormationExam::class);
    }
}
