<?php
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));
    
    require_once('PHPMailerAutoload.php');

    $mail = new PHPMailer();

$mail->isSMTP();

$mail->SMPTAuth = true;

$mail->Host = 'airport-transfer-services-bg.com';

$mail->Port = '25';

$mail->isHTML();

$mail->Username = 'form@airport-transfer-services-bg.com';

$mail->Password = 'airport1234';

    
    $mail->SetFrom("form@airport-transfer-services-bg.com");
    $mail->Subject = "Zapitvane";
    
    $mail->Body="Name: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    
    $mail->AddAddress("taxi.burgas07@gmail.com");
    
    if (!$mail->send()) { 
    $result = array('status'=>"error", 'message'=>"Mailer Error: ".$mail->ErrorInfo);//
    echo json_encode($result);
    } else {
        $result = array('status'=>"success", 'message'=>"Message senT.");
        echo json_encode($result);
}
?>