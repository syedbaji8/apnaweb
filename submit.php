<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['w3lName']; // Get Name value from HTML Form
        $email_id = $_POST['w3lSender']; // Get Email Value
        $mobile_no = $_POST['w3lMobile']; // Get Mobile No
        $msg = $_POST['w3lMessage']; // Get Message Value
         
        $to = "apnawebguru@gmail.com"; // You can change here your Email
        $subject = "'$name' has been sent a mail"; // This is your subject
         
        // HTML Message Starts here
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email_id</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$mobile_no</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Admin <apnawebguru@gmail.com>' . "\r\n"; // Give an email id on which you want get a reply. User will get a mail from this email id
        $headers .= 'Cc: syedbaji8@gmail.com' . "\r\n"; // If you want add cc
        $headers .= 'Bcc: arja.bhavani@gmail.com' . "\r\n"; // If you want add Bcc
         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
            echo "<script>
                    alert('Mail has been sent Successfully.');
                </script>";
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('EMAIL FAILED');
                </script>";
        }
    }
?>