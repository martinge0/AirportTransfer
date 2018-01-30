<?php
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));
    
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = "ssl"; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465 ; // or 587

    $mail->IsHTML(true);
    $mail->Username = "taxi.burgas07@gmail.com";   
    $mail->Password = "karnobat77";
    
    $mail->SetFrom("taxi.burgas07@gmail.com");
    $mail->Subject = "Test";
    $mail->Body="You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $mail->AddAddress("pchelpbs@gmail.com");
    
    if (!$mail->send()) { 
    $result = array('status'=>"error", 'message'=>"Mailer Error: ".$mail->ErrorInfo);//
    echo json_encode($result);
    } else {
        $result = array('status'=>"success", 'message'=>"Message senT.");
        echo json_encode($result);
}
?>