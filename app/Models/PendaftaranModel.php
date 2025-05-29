<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_ujian',
        'jadwal_ujian',
        'waktu_ujian',
        'kuota',
        'admin_id',
    ];

    protected $casts = [
        'jadwal_ujian' => 'date',
        'waktu_ujian' => 'string', // Changed from 'datetime' to 'string' to match the 'time' column
    ];

    protected $appends = [
        'waktu_ujian_display',
    ];

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }

    public function getWaktuUjianDisplayAttribute()
    {
        return $this->waktu_ujian ? substr($this->waktu_ujian, 0, 5) : null; // Ensure only HH:MM is returned
    }
}