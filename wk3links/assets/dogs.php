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
                $table .= "<td><a href='?id=". $dog['id'] ."&action=Delete'>Delete</a></td>";
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