<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyLevel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'study_levels';
    protected $fillable = [
      'title',
      'status'
    ];
}
