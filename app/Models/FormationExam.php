<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormationExam extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'formation_exams';
    protected $fillable = [
        'title',
        'description',
        'total_points',
        'accepted_score',
        'duration',
        'formation_id',
        'available',
        'status'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
