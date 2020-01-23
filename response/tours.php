<?php
function Get($tours)
{
    if (isset($_REQUEST["type"])) {
        if ($_REQUEST["type"] === "T" || $_REQUEST["type"] === "W" || $_REQUEST["type"] === "H") {
            $tour = $tours->getTours($_REQUEST["type"]);
            $tour_arr = array();
            $tour_arr["results"] = array();
            while ($row = $tour->fetch_assoc()) {
                array_push($tour_arr["results"], $row);
            }
            http_response_code(200);  // set response code - 200 OK
            echo json_encode($tour_arr);
        } else {
            die("Invalid Request");
            http_response_code(400);  // set response code - 400 Bad Request
        }
    } else {
        die("Invalid Request");
        http_response_code(400);  // set response code - 400 Bad Request
    }
}
