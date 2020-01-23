<?php
function Get($tours)
{
    // Start the session
    session_start();
    if (isset($_REQUEST["email"]) & isset($_REQUEST["password"])) {
        $valiadtion_result = $tours->Authenticate(htmlspecialchars(strip_tags($_REQUEST["email"])), htmlspecialchars(strip_tags($_REQUEST["password"])));
        $num = $valiadtion_result->num_rows;
        if ($num > 0) {
            while ($row = $valiadtion_result->fetch_assoc()) {
                $row['sessionid'] = session_id();
                $data = $row;
            }
            http_response_code(200);  // set response code - 200 OK
            echo json_encode($data);
        } else {
            http_response_code(503); // set response code - 503 service unavailable
            echo json_encode(
                array("message" => "Invalid Email or Password")
            );
        }
    } else {
        session_destroy();
        session_write_close();
    }
}
