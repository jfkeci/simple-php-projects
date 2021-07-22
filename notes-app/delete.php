<?php


$connection = require_once './connection.php';

/* var_dump($_POST);
exit; */


$connection->deleteNote($_POST['id']);



header('Location: index.php');

?>