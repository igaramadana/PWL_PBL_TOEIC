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
        'pas_foto',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'datetime'
    ];

    // Relasi ke ujian
    public function ujian()
    {
        return $this->belongsTo(UjianModel::class, 'ujian_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'user_id', 'user_id');
    }
    public function hasilUjian()
    {
        return $this->hasOne(UjianHasilModel::class, 'pendaftaran_id');
    }
}
