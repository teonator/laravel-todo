<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TaskService;

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
            ->with('all', $this->taskService->getTaskCount())
            ->with('pending', $this->taskService->getTaskCount('pending'))
            ->with('done', $this->taskService->getTaskCount('done'))
            ->with('filter', $filter)
        ;
    }

    public function add(Request $request) {
        $validated = $request->validate([
            'task' => 'required',
        ]);

        $taskId = $this->taskService->addTask($request->task);

        return redirect('/');
    }

    public function edit(Request $request, string $id) {
        $this->taskService->editTask($id, $request->boolean('done', false));

        return redirect('/');
    }

    public function delete(Request $request, string $id) {
        $this->taskService->deleteTask($id);

        return redirect('/');
    }
}
