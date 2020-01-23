<?php
function Get($tours)
{
    $tour = $tours->getTour($_REQUEST["t"]);
    while ($row = $tour->fetch_assoc()) {
        echo json_encode($row);
    }
    http_response_code(200);  // set response code - 200 OK
}
