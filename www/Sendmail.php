<?php
        $cname = $_REQUEST['cname'];
        $cnumber = $_REQUEST['cnumber'];
        $cemail = $_REQUEST['cemail'];

        require_once('class.phpmailer.php');

        $mail = new PHPMailer(); // defaults to using php "mail()"


        $body = "Name : ".$cname."Number : ".$cnumber."Email : ".$cemail;


        $mail->SetFrom($cemail, $cname);

        $address = "abhishekvaidyanath@gmail.com";
        $mail->AddAddress($address, "Abhishek. V");

        $mail->Subject    = "Your Subject";

        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);


        if(!$mail->Send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
          echo "Message sent!";
        }
    ?>