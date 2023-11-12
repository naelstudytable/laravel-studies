<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $sortBy = 'created_at';
    #[Url(history:true)]
    public $sortDir = 'ASC';

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $admin = '';

    #[Url()]
    public $perPage = 5;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function setSortBy(string $sortByField)
    {
        if($sortByField === $this->sortBy) {
            $this->sortDir = $this->sortDir === 'DESC' ? 'ASC' : 'DESC';
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
        return view('livewire.datatable.users-table', [
            'users' => User::search($this->search)
            ->when($this->admin !== '', fn($q) => $q->where('is_admin', $this->admin))
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
