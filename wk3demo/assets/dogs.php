<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getDogsAsTable($db) {
    try {
        $sql = $db->prepare("SELECT * FROM animals");
        $sql->execute();
        $dogs = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ($dogs as $dog){
                $table .= "<tr><td>" . $dog['name'];
                $table .= "</td><td>" . $dog['gender'];
                $table .= "</td><td>" . $dog['fixed'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "Life is sad. There are no dogs.";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem retrieving the dogs");
    }
    /*if ( count($results) ) {
        foreach ($results as $dog) {
            print_r($dog);
        }
    }*/
}