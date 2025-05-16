<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'nim',
        'mahasiswa_nama',
        'no_telp',
        'prodi_id',
        'status',
        'angkatan',
        'kampus_id',
        'daftar_ujian'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function prodi()
    {
        return $this->belongsTo(ProdiModel::class, 'prodi_id');
    }

    public function kampus()
    {
        return $this->belongsTo(KampusModel::class, 'kampus_id');
    }
}
