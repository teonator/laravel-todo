@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col col-xl-8 offset-xl-2">

            <h1>Todo</h1>

        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col col-xl-8">

            <div class="card">
                <div class="card-body p-5">

                    <form action="{{ route('tasks.add') }}" method="post" class="d-flex mb-1">
                        @csrf
                        <input type="text" class="form-control me-2" placeholder="New task..." name="task" />
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                    </form>

                    <div class="d-flex align-items-center mt-4">
                        <h4 class="flex-fill m-0">Tasks</h4>
                    </div>

                    <div class="list-group mt-3">
                        @forelse($tasks as $task)
                            <div class="list-group-item list-group-item-action d-flex align-items-center">
                                <a class="btn btn-sm me-2 btn-outline-secondary {{ $task['done'] ? 'btn-outline-success' : 'btn-outline-secondary' }}" href="{{ route('tasks.edit', ['id' => $task['id'], 'done' => !$task['done']]) }}">
                                    <i class="fas fa-check {{ $task['done'] ? '' : 'text-white' }}"></i>
                                </a>
                                <p class="flex-grow-1 mb-0 text-secondary {{ $task['done'] ? 'text-decoration-line-through' : '' }}">{{ $task['label'] }}</p>

                                <a class="btn btn-sm text-danger" href="{{ route('tasks.delete', ['id' => $task['id']]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        @empty
                            <p class="mt-4 text-center">Hooray! You don't have any task.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col col-xl-8 offset-xl-2 text-end">

            <span>Made with <a href="https://laravel.com" target="_blank">Laravel</a></span>

        </div>
    </div>
@endsection
