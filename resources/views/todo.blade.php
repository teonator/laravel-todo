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
                        <input type="text" class="form-control me-2 @error('task') is-invalid @enderror" placeholder="New task..." name="task" autofocus />
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                    </form>

                    @if ($errors->any())
                        <div>
                            @foreach ($errors->all() as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="d-flex align-items-center mt-4">
                        <h4 class="flex-fill m-0">Tasks</h4>

                        <ul class="nav nav-underline flex-fill justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link {{ $filter == '' ? 'active' : '' }}" href="{{ route('index') }}">
                                    All ({{ $all }})
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter == 'pending' ? 'active' : '' }}" href="{{ route('index', ['filter'=>'pending']) }}">
                                    Pending ({{ $pending }})
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter == 'done' ? 'active' : '' }}" href="{{ route('index', ['filter'=>'done']) }}">
                                    Done ({{ $done }})
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="list-group mt-3">
                        @forelse($tasks as $task)
                            <x-task :task="$task" />
                        @empty
                            <p class="mt-4 text-center">Hooray! You don't have any {{ $filter }} task.</p>
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
