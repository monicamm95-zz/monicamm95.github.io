<?php
if(isset($_POST['email'])) {
      
    // CHANGE THE TWO LINES BELOW
    $email_to = "monicamm95@gmail.com";
      
    $email_subject = "message submission";
      
      
    function died($error) {
        // your error code can go here
        echo "I'm sooooo sorry about this error.";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
      
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
      
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
      
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
      
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
      
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
      
      
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
  
<!-- place your own success html below -->
  
<html>
 
<header>
  <title>Form Submitted</title>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
 
    <style type="text/css">
 
  @font-face {
    font-family: 'walkway_blackregular';
    src: url("fonts/Walkway_Black-webfont.eot");
    src: url("fonts/Walkway_Black-webfont.eot?#iefix") format("embedded-opentype"), url("fonts/Walkway_Black-webfont.woff") format("woff"), url("fonts/Walkway_Black-webfont.ttf") format("truetype"), url("fonts/Walkway_Black-webfont.svg#walkway_blackregular") format("svg");
    font-weight: normal;
    font-style: normal;
  }
 
 
  body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
  }
 
  div.wrapper {
    background: #030C22 url(images/grey.png) repeat fixed;
    width: 100%;
    min-height: 700px;
  }
 
  div.thanks {
    background-color: rgba(3,12,34,0.7);
    font-family: 'walkway_blackregular';
    color: #FFFBF3;
    width: 50%;
    padding: 20px;
    margin: 0 auto;
    letter-spacing: 1px;
    border-radius: 10px;
    text-align: center;
    position: absolute;
    top: 25%;
    left: 25%;
 
  }
 
  a {
    font-size: 15px;
    background-color: #FFFBF3;
    color: #131232;
    padding: 15px;
    text-decoration: none;
    text-align: center;
    margin: 12% auto;
    border-radius: 5px;
    display: block;
    width: 25%;
  }
   
  a:hover {
    opacity: 0.8;
  }
  a:visited {
    color: #131232;
  }
 
 
  </style>
</header>
 
<body>
 
  <div class="wrapper">
    <div class="thanks">
      <h2>Thanks for contacting me!</h2>
      <h2>I'll get back to you soon.</h2>
      <a href="http://sarahcapecci.com">Back to home page</a>
    </div>
  </div>
 
 
</body>
 
 
</html>
 
<?php
}
die();
?>