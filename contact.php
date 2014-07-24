<?php
$to      = 'monicamm95@gmail.com';
$subject = 'Contact From Website';

$message = 'Name: '.$_POST["name"]. "\r\n" .'Email: '.$_POST["email"]. "\r\n" .'Message: '.$_POST["message"]. "\r\n" .'How: '.$_POST["how"];

$headers = 'From: monicamm95@gmail.com' . "\r\n" .
    'Reply-To: monicamm95@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('location: http://www.classtronaut.com/contacted.html');
?>