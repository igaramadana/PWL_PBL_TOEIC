<?php

namespace App\Livewire;

use App\Models\KampusModel;
use App\Models\JurusanModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class JurusanTable extends PowerGridComponent
{
    public string $tableName = 'jurusan-table-kbhfuz-table';

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
        return JurusanModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('jurusan_kode')
            ->add('jurusan_nama')
            ->add('kampus_nama', function (JurusanModel $model) {
                return $model->kampus->kampus_nama;
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
            Column::make('Jurusan Id', 'id')->sortable(),
            Column::make('Jurusan kode', 'jurusan_kode')
                ->sortable()
                ->searchable(),

            Column::make('Jurusan nama', 'jurusan_nama')
                ->sortable()
                ->searchable(),

            Column::make('Kampus', 'kampus_nama'),

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

    public function actions(JurusanModel $row): array
    {
        $kampus = KampusModel::all();

        return [
            Button::add('edit')
                ->slot(view('components.edit-button-jurusan', [
                    'jurusan_id' => $row->id,
                    'jurusan_kode' => $row->jurusan_kode,
                    'jurusan_nama' => $row->jurusan_nama,
                    'kampus_id' => $row->kampus_id,
                    'kampus' => $kampus,
                ])->render()),
            Button::add('delete')
                ->slot(view('components.delete-button-jurusan', ['jurusan_id' => $row->id])->render())
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
