<?php

namespace App\Livewire;

use Livewire\Component;

class SweetAlertEvent extends Component
{
    public $confirmed = false;

    public function render()
    {
        return view('livewire.sweet-alert-event');
    }

    public function confirm()
    {
        $this->confirmed = true;

        $this->dispatch(
            'confirmed-alert',
            type: 'success',
            title: 'Confirmed!',
            position: 'center'
        );
    }

    public function unconfirm()
    {
        $this->confirmed = false;

        $this->dispatch(
            'confirmed-alert',
            type: 'error',
            title: 'Unconfirmed!',
            position: 'center'
        );
    }
}
