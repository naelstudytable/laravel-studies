<?php

namespace App\Livewire\Todo;

use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{
    public ModelsTask $task;
    public $isEditing = false;

    public function mount(ModelsTask $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.todo.task');
    }

    public function toogleDoneTask(ModelsTask $task)
    {
        $task->update([
            'done' => !$task->done
        ]);
    }

    public function deleteTask(ModelsTask $task)
    {
        $task->delete();
    }

    public function toogleIsEditing()
    {
        $this->isEditing = !$this->isEditing;
    }
}
