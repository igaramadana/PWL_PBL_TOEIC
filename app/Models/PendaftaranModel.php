<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $fillable = [
        'ujian_id',
        'no_pendaftaran',
        'user_id',
        'tanggal_lahir',
        'nik',
        'alamat_asal',
        'alamat_sekarang',
        'foto_ktp',
        'foto_ktm',
        'status',
        'created_at',
    ];

    public function ujian()
    {
        return $this->belongsTo(UjianModel::class, 'ujian_id', 'id');
    }
}
