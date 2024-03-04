<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormationEnrolmentQuestion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'formation_enrolment_questions';
    protected $fillable = [
        'formation_id',
        'question_text',
        'status'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
