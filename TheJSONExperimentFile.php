<?php
/**
 * Created by PhpStorm.
 * User: Frayo
 * Date: 1/6/2017
 * Time: 8:01 AM
 */
$initialRow1 = array(
    'table_name' => 'table1',
    'top_pos' => 100,
    'left_pos' => 43
);

$initialRow1['new_data'] = "Eric Cartman";

$initialRow2 = array(
    'table_name' => 'table2',
    'top_pos' => 120,
    'left_pos' => 4
);

$initialRow3 = array(
    'table_name' => 'table3',
    'top_pos' => 25,
    'left_pos' => 61
);

$resultsSet = array();
array_push($resultsSet, $initialRow1);
array_push($resultsSet, $initialRow2);
array_push($resultsSet, $initialRow3);



$newHeaders = ['table_name', 'top_pos', 'left_pos'];
$newData = ['table4', 33, 67];

$initialRow4 = array();
for($i = 0; $i < sizeof($newData); $i++){
    $initialRow4[$newHeaders[$i]]=$newData[$i];
}
array_push($resultsSet, $initialRow4);


$returnObject = array('data' => $resultsSet);
echo json_encode($returnObject);