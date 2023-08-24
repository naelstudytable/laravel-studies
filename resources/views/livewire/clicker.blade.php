<div>
    <form class="p-5" wire:submit.prevent='createNewUser'>
        <input wire:model='name' class="block rounded border border-gray-100 px-3 py-1 mt-2" type="text" name="name" placeholder="name">
        @error('name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        <input wire:model='email' class="block rounded border border-gray-100 px-3 py-1 mt-2" type="text" name="email" placeholder="email">
        @error('email')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        <input wire:model='password' class="block rounded border border-gray-100 px-3 py-1 mt-2" type="password" name="password" placeholder="password">
        @error('password')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <button type="submit" class="block rounded px-3 py-1 bg-gray-400 text-white mt-2">Create</button>
    </form>

    <hr>

    <ul class="p-5">
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
