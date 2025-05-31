<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianModel extends Model
{
    use HasFactory;

    protected $table = 'ujian';

    protected $fillable = [
        'nama_ujian',
        'jadwal_ujian',
        'waktu_ujian',
        'kuota',
        'admin_id'
    ];

    protected $casts = [
        'jadwal_ujian' => 'date',
        'waktu_ujian' => 'datetime'
    ];

    // Relasi ke pendaftaran
    public function pendaftar()
    {
        return $this->hasMany(PendaftaranModel::class, 'ujian_id');
    }

    // Relasi ke admin (jika ada model admin)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Accessor untuk format waktu ujian
    public function getWaktuUjianDisplayAttribute()
    {
        return $this->waktu_ujian ? $this->waktu_ujian->format('H:i') : '-';
    }
}
