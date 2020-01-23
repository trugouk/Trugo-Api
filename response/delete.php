<?php
function Get($tours)
{
    if ($tours->delete($_REQUEST["no"])) {
        http_response_code(200); // set response code - 200 OK
        // tell the user
        echo json_encode(array("message" => "Tour " . $_REQUEST["no"] . " deleted successfully"));
    }
    // if unable to delete the tour
    // else {
    //     http_response_code(503); // set response code - 503 service unavailable
    //     echo json_encode(array("message" => "Unable to delete Tour " . $_REQUEST["no"]));
    // }
}
