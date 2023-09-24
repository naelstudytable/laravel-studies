<div>
    <div x-on:click="$dispatch('open-modal', {name: 'test'})">
        <x-button text='Open modal'></x-button>
    </div>

    <div>
        @livewire('users-list')
    </div>

    <x-modal name="test">
        <x-slot:body>
            @livewire('register-form')
        </x-slot>
    </x-modal>
</div>

