<?php

namespace App\Http\Livewire\TestingGround;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;

    protected $queryString = ['search' => ''];

    public function render()
    {
        return view('livewire.testing-ground.search-users', [
            'users' => User::when(
                trim($this->search) !== '',
                fn ($users) => $users->where('name', 'LIKE', "%$this->search%"),
                fn ($users) => $users->whereNull("id"),
            )->get()
        ]);
    }
}
