<?php
/**
 * Created by PhpStorm.
 * User: Jordan Smith
 * Date: 2/11/2019
 * Time: 2:10 PM
 */

//Connect to DB
require '/home/jsmithgr_grcuser/config.php';
try {
    //Instantiate a db object
    $dbh= new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    echo "Connected to DB!";
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}