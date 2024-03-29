<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'fields';
    protected $fillable = [
        'title',
        'code',
        'description',
        'status'
    ];

    public function specialities()
    {
        return $this->hasMany(FieldSpeciality::class);
    }
}
