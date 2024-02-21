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
      'image',
      'status',
      'type_formation_id'
    ];

    public function type_formation()
    {
        return $this->belongsTo(TypeFormation::class);
    }
}
