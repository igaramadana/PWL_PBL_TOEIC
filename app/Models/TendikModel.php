<?php

namespace App\Models;

use App\Models\KampusModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TendikModel extends Model
{
    use HasFactory;

    protected $table = 'tendik';
    protected $primaryKey = 'tendik_id';
    protected $fillable = [
        'user_id',
        'nip',
        'tendik_nama',
        'no_telp',
        'kampus_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function kampus()
    {
        return $this->belongsTo(KampusModel::class, 'kampus_id', 'kampus_id');
    }
}
