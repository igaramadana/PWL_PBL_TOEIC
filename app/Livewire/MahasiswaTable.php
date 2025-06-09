<?php

namespace App\Livewire;

use App\Models\MahasiswaModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Laravolt\Avatar\Avatar;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MahasiswaTable extends PowerGridComponent
{
    public string $tableName = 'mahasiswa-table-sswuoj-table';
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
        return MahasiswaModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_id', function (MahasiswaModel $mahasiswa) {
                return $mahasiswa->user->email;
            })
            ->add('foto_profile', function (MahasiswaModel $mahasiswa) {
                if ($mahasiswa->foto_profile == null) {
                    return '<img src="' . $this->avatar->create($mahasiswa->mahasiswa_nama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64() . '" alt="Avatar" class="w-10 h-10 rounded-full" />';
                } else {
                    return '<img src="' . asset('storage/' . $mahasiswa->foto_profile) . '" alt="Foto Profil" style="width:40px;height:40px;border-radius:50%;" />';
                }
            })
            ->add('nim')
            ->add('mahasiswa_nama')
            ->add('no_telp')
            ->add('prodi_id', function (MahasiswaModel $mahasiswa) {
                return $mahasiswa->prodi->prodi_nama;
            })
            ->add('status')
            ->add('angkatan')
            ->add('daftar_ujian', function (MahasiswaModel $mahasiswa) {
                if ($mahasiswa->daftar_ujian == true) {
                    return 'Sudah Daftar';
                } else {
                    return 'Belum Daftar';
                }
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
            Column::make('Mahasiswa Id', 'id'),
            Column::make('Foto Profile', 'foto_profile'),
            Column::make('email', 'user_id'),
            Column::make('Nim', 'nim')
                ->sortable()
                ->searchable(),

            Column::make('Mahasiswa nama', 'mahasiswa_nama')
                ->sortable()
                ->searchable(),

            Column::make('No telp', 'no_telp')
                ->sortable()
                ->searchable(),

            Column::make('Prodi id', 'prodi_id'),
            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Angkatan', 'angkatan')
                ->sortable()
                ->searchable(),

            Column::make('Daftar ujian', 'daftar_ujian')
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

    public function actions(MahasiswaModel $row): array
    {
        return [
            Button::add('detail')
                ->slot(view('components.mahasiswa.detail-button-mahasiswa', [
                    'mahasiswa_id' => $row->id,
                    'mahasiswa_nama' => $row->mahasiswa_nama,
                    'mahasiswa_nim' => $row->nim,
                    'mahasiswa_no_telp' => $row->no_telp,
                    'mahasiswa_prodi' => $row->prodi->prodi_nama,
                    'mahasiswa_foto_profile' => $row->user->foto_profile
                ])->render()),

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
