<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Models\Regu;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public $showEditModal = false;
    public $showFilters = false;
    public $filters = [
        'name' => '',
    ];

    public User $editing;
    
    public $password;

    protected $queryString = ['sorts'];

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public function rules() { return [
        'editing.name' => 'nullable',
        'editing.email' => 'sometimes|nullable|email',
        'password' => 'nullable',
        'editing.roles' => 'required',
        'editing.regus_id' => 'nullable',
    ]; }

    public function mount() { $this->editing = $this->makeBlankTransaction(); }
    public function updatedFilters() { $this->resetPage(); }

    public function makeBlankTransaction()
    {
        return User::make();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = $this->makeBlankTransaction();

        $this->showEditModal = true;
    }

    public function edit(User $transaction)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($transaction)) $this->editing = $transaction;

        $this->showEditModal = true;
    }



    public function save()
    {
        $this->validate();

        if ($this->password){

            $this->editing->password = Hash::make($this->password);
        }

        $this->editing->save();

        $this->notify('Data telah tersimpan');

        $this->showEditModal = false;
    }

    public function resetFilters() { $this->reset('filters'); }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->when($this->filters['name'], fn($query, $name) => $query->where('name', 'like', '%'.$name.'%'));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        $roles = User::ROLES;
        $regus = Regu::all();

        return view('livewire.admin.users', [
            'items' => $this->rows,
            'roles' => $roles,
            'regus' => $regus,
        ]);
    }
}
