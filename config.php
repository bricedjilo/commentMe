<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

return [
    'database' => [
    'name' => $db,                  // Schema name
        'username' => $username,
        'password' => $password,
        'server' => $server,        // Host name
        'port' => '',
        'options' => [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
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
        'sender_name' => 'Me',
    ],
    'recaptcha' => [
        "localhost" => "6LedT1kUAAAAAPbi-khy5HKU3WY9StPY1P4syI0t",
        "heroku" => "6Ld9oFoUAAAAAFLMtDAkkuL5r438tSMsVyg1qdit"
    ]
];
