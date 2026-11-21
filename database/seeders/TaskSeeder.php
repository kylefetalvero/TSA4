<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $today = now()->toDateString();

        $tasks = [
            [
                'title' => 'Complete TSA4 Laravel Project',
                'status' => 'pending',
                'task_date' => $today,
                'is_archived' => false,
            ],
            [
                'title' => 'Review Web System Technologies',
                'status' => 'pending',
                'task_date' => $today,
                'is_archived' => false,
            ],
            [
                'title' => 'Study Database Management',
                'status' => 'done',
                'task_date' => $today,
                'is_archived' => false,
            ],
            [
                'title' => 'Practice PHP Programming',
                'status' => 'pending',
                'task_date' => now()->subDay()->toDateString(),
                'is_archived' => false,
            ],
            [
                'title' => 'Read Laravel Documentation',
                'status' => 'done',
                'task_date' => now()->subDay()->toDateString(),
                'is_archived' => false,
            ],
            [
                'title' => 'Prepare Project Presentation',
                'status' => 'pending',
                'task_date' => now()->addDay()->toDateString(),
                'is_archived' => false,
            ],
            [
                'title' => 'Organize Project Files',
                'status' => 'pending',
                'task_date' => now()->addDay()->toDateString(),
                'is_archived' => false,
            ],
            [
                'title' => 'Review Cybersecurity Lessons',
                'status' => 'pending',
                'task_date' => now()->addDays(2)->toDateString(),
                'is_archived' => false,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
