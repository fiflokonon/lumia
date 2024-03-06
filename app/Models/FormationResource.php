<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormationResource extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'formation_resources';
    protected $fillable = [
        'title',
        'description',
        'formation_id',
        'type',
        'link',
        'status'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
