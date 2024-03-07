<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'question_options';
    protected $fillable = [
        'exam_question_id',
        'option',
        'is_correct',
        'status'
    ];

    public function exam_question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }
}
