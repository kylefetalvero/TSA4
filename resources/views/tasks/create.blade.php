
@extends('layouts.tasks')

@section('title', 'Create Task')

@section('content')

<div class="header">
    <h1>Create New Task</h1>
    <p>Add a new task to your schedule.</p>
</div>

<div class="card">

    <h2>Task Information</h2>

    <form action="{{ route('tasks.store') }}" method="POST" style="margin-top:25px;">

        @csrf

        <div class="form-group">
            <label for="title">Task Title</label>

            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                value="{{ old('title') }}"
                placeholder="Enter task title"
                required
            >

            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Task Status</label>

            <select id="status" name="status" class="form-control" required>
                <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>
                    Done
                </option>
            </select>

            @error('status')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="task_date">Task Date</label>

            <input
                type="date"
                id="task_date"
                name="task_date"
                class="form-control"
                value="{{ old('task_date', now()->toDateString()) }}"
                required
            >

            @error('task_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Save Task
        </button>

        <a href="{{ route('tasks') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
