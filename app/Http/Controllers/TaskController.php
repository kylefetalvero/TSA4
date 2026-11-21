<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCompletedMail;

class TaskController extends Controller
{
    // Display today's active tasks
    public function index()
    {
        $tasks = Task::whereDate('task_date', today())
            ->where('is_archived', false)
            ->orderBy('task_date', 'asc')
            ->get();

        return view('welcome', compact('tasks'));
    }

    // Display all active tasks
    public function tasks()
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date', 'asc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    // Display Create Task form
    public function create()
    {
        return view('tasks.create');
    }

    // Store a new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,done',
            'task_date' => 'required|date',
        ]);

        Task::create($validated);

        return redirect()->route('tasks')
            ->with('success', 'Task created successfully!');
    }

    // Display Edit Task form
    public function edit(Task $task)
    {
        if ($task->is_archived) {
            abort(404);
        }

        return view('tasks.edit', compact('task'));
    }

    // Update an existing task and send completion email
    public function update(Request $request, Task $task)
    {
        if ($task->is_archived) {
            abort(404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,done',
            'task_date' => 'required|date',
        ]);

        // Check the previous status before updating
        $wasAlreadyDone = $task->status === 'done';

        // Update task information
        $task->update($validated);

        // Send notification only when status changes to done
        if (!$wasAlreadyDone && $task->status === 'done') {

            Mail::to(config('tasks.notification_recipient'))
                ->send(new TaskCompletedMail($task));

        }

        return redirect()->route('tasks')
            ->with('success', 'Task updated successfully!');
    }

    // Archive a task instead of permanently deleting it
    public function destroy(Task $task)
    {
        if ($task->is_archived) {
            abort(404);
        }

        $task->update([
            'is_archived' => true,
        ]);

        return redirect()->route('tasks')
            ->with('success', 'Task archived successfully!');
    }

    // Display Profile page
    public function profile()
    {
        $user = User::first();

        return view('profile', compact('user'));
    }

    // Display About page
    public function about()
    {
        return view('about');
    }
}
