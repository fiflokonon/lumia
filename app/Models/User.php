<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'phone',
        'status',
        'address',
        'profile_picture',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isNotClient()
    {
        if ($this->role->code == 'client'){
            return false;
        }else{
            return true;
        }
    }
    public function permissions()
    {
        if ($this->role) {
            return $this->role->permissions;
        }

        return collect(); // Retourner une collection vide si l'utilisateur n'a pas de rôle défini.
    }

    public function permissionCodes()
    {
        return $this->permissions()->pluck('code')->unique()->toArray();
    }

    public function canDo(string $code)
    {
        if (in_array($code, $this->permissionCodes()))
            return true;
        else
            return false;
    }
}
