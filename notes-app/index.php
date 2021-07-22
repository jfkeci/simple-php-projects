<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

$connection = require_once './connection.php';

$notes = $connection->getNotes($_SESSION['user_id']);

$buttonText = '';

$currentNote = [
    'id' => '',
    'user_id' => '',
    'title' => '',
    'description' => ''
];

if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}

if($currentNote['id']){
    $buttonText = 'Update note';
}else{
    $buttonText = 'Add new Note';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div>
        <form class="new-note" action="save.php" method="post">
        <a href="logout.php">Logout</a>
            <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>"">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>"">
            <input type="text" name="title" placeholder="Note title" autocomplete="off" value=<?php echo trim($currentNote['title']) ?>>
            <textarea name="description" cols="30" rows="4" placeholder="Note Description"><?php echo trim($currentNote['description']) ?></textarea>
            <button><?php echo $buttonText; ?></button>
        </form>
        <div class="notes">
            <?php foreach ($notes as $note) : ?>
                <div class="note">
                    <div class="title">
                        <a href="<?php echo 'index.php?id=' . $note['id'] . '' ?>"><?php echo $note['title']; ?></a>
                    </div>
                    <div class="description">
                        <?php echo $note['description']; ?>
                    </div>
                    <small><?php echo $note['create_date']; ?></small>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                        <button class="close">X</button>
                    </form>
                </div>
            <?php endforeach; ?>
            
        </div>
        

    </div>
</body>
</html>