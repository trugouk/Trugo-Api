<?php
function Get($tours)
{
    $reviews = $tours->getreviews();
    $reviews_arr = array();
    $reviews_arr["results"] = array();
    while ($row = $reviews->fetch_assoc()) {
        array_push($reviews_arr["results"], $row);
    }
    http_response_code(200);  // set response code - 200 OK
    echo json_encode($reviews_arr);
}

function Post($tours)
{
    //get posted data
    $data = json_decode(file_get_contents("php://input"));
    if ($tours->savereviews($data)) {
        http_response_code(201); // set response code - 201 created
        echo json_encode(array("message" => "Reviews saved successfully"));
    }
}
