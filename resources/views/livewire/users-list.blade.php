{{-- wire:poll.keep-alive: when you want this component to be polled even when users are in different browser tabs --}}
{{-- wire:poll.visible: when you want this component to be polled only when it's visible on the screen. --}}
<div wire:poll.10s>
    <div class="p-6">
        <div class="flex justify-between items-center w-full mb-4 gap-2">
            <div class="w-full">
                {{-- wire:model.live: whenever a user types, it makes requests to synchronize the value in the input field with your property in the backend --}}
                {{-- wire:model.blur: a request is sent the focus leaves the input --}}
                {{-- wire:model.debounce.Xms: a network request will only be sent if the user stops typing for at least Xms --}}
                {{-- wire:model.throttle.Xms: as a user is typing continuously in the "title" field, a network request will be sent every Xms until the user is finished --}}
                <input
                wire:model.live='search'
                type="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Search...">
            </div>
            {{-- <div>
                <button
                wire:click='update'
                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                >Search</button>
            </div> --}}
        </div>
        <div class="relative overflow-x-auto rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Joined
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->users as $user)
                        <tr class="bg-white" wire:key='{{ $user->id }}'>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <div>
                                    <img class="w-10 h-10 rounded-lg" src="{{ $user->photo }}" alt="{{$user->name}}">
                                </div>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <div wire:click='viewUser({{$user}})'>
                                    <x-button text="View"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $this->users->links() }}
        </div>
    </div>

    <x-modal name="view-user" title="View users">
        <x-slot:body>
            @if ($selectedUser)
                @foreach ($selectedUser->toArray() as $key => $value)
                    <p><strong>{{$key}}: </strong>{{$value}}</p>
                @endforeach
            @endif
        </x-slot>
    </x-modal>
</div>
