<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldSpeciality extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'field_specialities';
    protected $fillable = [
        'title',
        'code',
        'description',
        'field_id',
        'status'
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
