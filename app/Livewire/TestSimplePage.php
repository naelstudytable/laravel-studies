<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Test Simple Page')]
class TestSimplePage extends Component
{
    public User $user;
}
