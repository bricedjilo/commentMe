<?php

return [
    'database' => [
        'name' => 'comment_me',
        'username' => 'admin',
        'password' => 'Project007',
        'connection' => 'mysql:host=localhost',
        'port' => '3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'gmailer' => [
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_secure' => 'ssl',
        'smtp_user' => 'commentme.project@gmail.com',
        'smtp_password' => 'commentme007',
        'sender_email' => 'no-reply@commentme.com',
        'sender_name' => 'admin',
    ],
    'mailtrap' => [
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_user' => 'f75510ff0de9ca',
        'smtp_password' => '4908943f447f81',
        'sender_email' => 'jeanm20153@gmail.com',
        'sender_name' => 'Brice Djilo',
    ]
];
