<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_id',
    ];

    // Hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting attributes to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Check if the user is a super admin
    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    // Check if the user is an admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
