<div>
    <h4 class="text-2xl mb-2">User Finder</h4>

    <div class="flex space-x-4 mb-2">
        <input
            wire:model='search'
            value="{{$search}}"
            type="text"
            class="bg-transparent border border-black dark:border-white py-2 rounded w-full"
            placeholder="Search">
    </div>

    <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 max-h-52 overflow-y-auto">
        @forelse ($users as $user)
            <div class="flex flex-col pb-2">
                <dt class="text-lg font-semibold">{{ $user->name }}</dt>
                <dd class="text-gray-500 md:text-lg dark:text-gray-400">{{ $user->email }}</dd>
            </div>
        @empty
            @if(trim($search)!=="")
                <div class="flex flex-col pb-2">
                    <dt class="text-lg font-semibold">No results.</dt>
                </div>
            @endif
        @endforelse
    </dl>
</div>
