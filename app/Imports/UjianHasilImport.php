<?php

namespace App\Imports;

use App\Models\PendaftaranModel;
use App\Models\UjianHasilModel;
use App\Models\UjianModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class UjianHasilImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    protected $ujian;

    public function __construct(UjianModel $ujian)
    {
        $this->ujian = $ujian;
    }

    public function model(array $row)
    {
        // Cari pendaftaran berdasarkan no pendaftaran dan ujian_id
        $pendaftaran = PendaftaranModel::where('no_pendaftaran', $row['no_pendaftaran'])
            ->where('ujian_id', $this->ujian->id)
            ->firstOrFail(); // Gunakan firstOrFail untuk langsung throw exception jika tidak ditemukan

        // Hitung total skor jika tidak disediakan di Excel
        $total_skor = $row['total_skor'] ?? ($row['listening'] + $row['reading']);

        // Update atau create hasil ujian
        return UjianHasilModel::updateOrCreate(
            ['pendaftaran_id' => $pendaftaran->id],
            [
                'skor_listening' => $row['listening'],
                'skor_reading' => $row['reading'],
                'total_skor' => $total_skor
            ]
        );
    }

    public function rules(): array
    {
        return [
            'no_pendaftaran' => 'required|string|exists:pendaftaran,no_pendaftaran,ujian_id,' . $this->ujian->id,
            'listening' => 'required|numeric|min:0|max:495',
            'reading' => 'required|numeric|min:0|max:495',
            'total_skor' => 'nullable|numeric|min:0|max:990'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'no_pendaftaran.required' => 'Kolom no pendaftaran harus diisi',
            'listening.required' => 'Kolom listening harus diisi',
            'listening.numeric' => 'Kolom listening harus berupa angka',
            'listening.min' => 'Nilai listening minimal 0',
            'listening.max' => 'Nilai listening maksimal 495',
            'reading.required' => 'Kolom reading harus diisi',
            'reading.numeric' => 'Kolom reading harus berupa angka',
            'reading.min' => 'Nilai reading minimal 0',
            'reading.max' => 'Nilai reading maksimal 495',
            'total_skor.required' => 'Kolom total skor harus diisi',
            'total_skor.numeric' => 'Kolom total skor harus berupa angka',
            'total_skor.min' => 'Nilai total skor minimal 0',
            'total_skor.max' => 'Nilai total skor maksimal 990',
        ];
    }
}
