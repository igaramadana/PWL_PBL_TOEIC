<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'foto_profile',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }

    public function admin()
    {
        return $this->hasOne(AdminModel::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(MahasiswaModel::class, 'user_id');
    }

    public function tendik()
    {
        return $this->hasOne(TendikModel::class, 'user_id');
    }
}
