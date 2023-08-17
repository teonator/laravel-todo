<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getTasks(string $filter = '')
    {
        return $this
            ->_buildQuery($filter)
            ->get()
        ;
    }

    public function getTaskCount(string $filter = '')
    {
        return $this
            ->_buildQuery($filter)
            ->count()
        ;
    }

    public function addTask(string $label) {
        return Task::create([
            'label' => $label,
        ]);
    }

    public function editTask(string $id, bool $done) {
        Task::where('id', $id)
            ->update([
                'done' => $done
            ])
        ;
    }

    private function _buildQuery(string $filter = '' )
    {
        $query = Task::select(
                'id',
                'label',
                'done',
            )
        ;

        switch($filter) {
            case 'pending':
                $query->where('done', false);
                break;

            case 'done':
                $query->where('done', true);
                break;
        }

        return $query;
    }
}