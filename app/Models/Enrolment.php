<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrolment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'enrolments';
    protected $fillable = [
        'user_id',
        'formation_id',
        'payment_link',
        'payment_details',
        'payment_status',
        'enrolment_confirmation',
        'certificate_link',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
