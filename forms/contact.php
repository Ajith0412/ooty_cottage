<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['email'])) {
  $c_name = $_POST['name'];
  $c_email = $_POST['email'];
  $c_subject = $_POST['subject'];
  $c_message = $_POST['message'];

  header('Content-Type: application/json');

  // Create PHPMailer object for the contact form submission
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = 'mr.ajithsudevan@gmail.com';
  $mail->Password = "ahgvjrddihfqizur";
  $mail->setFrom("mr.ajithsudevan@gmail.com");
  $mail->Subject = 'Booking Details';
  $mail->AddAddress("mr.ajithsudevan@gmail.com");

  $mail->Body = "Name: $c_name<br>Email: $c_email<br>Subject: $c_subject<br>Message:$c_message";


  if (!$mail->send()) {
    echo json_encode(array("success" => false, "message" => 'Sorry, there was an error sending your message: ' . $mail->ErrorInfo));
  } else {
    echo json_encode(array("success" => true, "message" => 'OK'));
  }
  return;
}
