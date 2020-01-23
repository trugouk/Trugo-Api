<?php
function Get($tours)
{
    $otp = mt_rand(100000, 999999);
    if (isset($_REQUEST["email"])) {
        $result = send(htmlspecialchars(strip_tags($_REQUEST["email"])), $otp);
        if ($result) {
            http_response_code(200);  // set response code - 200 OK
            echo json_encode(
                array("message" => $otp)
            );
        } else {
            http_response_code(503); // set response code - 503 service unavailable
            echo json_encode(
                array("message" => "Please try again")
            );
        }
    }
}

function send($email, $otp)
{
    $to = $email;
    $subject = "Trugo - Luxury Travels : OTP";
    $message = "<span><b>Your One-Time Passcode is :</b> $otp</span>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <contact@trugo.co.in>' . "\r\n";
    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}
