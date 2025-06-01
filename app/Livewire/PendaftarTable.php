<?php

namespace App\Livewire;

use App\Models\PendaftaranModel;
use App\Models\MahasiswaModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PendaftarTable extends PowerGridComponent
{
    public string $tableName = 'pendaftar-table-3xu78r-table';
    public int $ujianId;
    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput()
                ->showToggleColumns(),

            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return PendaftaranModel::query()
            ->with(['mahasiswa', 'ujian'])
            ->where('ujian_id', $this->ujianId);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('no_pendaftaran')
            ->add('mahasiswa_nama', fn(PendaftaranModel $model) => $model->mahasiswa->mahasiswa_nama ?? 'N/A')
            ->add('mahasiswa_nim', fn(PendaftaranModel $model) => $model->mahasiswa->nim ?? 'N/A')
            ->add('prodi', fn(PendaftaranModel $model) => $model->mahasiswa->prodi->prodi_nama ?? 'N/A')
            ->add('tanggal_lahir_formatted', fn(PendaftaranModel $model) => Carbon::parse($model->tanggal_lahir)->format('d/m/Y'))
            ->add('status')
            ->add('created_at_formatted', fn(PendaftaranModel $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('No Pendaftaran', 'no_pendaftaran')
                ->sortable()
                ->searchable(),

            Column::make('Nama Mahasiswa', 'mahasiswa_nama')
                ->sortable()
                ->searchable(),

            Column::make('NIM', 'mahasiswa_nim')
                ->sortable()
                ->searchable(),

            Column::make('Program Studi', 'prodi')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Lahir', 'tanggal_lahir_formatted', 'tanggal_lahir')
                ->sortable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Daftar', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Aksi')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('no_pendaftaran')->operators(['contains']),
            Filter::inputText('mahasiswa_nama')->operators(['contains']),
            Filter::inputText('mahasiswa_nim')->operators(['contains']),
        ];
    }

    public function actions(PendaftaranModel $row): array
    {
        return [
            Button::add('detail')
                ->slot('Detail')
                ->class('px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500')
                ->route('ujian.detail', ['id' => $row->id]),
        ];
    }
}
