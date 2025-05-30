<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianHasilModel extends Model
{
    use HasFactory;

    protected $table = 'ujian_hasil';

    protected $fillable = [
        'nama_hasil_ujian', // Match database column name
        'waktu_ujian', // Match database column name (date)
        'jam_ujian', // Match database column name (time)
        'kuota',
        'status',
        'admin_id',
    ];

    protected $casts = [
        'waktu_ujian' => 'date',
        'jam_ujian' => 'string',
    ];

    protected $appends = [
        'jam_ujian_display',
    ];

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }

    public function getJamUjianDisplayAttribute()
    {
        return $this->jam_ujian ? substr($this->jam_ujian, 0, 5) : null;
    }

    // Accessor untuk compatibility dengan form fields
    public function getNamaUjianAttribute()
    {
        return $this->nama_hasil_ujian;
    }

    public function getJadwalUjianAttribute()
    {
        return $this->waktu_ujian;
    }

    public function getWaktuUjianDisplayAttribute()
    {
        return $this->jam_ujian ? substr($this->jam_ujian, 0, 5) : null;
    }

    // Mutator untuk compatibility dengan form fields
    public function setNamaUjianAttribute($value)
    {
        $this->attributes['nama_hasil_ujian'] = $value;
    }

    public function setJadwalUjianAttribute($value)
    {
        $this->attributes['waktu_ujian'] = $value;
    }

    public function setWaktuUjianAttribute($value)
    {
        $this->attributes['jam_ujian'] = $value;
    }
}