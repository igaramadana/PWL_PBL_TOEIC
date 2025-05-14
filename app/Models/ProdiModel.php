<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModel extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'prodi_id';
    protected $fillable = [
        'prodi_kode',
        'prodi_nama',
        'jurusan_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(JurusanModel::class, 'jurusan_id', 'jurusan_id');
    }
}
