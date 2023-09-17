<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $search;

    public function mount($search="")
    {
        $this->search = $search;
    }

    #[On('user-created')]
    public function updateList($user = null)
    {
    }

    public function update()
    {
    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        // sleep(3);
        return view('livewire.users-list', [
            'users' => User::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(8)
        ]);
    }
}
