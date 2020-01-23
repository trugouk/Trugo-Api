<?php
function Post($tours)
{
    //get posted data
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data)) {
        if ($data->flag === 'X') {
            if ($tours->newuser($data)) {
                http_response_code(201); // set response code - 201 created
                echo json_encode(array("message" => "New User was created successfully"));
            }
        } else {
            if ($tours->edituser($data)) {
                http_response_code(201); // set response code - 201 created
                echo json_encode(array("message" => "Your profile was edited successfully"));
            }
        }
    }
}
