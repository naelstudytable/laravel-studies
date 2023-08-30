<div class="flex justify-center p-5">
    <div class="lg:w-1/2 w-full">
        <h2 class="text-3xl font-bold mb-2">Todo list</h2>

        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
            <form wire:submit.prevent='createTask' class="mb-6">
                @if(session('success'))
                    <div class="px-3 py-1 border border-green-500 bg-green-300 rounded">{{ session('success') }}</div>
                @endif

                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Create new task</h5>

                <div class="flex gap-6">
                    <div class="w-full">
                        <input
                            wire:model='contentNewTask'
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5"
                            placeholder="Type a task..."
                            name="contentNewTask">
                        @error('contentNewTask')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            +
                        </button>
                    </div>
                </div>
            </form>

            <div>
                <div class="flex justify-center mb-6">
                    <input
                        wire:model.live='search'
                        type="text"
                        class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block p-2.5"
                        placeholder="Search...">
                </div>

                <div class="max-h-80 overflow-y-auto">
                    @forelse ($tasks as $key => $task)
                        <div wire:key='{{ $task->id }}' class="mb-2 px-6 py-2 bg-white border border-gray-200 rounded-lg shadow">
                            <div class="flex gap-6">
                                <lable class="flex">
                                    <input
                                        type="checkbox"
                                        wire:click="toogleDoneTask({{ $task }})"
                                        @if($task->done) checked @endif><br>
                                </lable>
                                <div class="w-full flex justify-between flex-col-reverse lg:flex-row">
                                    <div class="flex flex-col">
                                        <form wire:submit.prevent='updateTask' @class([
                                                'hidden' => !$task->taskIsInEdit($taskInEdition),
                                                'flex' => $task->taskIsInEdit($taskInEdition),
                                                'flex-wrap'=> $task->taskIsInEdit($taskInEdition), 'gap-3'
                                            ])>
                                            <div>
                                                <input
                                                    wire:model='contentEdit'
                                                    type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                                    focus:border-blue-500 block w-full p-2.5"
                                                    name="content"
                                                    >
                                            </div>
                                            <div class="flex gap-3">
                                                <button
                                                    title="Save"
                                                    type="submit"
                                                    class="text-green-300 hover:text-green-500 px-1 rounded">V</button>
                                                <button
                                                    title="Cancel"
                                                    wire:click='toogleTaskInEdition({{$task}})'
                                                    type="button"
                                                    class="text-red-500 hover:text-red-700 px-1 rounded">C</button>
                                            </div>
                                        </form>
                                        <div @class(['hidden' => $task->taskIsInEdit($taskInEdition)])>
                                            <div class="text-sm sm:text-base">{{ $task->content }}</div>
                                            <div><small class="text-gray-500">{{ $task->created_at }}</small></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end items-start gap-1">
                                        <button
                                            title="Edit"
                                            wire:click='toogleTaskInEdition({{$task}})'
                                            type="button"
                                            class="text-orange-300 hover:text-orange-500 px-1 rounded">E</button>
                                        <button
                                            title="Delete"
                                            wire:click='deleteTask({{$task}})'
                                            type="button"
                                            class="text-red-500 hover:text-red-700 px-1 rounded">D</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <livewire:todo.task :$task :key="$task->id"/> --}}
                    @empty
                        <div class="text-center">
                            <strong>Create your tasks.</strong>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
