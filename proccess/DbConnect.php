<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnect
 *
 * @author Nana Yaw Zaza
 */
class DbConnect extends mysqli {

    public $host = "localhost", $dbname = "wss", $dbpass = "", $dbuser = "root";

    //Variable to store database link
    //Class constructor
    public function __construct() {

        if ($this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname)) {

        } else {
            return "<h1>Error while connecting database</h1>";
        }
    }

//    private $conn;
//
//    function __construct() {
//
//
//    }
//    function connect() {
//        include_once dirname(__FILE__) . './config.php';
//
//        // Connecting to mysql database
//        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//
//        // Check for database connection error
//        if (mysqli_connect_errno()) {
//            echo "Failed to connect to MySQL: " . mysqli_connect_error();
//        }
//
//        // returing connection resource
//        return $this->conn;
//    }
}
