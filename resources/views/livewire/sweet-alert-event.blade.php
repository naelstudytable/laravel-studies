<div>
    @if (!$confirmed)
        <button wire:click='confirm' class="bg-green-500 rounded text-white p-2.5">Click to confirm</button>
    @else
        <button wire:click='unconfirm' class="bg-red-500 rounded text-white p-2.5">Click to unconfirm</button>
    @endif

    <p class="p-2.5 mt-4 @if (!$confirmed) {{'bg-red-300'}} @else {{'bg-green-300'}} @endif  ">
        You did @if (!$confirmed)
            not
        @endif confirm!
    </p>
</div>
