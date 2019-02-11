<?php
/**
 * Created by PhpStorm.
 * User: Jordan Smith
 * Date: 2/11/2019
 * Time: 2:10 PM
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to DB
require '/home/jsmithgr/config.php';
try {
    //Instantiate a db object
    $dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    echo "Connected to DB!";
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}

//define the query
$sql = "INSERT INTO pets(type, name, color)
          VALUES (:type, :name, :color)";

//prepare the statement
$statement = $dbh->prepare($sql);

//bind the parameters
//$type = 'kangaroo';
//$name = 'Joey';
//$color = 'purple';
//$statement->bindParam(':type', $type, PDO::PARAM_STR);
//$statement->bindParam(':name', $name, PDO::PARAM_STR);
//$statement->bindParam(':color', $color, PDO::PARAM_STR);
//
////Execute
//$statement->execute();

//bind the parameters
$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();