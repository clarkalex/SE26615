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
                $table .= "</td><td><form action='#' method='post'><input type='hidden' name='id' value='". $dog['id'] ."' /><input type='submit' name='action' value='Edit' /> </form>";
                $table .= "</td><td><form action='#' method='post'><input type='hidden' name='id' value='". $dog['id'] ."' /><input type='submit' name='action' value='Delete' /> </form>";
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
function addDog($db, $name, $gender, $fixed) {
    try {
        $sql = $db->prepare("INSERT INTO animals VALUES (null, :name, :gender, :fixed)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem giving birth to the puppy.");
    }
}