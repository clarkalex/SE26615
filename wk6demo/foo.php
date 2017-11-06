<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 11/6/2017
 * Time: 11:36 AM
 */
session_start(); // every page that needs session vars needs this line
if ($_SESSION['username'] == NULL || !isset($_SESSION['username'])) {
    header('Location: foo2.php');
}


$file =  file_get_contents("https://www.cnn.com");
echo preg_match_all('/Trump/', $file, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
//$greps = preg_grep('/Trump/', $file);
/* grabbing a primary key for a foreign key reference
$db = get my db
$sql = "INSERT INTO foo VALUES (null, 'Clark', 'Alexander');
$stmt = $db->prepare($sql);
bind params as necessary
$stmt->execute();
$pk = $db->lastInsertId(); // will get me the last primary key inserted
 */
$pwd = "foo";
$hash = password_hash($pwd, PASSWORD_DEFAULT);
echo "<p>" . $hash. "</p>";
echo strlen($hash);
// Pretend $hash came from db
$login_pwd = "foo";
echo password_verify($login_pwd, $hash);

//$pwd = "foo";
//echo "<p>" .password_hash($pwd, PASSWORD_DEFAULT) . "</p>";
//$pwd = "fooiuLHLK23424819%%&&242";
//echo "<p>" .password_hash($pwd, PASSWORD_DEFAULT) . "</p>";



























