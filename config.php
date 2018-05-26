<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$heroku_serv = getenv("HEROKU_RECAP_SERVER");
$heroku_client = getenv("HEROKU_RECAP_CLIENT");
$mailParams = explode('&', getenv("MAIL"));
$mail = [];
foreach ($mailParams as $mailParam) {
    $param = explode('=', $mailParam);
    $mail[$param[0]] = $param[1];
}

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
        'smtp_host' => $mail['smtp_host'],
        'smtp_port' => $mail['smtp_port'],
        'smtp_secure' => $mail['smtp_secure'],
        'smtp_user' => $mail['smtp_user'],
        'smtp_password' => $mail['smtp_password'],
        'sender_email' => $mail['sender_email'],
        'sender_name' => $mail['sender_name'],
    ],
    'recaptcha' => [
        "localhost-server" => "6LedT1kUAAAAAPbi-khy5HKU3WY9StPY1P4syI0t",
        "localhost-client" => "6LedT1kUAAAAABOZpXtq9dG4ir_hsso8VK1J7d4A",
        "heroku-server" => $heroku_serv,
        "heroku-client" => $heroku_client
    ]
];
