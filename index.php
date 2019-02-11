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
//$type = 'snake';
//$name = 'Slitherin';
//$color = 'green';
//$statement->bindParam(':type', $type, PDO::PARAM_STR);
//$statement->bindParam(':name', $name, PDO::PARAM_STR);
//$statement->bindParam(':color', $color, PDO::PARAM_STR);
//
////Execute
//$statement->execute();
//
//$id = $dbh->lastInsertId();
//echo"<p>Pet $id inserted successfully</p>";

//$type = 'cat';
//$name = 'Mittens';
//$color = 'black';
//$statement->bindParam(':type', $type, PDO::PARAM_STR);
//$statement->bindParam(':name', $name, PDO::PARAM_STR);
//$statement->bindParam(':color', $color, PDO::PARAM_STR);
//
////Execute
//$statement->execute();
//
//$id = $dbh->lastInsertId();
//echo"<p>Pet $id inserted successfully</p>";

//$sql = "UPDATE pets SET name = :new WHERE name = :old";
//
////prepare the statement
//$statement = $dbh->prepare($sql);
//
////bind
//$old = 'Joey';
//$new = 'Troy';
//$statement->bindParam(':old', $old, PDO::PARAM_STR);
//$statement->bindParam(':new', $new, PDO::PARAM_STR);
//
//$statement->execute();
//
//$sql = "UPDATE pets SET color = :new WHERE color = :old";
//
////prepare the statement
//$statement = $dbh->prepare($sql);
//
////bind
//$old = 'pink';
//$new = 'brown';
//$statement->bindParam(':old', $old, PDO::PARAM_STR);
//$statement->bindParam(':new', $new, PDO::PARAM_STR);
//
//$statement->execute();
//
////delete
////define a query
//$sql = "DELETE FROM pets WHERE id=:id";
//
//$statement = $dbh->prepare($sql);
//
//$id = 1;
//$statement->bindParam(':id', $id, PDO::PARAM_INT);
//
//$statement->execute();

$sql = "SELECT * FROM pets WHERE id = :id";

$statement = $dbh->prepare($sql);

$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_INT);

$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name'] . ", " .$row['type'].", ".$row['color'];