<?php

namespace App\Livewire\Todo;

use App\Models\Task;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class Todo extends Component
{
    #[Rule('required|min:3')]
    public $contentNewTask;

    #[Url()]
    public $search = '';

    public ?Task $taskInEdition = null;
    public $contentEdit = '';

    public function render()
    {
        $tasks = Task::when(
            trim($this->search) !== '',
            fn($t) => $t->where('content', 'LIKE', "%{$this->search}%")
        )->get();

        return view('livewire.todo.todo', [
            'tasks' => $tasks
        ]);
    }

    public function createTask()
    {
        $this->validate();

        Task::create([
            'content' => $this->contentNewTask
        ]);

        $this->reset(['contentNewTask', 'taskInEdition']);

        request()->session()->flash('success', 'A new task has been created');
    }

    public function updateTask()
    {
        $this->taskInEdition->update([
            'content' => $this->contentEdit
        ]);

        $this->reset(['taskInEdition', 'contentEdit']);
    }

    public function toogleDoneTask(Task $task)
    {
        $task->update([
            'done' => !$task->done
        ]);
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
    }

    public function toogleTaskInEdition(Task $task)
    {
        if(!is_null($this->taskInEdition) && $this->taskInEdition->is($task)) {
            $this->reset(['taskInEdition', 'contentEdit']);
        } else {
            $this->taskInEdition = $task;
            $this->contentEdit = $task->content;
        }
    }
}
