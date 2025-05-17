<?php

namespace App\Livewire;

use App\Models\KampusModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class KampusTable extends PowerGridComponent
{
    public string $tableName = 'kampus-table-yh4dwj-table';

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
        return KampusModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('kampus_nama')
            ->add('kampus_alamat');
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title('No')
                ->field('row_number')
                ->index(),
            Column::make('Kampus id', 'id')->sortable(),
            Column::make('Kampus nama', 'kampus_nama')
                ->sortable()
                ->searchable(),

            Column::make('Kampus alamat', 'kampus_alamat')
                ->sortable()
                ->searchable(),

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

    public function actions(KampusModel $row): array
    {
        return [
            Button::add('detail')
                ->slot(view('components.detail-button-kampus', ['kampus_id' => $row->id])->render()),
            Button::add('edit')
                ->slot(view('components.edit-button-kampus', [
                    'kampus_id' => $row->id,
                    'kampus_nama' => $row->kampus_nama,
                    'kampus_alamat' => $row->kampus_alamat
                ])->render()),
            Button::add('delete')
                ->slot(view('components.delete-button-kampus', ['kampus_id' => $row->id])->render())
        ];
    }
    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            ['kampus-deleted' => '$refresh']
        );
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
