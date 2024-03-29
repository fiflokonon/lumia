<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'evaluations';
    protected $fillable = [
        'enrolment_id',
        'formation_exam_id',
        'score',
        'pass',
        'status'
    ];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function formation_exam()
    {
        return $this->belongsTo(FormationExam::class);
    }
}
