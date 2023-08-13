<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = Task::select(
                'label'
            )
            ->get()
        ;

        return view('todo')
            ->with('tasks', $tasks)
        ;
    }

    public function add(Request $request) {
        $task = Task::create([
            'label' => $request->task,
        ]);

        return redirect('/');
    }
}
