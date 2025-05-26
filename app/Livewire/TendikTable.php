<?php

namespace App\Livewire;

use App\Models\UserModel;
use App\Models\KampusModel;
use App\Models\TendikModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class TendikTable extends PowerGridComponent
{
    public string $tableName = 'tendik-table-9uaxv2-table';
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }

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
        return TendikModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_id', function (TendikModel $tendik) {
                return $tendik->user->email;
            })
            ->add('foto_profile', function (TendikModel $tendik) {
                if ($tendik->user->foto_profile == null) {
                    return '<img src="' . $this->avatar->create($tendik->tendik_nama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64() . '" alt="Avatar" class="w-10 h-10 rounded-full" />';
                } else {
                    return '<img src="' . asset($tendik->user->foto_profile) . '" alt="Foto Profil" style="width:50px;height:50px;border-radius:50%;" />';
                }
            })
            ->add('nip')
            ->add('tendik_nama')
            ->add('no_telp')
            ->add('kampus_nama', function (TendikModel $model) {
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
            Column::make('Tendik Id', 'id'),
            Column::make('Foto Profile', 'foto_profile'),
            Column::make('Email', 'user_id'),
            Column::make('Nip', 'nip')
                ->sortable()
                ->searchable(),

            Column::make('Tendik nama', 'tendik_nama')
                ->sortable()
                ->searchable(),

            Column::make('No telp', 'no_telp')
                ->sortable()
                ->searchable(),

            Column::make('Kampus Nama', 'kampus_nama'),
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

    public function actions(TendikModel $row): array
    {
        return [
            Button::add('detail')
                ->slot(view('components.detail-button-tendik', [
                    'tendik_id' => $row->id,
                    'tendik_nama' => $row->tendik_nama,
                    'tendik_nip' => $row->nip,
                    'tendik_no_telp' => $row->no_telp,
                    'tendik_kampus' => $row->kampus->kampus_nama,
                    'tendik_foto_profile' => $row->user->foto_profile
                ])->render())
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
