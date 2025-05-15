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
    public string $primaryKey = 'kampus_id';
    public string $sortField = 'kampus_id';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showToggleColumns()
                ->showSearchInput()
                ->includeViewOnTop('components.create_button'),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return KampusModel::query()->orderBy('kampus_id', 'asc');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('kampus_id')
            ->add('kampus_nama')
            ->add('kampus_alamat');
    }

    public function columns(): array
    {
        return [
            Column::make('Kampus id', 'kampus_id')->sortable(),
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
            Button::add('edit')
                ->slot('Edit: ' . $row->kampus_id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->kampus_id])
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
