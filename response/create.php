<?php
function Post($tours)
{
    //get posted data
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data)) {
        if ($data->flag === 'create') {
            if ($tours->create($data)) {
                http_response_code(201);  // set response code - 201 created
                echo json_encode(array("message" => "New Tour was created with Tour no " . $tours->package_no, "no" => $tours->package_no));
            }
        } else {
            if ($tours->edit($data)) {
                http_response_code(201); // set response code - 201 created
                echo json_encode(array("message" => "Tour " . $data->package_no . " edit successfully", "no" => $data->package_no));
            }
        }
    }
}
