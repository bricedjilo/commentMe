<?php

namespace App\Domain;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Core\App;
use App\Models\User;

class Mailer extends PHPMailer {

    function __construct() {
        parent::__construct(true);
    }

    public function getMailer($smtp) {
        $this->isSMTP();
        $this->Host = $smtp['smtp_host'];
        $this->SMTPAuth = true;
        $this->Username = $smtp['smtp_user'];
        $this->Password = $smtp['smtp_password'];
        $this->SMTPSecure = $smtp['smtp_secure'];
        $this->Port = $smtp['smtp_port'];
        $this->isHTML(true);
        $this->setFrom($smtp['sender_email'], $smtp['sender_name']);
        return $this;
    }

    public function sendActivationEmail($email) {
        $this->addAddress($email);
        $this->Subject = "User Registration - Activation Email";
        $this->Body = "Click this link to activate your account.
            <a href='" . "activate" . "'> Link </a>"; // this will be setup if app is deployed to Production
        return $this->send();
    }

    public function sendErrorLogsEmail($errorMessages) {
        date_default_timezone_set("America/Denver");
        $this->addAddress($this->Username);
        $this->Subject = "URGENT: Error Logs from CommentMe";
        $this->Body = "Error Log: " . date('Y-m-d H:i:s') . "\n" . "Message $errorMessages";
        return $this->send();
    }

}
