<div class="list-group-item list-group-item-action d-flex align-items-center">
    <a class="btn btn-sm me-2 btn-outline-secondary {{ $task->done ? 'btn-outline-success' : 'btn-outline-secondary' }}" href="{{ route('tasks.edit', ['id' => $task->id, 'done' => !$task->done]) }}">
        <i class="fas fa-check {{ $task->done ? '' : 'text-white' }}"></i>
    </a>
    <p class="flex-grow-1 mb-0 text-secondary {{ $task->done ? 'text-decoration-line-through' : '' }}">{{ $task->label }}</p>

    <a class="btn btn-sm text-danger" href="{{ route('tasks.delete', ['id' => $task->id]) }}">
        <i class="fas fa-trash"></i>
    </a>
</div>