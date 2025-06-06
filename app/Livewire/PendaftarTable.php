<?php

namespace App\Livewire;

use App\Models\MahasiswaModel;
use Illuminate\Support\Carbon;
use App\Models\PendaftaranModel;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class PendaftarTable extends PowerGridComponent
{
    public string $tableName = 'pendaftar-table-3xu78r-table';
    public int $ujianId;

    use WithExport;
    public function setUp(): array
    {
        return [
            PowerGrid::exportable(fileName: 'pendaftaran-toeic-' . Carbon::now()->format('d-m-Y') . '.xlsx')
                ->type(Exportable::TYPE_XLS),
            PowerGrid::header()
                ->showSearchInput(),

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
            Column::add()
                ->title('No')
                ->field('row_number')
                ->visibleInExport(false)
                ->index(),
            Column::make('No Pendaftaran', 'no_pendaftaran')
                ->visibleInExport(true)
                ->sortable()
                ->searchable(),

            Column::make('Nama Mahasiswa', 'mahasiswa_nama')
                ->sortable()
                ->visibleInExport(true)
                ->searchable(),

            Column::make('NIM', 'mahasiswa_nim')
                ->sortable()
                ->visibleInExport(true)
                ->searchable(),

            Column::make('Program Studi', 'prodi')
                ->sortable()
                ->visibleInExport(true)
                ->searchable(),

            Column::make('Tanggal Lahir', 'tanggal_lahir_formatted', 'tanggal_lahir')
                ->sortable()
                ->visibleInExport(true),

            Column::make('Status', 'status')
                ->sortable()
                ->visibleInExport(true)
                ->searchable(),

            Column::make('Tanggal Daftar', 'created_at_formatted', 'created_at')
                ->sortable()
                ->visibleInExport(true),

            Column::action('Aksi')
        ];
    }

    public function actions(PendaftaranModel $row): array
    {
        return [
            Button::add('detail')
                ->slot('Detail')
                ->class('px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500')
                ->route('admin.detail.pendaftaran', ['id' => $row->id]),
        ];
    }
}
