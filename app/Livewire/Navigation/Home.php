<?php

namespace App\Livewire\Navigation;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.navigation-test')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.navigation.home');
    }
}
