<?php


$connection = require_once './connection.php';

/* var_dump($_POST);
exit; */


$id = $_POST['id'] ?? '';
if($id){
    $connection->updateNote($id, $_POST);
}else{
    $connection->addNote($_POST);
}



header('Location: index.php');

?>