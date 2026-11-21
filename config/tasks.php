
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Task Completion Notification Recipient
    |--------------------------------------------------------------------------
    */

    'notification_recipient' => env(
        'MAIL_TASK_RECIPIENT',
        'student@example.com'
    ),

];
