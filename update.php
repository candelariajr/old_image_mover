<?php
/**
 * Created by PhpStorm.
 * User: candelariajr
 * Date: 1/10/2017
 * Time: 3:35 PM
 */

/** request format
 name
 x
 y
 table
 floor
 moving
 *
 *
 * moving table:
 *  name: table_name
    x: x
    y: y
    table:
    floor: floor
    moving: table
 *
 *
 * moving computer:
 *  name: computer_name
    x: x
    y: y
    table: table_name
    floor: floor
    moving: computer
 *
 *
  */
require("dbauth.config");
$conn = new mysqli("localhost", $user, $password, $database);
if(mysqli_connect_errno()){
    echo "Failed!".mysqli_connect_error();
}else{
    //echo "Success!";
}

$debug = 0;
//showParams();
if($debug == 1){
    checkSet();
}

function checkSet(){
    if(!isset($_GET['name'])){
        echo "name not set<br>";
    }
    if(!isset($_GET['x'])){
        echo "x not set<br>";
    }
    if(!isset($_GET['y'])){
        echo "y not set<br>";
    }
    if(!isset($_GET['table'])){
        echo "table not set<br>";
    }
    if(!isset($_GET['floor'])){
        echo "floor not set<br>";
    }
    if(!isset($_GET['moving'])){
        echo "moving not set";
    }
}


if($_GET['moving'] == "table"){
    if($debug == 1){
        echo "Name ".$_GET['name']."<br>";
        echo "X ".$_GET['x']."<br>";
        echo "Y ".$_GET['y']."<br>";
        echo "Floor ".$_GET['floor']."<br>";
    }
    $x = $_GET['x'];
    $y = $_GET['y'];
    $floor = $_GET['floor'];
    $name = $_GET['name'];
    if($x != "0"){
        $queryStringx = "update computer_availability.compstatus set left_pos = left_pos + $x where floor = $floor and table_name = '$name'";
        //echo $queryStringx."<br>";
        mysqli_query($conn, $queryStringx);
    }
    if($y != "0") {
        $queryStringy = "update computer_availability.compstatus set top_pos = top_pos + $y where floor = $floor and table_name = '$name'";
        //echo $queryStringy."<br>";
        mysqli_query($conn, $queryStringy);
    }
}

if($_GET['moving'] == "computer"){
    if($debug == 1){
        echo $_GET['name']."<br>";
        echo $_GET['x']."<br>";
        echo $_GET['y']."<br>";
    }
    $x = $_GET['x'];
    $y = $_GET['y'];
    $name = $_GET['name'];
    if($x != "0") {
        $queryStringx = "update computer_availability.compstatus set left_pos = left_pos + $x where computer_name = '$name'";
        //echo $queryStringx."<br>";
        mysqli_query($conn, $queryStringx);
    }
    if($y != "0") {
        $queryStringy = "update computer_availability.compstatus set top_pos = top_pos + $y where computer_name = '$name'";
        //echo $queryStringy."<br>";
        mysqli_query($conn, $queryStringy);
    }
}

mysqli_close($conn);