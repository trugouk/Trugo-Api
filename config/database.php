<?php
class Database
{
    public $tablename = "tours";
    public $itineraryTable = "itinerary";
    public $destinationTable = "destinations";
    public $reviewsTable = "reviews";
    public $userTable = "users";
    public $subscribeTable = "subscribe";
    private $host = "localhost";
    private $db_name = "trugo";
    private $username = "root";
    private $password = "";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        // Check connection
        if (mysqli_connect_errno()) {
            http_response_code(503); // set response code - 503 service unavailable
            die('Internal Server Error');
        } else {
            return $this->conn;
        }
    }
}
