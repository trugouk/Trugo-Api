<?php
function Post($tours)
{
    //get posted data
    $data = json_decode(file_get_contents("php://input"));
    if (isset($_REQUEST["send"])) {
        $tours->SendEmailToSubscribed($data);
        http_response_code(201); // set response code
        echo json_encode(
            array("message" => "Email send successfully")
        );
    } else {
        $subscribe = $tours->Subscribe($data->email);
        http_response_code($subscribe["status"]); // set response code
        echo $subscribe["message"];
    }
}
