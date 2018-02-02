<?php

require '../vendor/autoload.php';
require_once("../public/../proccess/DbConnect.php");

$app = new \Slim\App;
$app->get('/all', function () {



    $connection = new DbConnect();


    $query = "SELECT LOCATION_NAME,SENSOR_TYPE,reading.INFORMATION AS INFO, reading.PERIOD AS TIME FROM location INNER JOIN sensors on sensors.LOCATION_ID=location.ID INNER JOIN reading ON reading.SENSOR_ID=sensors.ID";

    $result = $connection->query($query);

    // var_dump($result);
    $payload = [];
    while ($row = $result->fetch_assoc()) {

        $payload[] = $row;
    }

    echo json_encode($payload);
});


$app->get('/all/{loc}', function ($request) {
    $get_id = $request->getAttribute('loc');

    //   require_once("../public/../proccess/DbConnect.php");

    $connection = new DbConnect();


    $query = "SELECT LOCATION_NAME,SENSOR_TYPE,reading.INFORMATION AS INFO, reading.PERIOD AS TIME FROM location INNER JOIN sensors on sensors.LOCATION_ID=location.ID INNER JOIN reading ON reading.SENSOR_ID=sensors.ID WHERE location.LOCATION_NAME='$get_id'";

    $result = $connection->query($query);

    // var_dump($result);
    $payload = [];
    while ($row = $result->fetch_assoc()) {

        $payload[] = $row;
    }

    echo json_encode($payload);
});



$app->get('/all1', function () {


    require_once("../public/../proccess/DbConnect.php");

    $connection = new DbConnect();


    $query = "SELECT LOCATION_NAME,SENSOR_TYPE,reading.INFORMATION AS INFO, reading.PERIOD AS TIME FROM location INNER JOIN sensors on sensors.LOCATION_ID=location.ID INNER JOIN reading ON reading.SENSOR_ID=sensors.ID ";

    $result = $connection->query($query);
    $response["result"] = array();
    // var_dump($result);
    $payload = array();
    while ($row = $result->fetch_assoc()) {

        $payload = $row;
        array_push($response["result"], $payload);
    }

    //  array_push($response['z'], $payload);
    echo json_encode($response);
});




$app->get('/all1/{location}', function ($request) {
    $get_id = $request->getAttribute('location');

    require_once("../public/../proccess/DbConnect.php");

    $connection = new DbConnect();


    $query = "SELECT LOCATION_NAME,SENSOR_TYPE,reading.INFORMATION AS INFO, reading.PERIOD AS TIME FROM location INNER JOIN sensors on sensors.LOCATION_ID=location.ID INNER JOIN reading ON reading.SENSOR_ID=sensors.ID WHERE location.LOCATION_NAME='$get_id';";

    $result = $connection->query($query);
    $response["result"] = array();
    // var_dump($result);
    $payload = array();
    while ($row = $result->fetch_assoc()) {

        $payload = $row;
        array_push($response["result"], $payload);
    }

    //  array_push($response['z'], $payload);
    echo json_encode($response);
});



$app->get('/allbylocation/{location}', function ( $request) {

    $get_id = $request->getAttribute('location');
    require_once("../public/../proccess/DbConnect.php");

    $connection = new DbConnect();

    $query = "SELECT LOCATION_NAME,SENSOR_TYPE,reading.INFORMATION AS INFO, reading.PERIOD AS TIME FROM location INNER JOIN sensors on sensors.LOCATION_ID=location.ID INNER JOIN reading ON reading.SENSOR_ID=sensors.ID WHERE location.LOCATION_NAME='$get_id';";

    $result = $connection->query($query);

    // var_dump($result);

    while ($row = $result->fetch_assoc()) {

        $payload[] = $row;
    }

    echo json_encode($payload);
});
$app->run();
