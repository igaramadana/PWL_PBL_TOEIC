<?php

namespace App\Livewire;

use App\Models\PendaftaranModel;
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

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return PendaftaranModel::query()->with('ujian');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('ujian.nama_ujian', fn(PendaftaranModel $model) => $model->ujian->nama_ujian ?? 'N/A')
            ->add('no_pendaftaran')
            ->add('user_id')
            ->add('tanggal_lahir_formatted', fn(PendaftaranModel $model) => Carbon::parse($model->tanggal_lahir)->format('d/m/Y H:i:s'))
            ->add('nik')
            ->add('alamat_asal')
            ->add('alamat_sekarang')
            ->add('foto_ktp')
            ->add('foto_ktm')
            ->add('status')
            ->add('created_at')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Ujian id', 'ujian_id'),
            Column::make('No pendaftaran', 'no_pendaftaran')
                ->sortable()
                ->searchable(),

            Column::make('User id', 'user_id'),
            Column::make('Tanggal lahir', 'tanggal_lahir_formatted', 'tanggal_lahir')
                ->sortable(),

            Column::make('Nik', 'nik')
                ->sortable()
                ->searchable(),

            Column::make('Alamat asal', 'alamat_asal')
                ->sortable()
                ->searchable(),

            Column::make('Alamat sekarang', 'alamat_sekarang')
                ->sortable()
                ->searchable(),

            Column::make('Foto ktp', 'foto_ktp')
                ->sortable()
                ->searchable(),

            Column::make('Foto ktm', 'foto_ktm')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('tanggal_lahir'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(PendaftaranModel $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
