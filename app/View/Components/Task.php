<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Task as TaskModel;

class Task extends Component
{
    public $task;

    public function __construct(TaskModel $task)
    {
        $this->task = $task;
    }

    public function render(): View|Closure|string
    {
        return view('components.task');
    }
}
