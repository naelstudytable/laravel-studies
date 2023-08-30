<div class="mb-2 px-6 py-2 bg-white border border-gray-200 rounded-lg shadow">
    <div class="flex gap-6">
        <lable class="flex">
            <input
                type="checkbox"
                wire:click="toogleDoneTask({{ $task }})"
                @if($task->done) checked @endif><br>
        </lable>
        <div class="w-full flex justify-between flex-col-reverse lg:flex-row">
            <div class="flex flex-col">
                <div @class(['hidden' => !$isEditing, 'flex' => $isEditing, 'flex-wrap'=> $isEditing, 'gap-3'])>
                    <div>
                        <input
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5"
                            name="content"
                            value="{{ $task->content }}"
                            >
                    </div>
                    <div class="flex gap-3">
                        <button
                            type="button"
                            class="text-green-300 hover:text-green-500 px-1 rounded">V</button>
                        <button
                            wire:click='toogleIsEditing'
                            type="button"
                            class="text-red-500 hover:text-red-700 px-1 rounded">C</button>
                    </div>
                </div>
                <div @class(['hidden' => $isEditing])>
                    <div class="text-sm sm:text-base">{{ $task->content }}</div>
                    <div><small class="text-gray-500">{{ $task->created_at }}</small></div>
                </div>
            </div>
            <div class="flex justify-end items-start gap-1">
                <button
                    wire:click='toogleIsEditing'
                    type="button"
                    class="text-orange-300 hover:text-orange-500 px-1 rounded">E</button>
                <button
                    wire:click='deleteTask({{$task}})'
                    type="button"
                    class="text-red-500 hover:text-red-700 px-1 rounded">D</button>
            </div>
        </div>
    </div>
</div>
