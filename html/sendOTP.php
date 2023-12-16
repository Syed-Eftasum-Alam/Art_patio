<?php
    require_once './sendMail.php';

function sendOTP($user, $otp) {
    $subject = "Art Patio Activation OTP";
    $sender = "edusharehub33@gmail.com";
    $receiver = $user['email'];
    $body = "Your OTP: ".$otp."<br>";

    $result = sendMail($subject, $sender, $receiver, $body);

    if ($result === true) {
        echo "OTP sent successfully!";
    } else {
        echo $result;
    }       
}
