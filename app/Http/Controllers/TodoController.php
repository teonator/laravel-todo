<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TodoController extends Controller
{
    public function index(Request $request) {
        $query = Task::select(
                'id',
                'label',
                'done',
            )
        ;

        switch ($request->query('filter', '')) {
            case 'pending':
                $query->where('done', false);
                break;

            case 'done':
                $query->where('done', true);
                break;
        }

        return view('todo')
            ->with('tasks', $query->get())
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
