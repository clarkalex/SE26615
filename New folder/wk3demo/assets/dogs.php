<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 8:55 AM
 */
function getDogsAsTable($db) {
    try {
        $sql = "SELECT * FROM dogs";
        $sql = $db->prepare($sql);
        $sql->execute();
        $dogs = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($dogs as $dog) {
                $table .= "<tr><td>" . $dog['name'] . "</td><td>" . $dog['gender'] . "</td><td>" . $dog['fixed'] . "</td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $dog['id'] ."' /><input type='submit' name='action' value='Edit' /></form></td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $dog['id'] ."' /><input type='submit' name='action' value='Delete' /></form></td>";
                $table .= "</tr>" . PHP_EOL;
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "Life is sad. There are no dogs.". PHP_EOL;
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem getting the dogs");
    }
}
function addDog($db, $name, $gender, $fixed) {
    try {
        $sql = $db->prepare("INSERT INTO dogs VALUES (null, :name, :gender, :fixed)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("The was problem adding the dog.");
    }
}
function getDog($db, $id) {
    $sql = $db->prepare("SELECT * FROM dogs WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function updateDog($db, $name, $gender, $fixed, $id){
    try {
        $sql = $db->prepare("UPDATE `dogs` SET name= :name, gender= :gender, fixed= :fixed WHERE id= :id");
        $sql->bindParam(':name', $name, PDO::PARAM_STR);
        $sql->bindParam(':gender', $gender, PDO::PARAM_STR);
        $sql->bindParam(':fixed', $fixed, PDO::PARAM_BOOL); // treat whatever we get as a boolean, not a string
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was problem updating the dog.");
    }
}
function deleteDog($db, $id){
    try {
        $sql = $db->prepare("DELETE FROM dogs WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem deleting the dog.");
    }
}