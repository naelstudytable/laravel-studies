<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserPage extends Component
{
    public $user;

    public function mount(User $user = null)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-page')
            ->layout('components.layouts.app')
            ->title('User Page');
    }
}
