<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
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

    public function updatedName()
    {
        $this->name = ucwords($this->name);
    }

    public function render()
    {
        return view('livewire.register-form');
    }

    public function create()
    {
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

    #[Computed]
    public function randomName()
    {
        return fake('pt_BR')->name();
    }
}
