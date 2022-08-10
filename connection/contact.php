<?php
  $to_email = "bloodaid1@gmail.com";
  $subject = $_POST['subject'];
  $body = $_POST['message'];
  $headers = "From: ".$_POST["email"]."\r\n";
$headers .= "Reply-To: ".$_POST["email"]."\r\n";

  if (mail($to_email, $subject, $body, $headers)) {
      echo "<script>alert('Email successfully sent);window.location.href ='../homepage.php';</script>";
  } else {
      echo "<script>alert('Email sending failed...');window.location.href ='../contact_us.php';</script>";
  }
?>