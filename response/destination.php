<?php
function Get($tours)
{
    $destination = isset($_REQUEST["d"]) ? $_REQUEST["d"] : "";
    $destinations = $tours->getdestinations($destination);
    $destination_arr = array();
    $destination_arr["results"] = array();
    while ($row = $destinations->fetch_assoc()) {
        array_push($destination_arr["results"], $row);
    }
    http_response_code(200); // set response code - 200 OK
    echo json_encode($destination_arr);
}

function Post($tours)
{
    //get posted data
    $data = json_decode(file_get_contents("php://input"));
    if ($tours->savedestinations($data)) {
        http_response_code(201);  // set response code - 201 created
        echo json_encode(array("message" => "Destinations saved successfully"));
    }
}
