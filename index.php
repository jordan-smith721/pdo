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
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}

////define the query
//$sql = "INSERT INTO pets(type, name, color)
//          VALUES (:type, :name, :color)";
//
////prepare the statement
//$statement = $dbh->prepare($sql);

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
//
//$sql = "SELECT * FROM pets";
//
//$statement = $dbh->prepare($sql);
//
//$statement->execute();
//
//$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//foreach ($result as $row){
//    echo $row['name'].", ".$row['type'].", ".$row['color'];
//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pets Table</title>
</head>
<body>
<table>
    <tr>
        <th>Owner</th>
        <th>Pet</th>
    </tr>

    <?php
    //define sql statement
    $sql = "SELECT po.first, po.last, p.name, p.type FROM pets p 
            INNER JOIN petOwners po WHERE po.petId = p.id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //execute the query
    $statement->execute();

    //save the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row){
        echo "<tr><td>" . $row['first'] ." ". $row['last']."</td>
                <td>" . $row['name'] . " the " . $row['type'] . "</td></tr>";
    }
    ?>

</table>
</body>
</html>
