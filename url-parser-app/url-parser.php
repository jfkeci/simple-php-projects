<?php

$url = '';

if(isset($_POST['my-url'])){
    $url = str_replace('C:\xampp\htdocs', 'localhost', $_POST['my-url']);
    $url = str_replace('\\', '/', $url);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Url parser!</title>
</head>

<body>
    <div class="containter">
        <center><h1>Url parser</h1></center>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="my-url" class="form-label">Url</label>
                <input type="text" class="form-control" id="my-url" name="my-url" value="<?php echo $url; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Parse</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>