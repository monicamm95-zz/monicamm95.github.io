<?php
if(isset($_POST['submit'])) {

$to = "monicamm95@gmail.com";
$subject = "Contact Submission";
 
// data the visitor provided
$name_field = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email_field = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
 
//constructing the message
$body = "From: $name_field\n\n E-Mail: $email_field\n\n Message:\n\n $comment";
 
// ...and away we go!
mail($to, $subject, $body);
 
// redirect to confirmation
header('Location: confirmation.html');

} else {

// handle the error somehow

}
?> 