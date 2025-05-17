<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'admin_nama'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
