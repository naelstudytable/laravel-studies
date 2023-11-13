<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactUs extends Component
{
    use WithFileUploads;

    public ContactUsForm $form;

    #[Rule('nullable|array')]
    #[Rule(['images.*' => 'image|max:2048'])]
    public $images;

    public function submitForm()
    {
        $this->validate();
        $this->form->validate();

        if(is_array($this->images)) {
            foreach ($this->images as $image) {
                $image->store('images', 'public');
            }
        }

        // sending email
        $this->form->sendEmail();

        session()->flash('success', 'Form submited!');

        $this->reset('images');
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
