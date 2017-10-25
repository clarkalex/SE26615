<?php
require_once("assets/dbconn.php");
require_once ("assets/dogs.php");
include_once("assets/header.php");
$db = dbConn();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "" ; // get it from get or from post or make it ""
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? null;

echo "action is $action and id is $id";
switch ($action){
    case "Delete":
        deleteDog($db, $id);
        break;
}

echo getDogsAsTable($db);
include_once ("assets/footer.php");
?>

