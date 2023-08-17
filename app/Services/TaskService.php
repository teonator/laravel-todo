<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getTasks( string $filter = '' )
    {
        return $this
            ->_buildQuery( $filter )
            ->get()
        ;
    }

    public function getTaskCount( string $filter = '' )
    {
        return $this
            ->_buildQuery( $filter )
            ->count()
        ;
    }

    private function _buildQuery( string $filter = '' )
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