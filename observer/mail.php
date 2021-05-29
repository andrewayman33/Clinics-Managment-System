
<?php

if (isset($_POST['sendMailBtn'])) {
    $fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $message = $_POST['message'];

$to_email = $toEmail;
$subject =  $subjectName;
$body = $message;
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
    echo '<script>alert("Email sent successfully !")</script>';
     echo '<script>window.location.href="index.php";</script>';
} else {
    echo "Email sending failed...";
}
}