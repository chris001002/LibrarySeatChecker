<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once("vendor/autoload.php");
include_once("database.php");
$database = new Database();
$database->deleteExpiredSeats();
$recipients = $database->usersSessionAboutToExpire();
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "softwareengineeringlibrary123@gmail.com";
$mail->Password = "zshpcofirgayslrh";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('softwareengineeringlibrary123@gmail.com', 'Library');
$url = "http://localhost:3000/extend";
print_r($recipients);
foreach ($recipients as $recipient) {
    $mail->addAddress($recipient['email'], $recipient['name']);
    $mail->Subject = 'Extend your session';
    $mail->Body    = 'Your seat session is about to expire! Please extend it at ' . $url;
    $mail->AltBody = 'Your seat session is about to expire! Please extend it at $url ' . $url;
    $mail->send();
}
