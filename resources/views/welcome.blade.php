
@extends('layouts.tasks')

@section('title', 'Dashboard')

@section('content')

<div class="header">
    <h1>Welcome to Tasks for Today</h1>
    <p>Manage your daily activities and stay organized.</p>
</div>

<div class="card">
    <h2>Today's Overview</h2>

    <p style="color:#858da0; margin-top:10px;">
        {{ now()->format('F d, Y') }}
    </p>

    <h1 style="font-size:40px; margin-top:20px;">
        {{ $tasks->count() }}
    </h1>

    <p style="color:#858da0;">
        Active tasks scheduled for today
    </p>
</div>

<div class="card">

    <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:15px;">
        <h2>Today's Tasks</h2>

        @auth
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                + Create Task
            </a>
        @endauth
    </div>

    @forelse ($tasks as $task)

        <div class="task">

            <div>
                <h3>{{ $task->title }}</h3>

                <small>
                    {{ $task->task_date->format('F d, Y') }}
                </small>
            </div>

            <div>
                <span class="status {{ $task->status }}">
                    {{ $task->status }}
                </span>

                @auth
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="btn btn-edit">
                        Edit
                    </a>
                @endauth
            </div>

        </div>

    @empty

        <div class="empty">
            <h3>No tasks scheduled for today.</h3>
            <p style="margin-top:10px;">
                Enjoy your free time or create a new task!
            </p>
        </div>

    @endforelse

</div>

@endsection
