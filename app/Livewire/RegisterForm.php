<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|max:255|unique:users')]
    public $email;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $photo;

    public function render()
    {
        return view('livewire.register-form');
    }

    public function create()
    {
        sleep(2);

        $validated = $this->validate();

        if($this->photo) {
            $validated['photo'] = $this->photo->store('uploads', 'public');
        }

        $user = User::create($validated);

        $this->reset('name', 'email', 'password', 'photo');

        session()->flash('success', 'User Created!');

        $this->dispatch('user-created', $user);
        $this->dispatch('close-modal');
    }
}
