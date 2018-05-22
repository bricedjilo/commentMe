<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$heroku_serv = getenv("HEROKU_RECAP_SERVER");
$heroku_client = getenv("HEROKU_RECAP_CLIENT");

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
    'recaptcha' => [
        "localhost-server" => "6LedT1kUAAAAAPbi-khy5HKU3WY9StPY1P4syI0t",
        "localhost-client" => "6LedT1kUAAAAABOZpXtq9dG4ir_hsso8VK1J7d4A",
        "heroku-server" => $heroku_serv,
        "heroku-client" => $heroku_client
    ]
];
