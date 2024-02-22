<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'field_categories';
    protected $fillable = [
        'title',
        'code',
        'description',
        'field_id',
        'status'
    ];
}
