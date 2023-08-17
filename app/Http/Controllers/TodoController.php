<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TaskService;
use App\Models\Task;

class TodoController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request) {
        $filter = $request->query('filter', '');

        $tasks = $this->taskService->getTasks($filter);

        return view('todo')
            ->with('tasks', $tasks)
            ->with('all', Task::count())
            ->with('pending', Task::where('done', false)->count())
            ->with('done', Task::where('done', true)->count())
            ->with('filter', $filter)
        ;
    }

    public function add(Request $request) {
        $validated = $request->validate([
            'task' => 'required',
        ]);

        $task = Task::create([
            'label' => $request->task,
        ]);

        return redirect('/');
    }

    public function edit(Request $request, string $id) {
        Task::where('id', $id)
            ->update(['done' => $request->query('done', false)])
        ;

        return redirect('/');
    }

    public function delete(Request $request, string $id) {
        Task::destroy($id);

        return redirect('/');
    }
}
