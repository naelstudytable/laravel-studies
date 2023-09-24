@props(['name', 'title'])
<div tabindex="-1"
    x-data="{ open: false, name: '{{$name}}' }"
    x-name="{{ $name }}"
    x-show="open"
    x-on:open-modal.window="$event.detail.name === name ? open = true : null"
    x-on:close-modal.window="$event.detail.name === name ? open = false : null"
    x-on:keydown.window.escape="open = false"
    x-transition
    class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <!-- Modal background -->
    <div x-on:click="open = false" class="fixed inset-0 bg-gray-300 opacity-40"></div>

    <div class="relative m-auto w-full max-w-2xl max-h-full">

        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">

            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $title ?? 'Title' }}
                </h3>
                <button type="button"
                    x-on:click="open = false"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                    data-modal-hide="defaultModal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                {{ $body }}
            </div>
        </div>
    </div>
</div>
