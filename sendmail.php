<?php
ob_start();
require 'PHPMailer/PHPMailerAutoload.php';


// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'apnawebguru@gmail.com';
    $from = 'no-reply@apnawebguru.com';
    $name = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $mobile = addslashes(trim($_POST['mobile']));
    $message = addslashes(trim($_POST['message']));

    $array = array('nameMessage' => '', 'addressMessage' => '', 'office_telephoneMessage' => '', 'residence_telephone' => '', 'fax' => '', 'emailMessage' => '', 'subjectMessage' => '', 'mobileMessage' => '', 'messageMessage' => '');
    
    if($name == '') {
        $array['nameMessage'] = 'Empty name!';
    }
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($mobile == '') {
        $array['mobileMessage'] = 'Empty Mobile Number!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if(isEmail($clientEmail) && $subject != '' && $message != '') {
        
        $body = "Name: $name \r\n Email: $clientEmail \r\n Mobile No : $mobile \r\n Subject: $subject \n Message: $message";
    }

    $mail             = new PHPMailer();

    $mail->IsSMTP(); // telling the class to use SMTP
   // $mail->Host       = "mail.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";      // SMTP server
    $mail->Port       = 587;                   // SMTP port
    $mail->Username   = "apnawebguru@gmail.com";  // username
    $mail->Password   = "a@2pnawebguru";            // password
    $mail->CharSet = 'UTF-8';
    $mail->SetFrom('no-reply@apnawebguru.com', 'apnawebguru');

    $mail->Subject    =  $subject;

    $mail->MsgHTML("$body");
    
    $mail->AddAddress($emailTo, "apnawebguru");
    //$mail->addCC('');
    //$mail->addBCC('');

    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }

    

}

      header('Location: index.html');
      ob_end_flush();
    exit();
?>