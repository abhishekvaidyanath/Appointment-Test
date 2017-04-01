<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "syed_zafarullah@hotmail.com";
    $email_subject = "Appointment from app booked";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['Name']) ||
        !isset($_POST['Number']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Text']) ||
        !isset($_POST['Appointment'])
		!isset($_POST['Gender'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $Name = $_POST['Name']; // required
    $Number = $_POST['Number']; // required
    $Email = $_POST['Email']; // required
    $Text = $_POST['Text']; // not required
    $Appointment = $_POST['Appointment']; // required
	$Gender = $_POST['Gender'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$Email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$Name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$Number)) {
    $error_message .= 'The Number you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$Appointment)) {
    $error_message .= 'Select Appointment<br />';
  }
  if(!preg_match($string_exp,$Gender)) {
    $error_message .= 'Select Gender<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($Name)."\n";
    $email_message .= "Number: ".clean_string($Number)."\n";
    $email_message .= "Email: ".clean_string($Email)."\n";
    $email_message .= "Date: ".clean_string($Text)."\n";
    $email_message .= "Appointment: ".clean_string($Appointment)."\n";
	$email_message .= "Gender: ".clean_string($Gender)."\n";
	
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
	header('Location: thankyou.html');
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
