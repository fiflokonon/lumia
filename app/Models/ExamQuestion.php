<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamQuestion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'exam_questions';
    protected $fillable = [
        'formation_exam_id',
        'question',
        'points',
        'status'
    ];

    public function formation_exam()
    {
        return $this->belongsTo(FormationExam::class);
    }

    public function answers()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
