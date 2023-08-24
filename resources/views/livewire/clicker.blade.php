<div>
    <h1>{{ $title }}</h1>
    <p>User counter: {{ count($users) }}</p>
    <button wire:click='createNewUser'>Create new user</button>
</div>
