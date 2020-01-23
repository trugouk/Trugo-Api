<?php
function Get($tours)
{
    $alltours = $tours->read();
    $tours_arr = array();
    $tours_arr["results"] = array();
    while ($row = $alltours->fetch_assoc()) {
        array_push($tours_arr["results"], $row);
    }
    http_response_code(200); // set response code - 200 OK
    echo json_encode($tours_arr);
}
