
@extends('layouts.tasks')

@section('title', 'All Tasks')

@section('content')

<div class="header">
    <h1>Task Management</h1>
    <p>View and manage all your scheduled tasks.</p>
</div>

<div class="card">

    <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:20px;">

        <div>
            <h2>All Tasks</h2>
            <p style="color:#858da0; margin-top:8px;">
                Total active tasks: {{ $tasks->count() }}
            </p>
        </div>

        @auth
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                + Create Task
            </a>
        @endauth

    </div>

    <div style="overflow-x:auto;">

        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Task Title</th>
                    <th>Task Date</th>
                    <th>Status</th>

                    @auth
                        <th>Actions</th>
                    @endauth
                </tr>
            </thead>

            <tbody>

                @forelse ($tasks as $task)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $task->title }}</td>

                        <td>
                            {{ $task->task_date->format('F d, Y') }}
                        </td>

                        <td>
                            <span class="status {{ $task->status }}">
                                {{ $task->status }}
                            </span>
                        </td>

                        @auth
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                   class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Are you sure you want to archive this task?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Archive
                                    </button>

                                </form>
                            </td>
                        @endauth

                    </tr>

                @empty

                    <tr>
                        <td colspan="@auth 5 @else 4 @endauth" class="empty">
                            No tasks found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
