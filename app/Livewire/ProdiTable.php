<?php

namespace App\Livewire;

use App\Models\ProdiModel;
use App\Models\JurusanModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ProdiTable extends PowerGridComponent
{
    public string $tableName = 'prodi-table-8jnp09-table';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showToggleColumns()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return ProdiModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('prodi_kode')
            ->add('prodi_nama')
            ->add('jurusan_nama', function (ProdiModel $model) {
                return $model->jurusan->jurusan_nama;
            })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title('No')
                ->field('row_number')
                ->index(),
            Column::make('Jurusan Id', 'id'),
            Column::make('Prodi kode', 'prodi_kode')
                ->sortable()
                ->searchable(),

            Column::make('Prodi nama', 'prodi_nama')
                ->sortable()
                ->searchable(),

            Column::make('Jurusan Nama', 'jurusan_nama'),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(ProdiModel $row): array
    {
        $jurusan = JurusanModel::all();
        return [
            Button::add('detail')
                ->slot(view('components.detail-button-prodi', [
                    'prodi_id' => $row->id,
                    'prodi_kode' => $row->prodi_kode,
                    'prodi_nama' => $row->prodi_nama,
                    'jurusan_nama' => $row->jurusan->jurusan_nama ?? '-',
                ])->render()),
            Button::add('edit')
                ->slot(view('components.edit-button-prodi', [
                    'prodi_id' => $row->id,
                    'prodi_kode' => $row->prodi_kode,
                    'prodi_nama' => $row->prodi_nama,
                    'jurusan_id' => $row->jurusan_id,
                    'jurusan' => $jurusan,
                ])->render()),
            Button::add('delete')
                ->slot(view('components.delete-button-prodi', ['prodi_id' => $row->id])->render())
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
