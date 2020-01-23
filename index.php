<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: token, Content-Type, Process-Data');

// get database connection
require_once __DIR__ . '/config/database.php';

// instantiate tours object
require_once __DIR__  . '/objects/tours.php';

if (($_SERVER["HTTP_HOST"]) !== "localhost") {
    http_response_code(401);
    die("You are not authorized");
} else {
    $request = explode("?", str_replace("/api/", "", $_SERVER['REQUEST_URI']));
    function Request($file)
    {
        require_once __DIR__ . '/response/' . $file . ".php";
        $request_method = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $request_method(new Tours(new Database()));
    }
    switch ($request[0]) {
        case 'reviews':
            Request("reviews");
            break;
        case 'tours':
            Request("tours");
            break;
        case 'destination':
            Request("destination");
            break;
        case 'popular':
            Request("popular");
            break;
        case 'filters':
            Request("filters");
            break;
        case 'itinerary':
            Request("itinerary");
            break;
        case 'authenticate':
            Request("authenticate");
            break;
        case 'packages':
            Request("read");
            break;
        case 'create':
            Request("create");
            break;
        case 'upload':
            Request("upload");
            break;
        case 'delete':
            Request("delete");
            break;
        case 'otp':
            Request("otp");
            break;
        case 'user':
            Request("user");
            break;
        case 'subscribe':
            Request("subscribe");
            break;
        default:
            require_once __DIR__ . '/response/404.php';
            break;
    }
}
