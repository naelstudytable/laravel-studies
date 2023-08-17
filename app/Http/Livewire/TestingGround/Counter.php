<?php

namespace App\Http\Livewire\TestingGround;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;

    public function render()
    {
        return view('livewire.testing-ground.counter');
    }

    public function increment()
    {
        $this->counter++;
    }

    public function decrement()
    {
        $this->counter--;
    }
}
