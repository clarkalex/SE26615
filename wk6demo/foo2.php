<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 11/6/2017
 * Time: 2:06 PM
 */
// password verification
session_start();
$_SESSION['username'] = "Clark";
header('Location: foo.php');
