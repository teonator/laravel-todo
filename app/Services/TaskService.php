<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getTasks( string $filter = '' )
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

        return $query->get();
    }
}