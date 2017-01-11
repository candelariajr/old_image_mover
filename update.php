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


//showParams();

//checkSet();
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
    echo "Name ".$_GET['name']."<br>";
    echo "X ".$_GET['x']."<br>";
    echo "Y ".$_GET['y']."<br>";
    echo "Floor ".$_GET['floor']."<br>";
}

if($_GET['moving'] == "computer"){
    echo $_GET['name']."<br>";
    echo $_GET['x']."<br>";
    echo $_GET['y']."<br>";
}

