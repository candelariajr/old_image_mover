<?php
/**
 * Created by PhpStorm.
 * User: Frayo
 * Date: 1/5/2017
 * Time: 8:01 PM
 */

$floor = "";
$table = "";
$getAccepted = false;

require_once("dbauth.config");
if(isset($_GET['floor'])){
    $floor = preg_replace("/[^A-Za-z0-9]/", '', $_GET['floor']);
    $getAccepted = true;
}
if(isset($_GET['floor']) && isset($_GET['table'])){
    $floor = preg_replace("/[^A-Za-z0-9]/", '', $_GET['floor']);
    $table = preg_replace("/[^A-Za-z0-9]/", '', $_GET['table']);
    $getAccepted = true;
}
if(!$getAccepted){
    writeErrorMessage("Missing parameters in GET request!");
}else{
    startQuery();
}

function startQuery(){
    GLOBAL $user;
    GLOBAL $password;
    GLOBAL $database;
    GLOBAL $floor;
    GLOBAL $table;
    $conn = new mysqli("localhost", $user, $password, $database);
    if(mysqli_connect_errno()){
        writeErrorMessage("Cant connect to database!");
        exit();
    }else{
        //writeErrorMessage("Connected!");
    }
    if($table == ""){
        $queryString = "SELECT table_name, left_pos, top_pos from computer_availability.compstatus where floor = \"$floor\"";
    }else{
        $queryString = "SELECT computer_name, left_pos, top_pos from computer_availability.compstatus where floor = \"$floor\" and table_name = \"$table\"";
    }
    $result = $conn->query($queryString);
    if(!$result){
        writeErrorMessage("No Results");
    }
    else{
        outputJSONData($result);
    }
}

/*
 * And behold the only decent code in this project.
 * This takes any dataset from any query and puts it into JSON
 * This was written at 1am after 5 beers and 2 coffees.
 * */
function outputJSONData($result){
    if(get_class($result) == "mysqli_result"){
        $columns = array();
        $resultsOutput = array();
        while($property = mysqli_fetch_field($result)){
            $columns[] = $property->name;
        }
        while($row = $result->fetch_assoc()){
            $resultRow = array();
            for($i = 0; $i < sizeof($columns); $i++){
                $resultRow[$columns[$i]] = $row[$columns[$i]];
            }
            array_push($resultsOutput, $resultRow);
        }
        echo json_encode(array("data" => $resultsOutput));
    }
    else{
        echo json_encode(array("errorMessage" => "Not a valid MySQLi Object!"));
    }
}

function appendDisplayItem($item){

}

function writeErrorMessage($messageString){
    echo json_encode(array("message" => $messageString));
}

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

