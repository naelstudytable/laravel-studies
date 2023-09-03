<?php

namespace App\Livewire\Todo;

use App\Models\Task;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    #[Rule('required|min:3')]
    public $contentNewTask;

    #[Url()]
    public $search = '';

    public ?Task $taskInEdition = null;

    #[Rule('required|min:3')]
    public $contentEdit = '';

    public function render()
    {
        $tasks = Task::latest()->when(
            trim($this->search) !== '',
            fn($t) => $t->where('content', 'LIKE', "%{$this->search}%")
        )->paginate(5);

        return view('livewire.todo.todo', [
            'tasks' => $tasks
        ]);
    }

    public function createTask()
    {
        $this->validateOnly('contentNewTask');

        Task::create([
            'content' => $this->contentNewTask
        ]);

        $this->reset(['contentNewTask', 'taskInEdition']);

        request()->session()->flash('success', 'A new task has been created');

        $this->resetPage();
    }

    public function updateTask()
    {
        $this->validateOnly('contentEdit');

        $this->taskInEdition->update([
            'content' => $this->contentEdit
        ]);

        $this->toogleTaskInEdition($this->taskInEdition);
    }

    public function toogleDoneTask(Task $task)
    {
        $task->update([
            'done' => !$task->done
        ]);
    }

    public function deleteTask($taskID)
    {
        try {
            Task::findOrFail($taskID)->delete();
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete task!');
            return;
        }
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
