<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* 
//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'root', '', 'Jayculs');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$message= mysqli_real_escape_string($mysqli, $_POST['message']);
 */

$fname = $_POST['fname'];
$phone = $_POST['phone'];
$emailer = $_POST['emailer'];
$message= $_POST['message'];


$email = "jaystechub@gmail.com";
$subject = "From your online portfolio...";

$mailbody = "<!DOCTYPE html>
<h1>JayCul Hi!</h1>
<span>Your Portfolio gathered these details from a visitor...</span> <br>
    
    <div style='text-align: center; margin: 2rem 1rem;padding: 1rem ;border-radius:1rem; border: 1px solid #000; box-shadow: 0px 6px 4px rgba(#000000, 0.6);
    background-color:black; font-size: 1.3rem;'>
<span style='color: white;'> <b>Name :</b>  $fname </span> <br>
<span style='color: white;'> <b>Mobile Number :</b> $phone </span> <br>
<span style='color: white;'> <b>Email Address :</b> $emailer </span> <br>
<span style='color: white;'> <b>Message :</b> $message </span> <br>
</div>";


require "./PHPMailer/src/Exception.php";
require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/SMTP.php";


$mail = new PHPMailer(TRUE);


    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'jaystechub@gmail.com';                 // SMTP username
    $mail->Password = 'Mygmailpass01';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->AddReplyTo($emailer);
    $mail->setFrom($emailer, $fname);
    $mail->addAddress($email, 'Admin');     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $mailbody;
    $mail->AltBody = strip_tags($mailbody);

    // $mail->send(); //sends already

    if ($mail->send()) {
        echo 'success';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    // echo 'Message has been sent';
    
?>