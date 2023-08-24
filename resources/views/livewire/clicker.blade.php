<div>
    <form wire:submit.prevent='createNewUser'>
        <input wire:model='name' type="text" name="name" placeholder="name">
        <input wire:model='email' type="text" name="email" placeholder="email">
        <input wire:model='password' type="password" name="password" placeholder="password">

        <button>Create</button>
    </form>

    <hr>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
