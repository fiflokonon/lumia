<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationAnswer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'evaluation_answers';
    protected $fillable = [
        'evaluation_id',
        'exam_question_id',
        'question_option_id',
        'status'
    ];
}
