
<?php

session_start();

if(isset($_SESSION['user_id'])){
    header('Location: index.php');
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
    <form class="new-note" action="user.php" method="post">
        <input type="text" name="register_username" placeholder="Note title" autocomplete="off">
        <input type="text" name="register_password" placeholder="Note title" autocomplete="off">
        <button>Register</button>
        <a href="login.php">Already have an account?</a>
    </form>
    
</div>
</body>
</html>