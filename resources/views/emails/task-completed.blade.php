
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Completed</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6fb; padding:30px;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:10px;">

        <h1 style="color:#202945;">
            Task Completed!
        </h1>

        <p style="color:#555; line-height:1.7;">
            Good job! A task in your Tasks for Today Management System
            has been marked as completed.
        </p>

        <div style="background:#f4f6fb; padding:20px; border-radius:8px; margin-top:20px;">

            <h2 style="color:#202945;">
                {{ $task->title }}
            </h2>

            <p>
                <strong>Status:</strong>
                <span style="color:#168653;">{{ ucfirst($task->status) }}</span>
            </p>

            <p>
                <strong>Task Date:</strong>
                {{ $task->task_date->format('F d, Y') }}
            </p>

        </div>

        <p style="margin-top:25px; color:#777;">
            This is an automatic notification from your
            Tasks for Today Management System.
        </p>

        <p style="color:#999; font-size:12px;">
            IT0049 - Web System Technologies | TSA4
        </p>

    </div>

</body>
</html>
