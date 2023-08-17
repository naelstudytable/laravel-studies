<div class="mb-4">
    <h4 class="text-2xl mb-2">Counter</h4>

    <div class="flex gap-6">
        <button wire:click='decrement' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            -
        </button>
        <div class="border border-black dark:border-white py-2 px-6 text-center rounded">
            {{ $counter }}
        </div>
        <button wire:click='increment' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            +
        </button>
    </div>
</div>
