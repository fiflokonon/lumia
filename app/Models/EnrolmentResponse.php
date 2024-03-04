<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnrolmentResponse extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'enrolment_responses';
    protected $fillable = [
        'enrolment_id',
        'formation_enrolment_question_id',
        'response_text',
        'status'
    ];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function enrolment_question()
    {
        return $this->belongsTo(FormationEnrolmentQuestion::class);
    }
}
