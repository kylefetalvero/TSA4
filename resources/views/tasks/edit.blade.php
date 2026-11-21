
@extends('layouts.tasks')

@section('title', 'Edit Task')

@section('content')

<div class="header">
    <h1>Edit Task</h1>
    <p>Update the information of your selected task.</p>
</div>

<div class="card">

    <h2>Update Task Information</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="margin-top:25px;">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Task Title</label>

            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                value="{{ old('title', $task->title) }}"
                required
            >

            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Task Status</label>

            <select id="status" name="status" class="form-control" required>

                <option value="pending"
                    {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="done"
                    {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>
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
                value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}"
                required
            >

            @error('task_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Update Task
        </button>

        <a href="{{ route('tasks') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
