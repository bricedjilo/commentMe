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

    public function getReadyMailer($smtp) {
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
        $this->Body = "Click this link to activate your account. <a href='" . "link" . "'> Link </a>";
        if($this->send()) {
            return "You have registered and the activation mail is sent to your email.
            Click the activation link to activate you account.";
        } else {
            throw new \Exception("Oops!! There was a problem your activation email could not be sent.");
        }
    }

}
