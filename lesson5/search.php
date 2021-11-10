<?php

$keyword = '';

if( !empty($_GET['q'])){
    $keyword = $_GET['q'];
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <img src="images/googlelogo.png" alt="" width="200">

        <form action="" method="get">
            <input type="text" name="q" value="<?=$keyword ?>">
            <p>
                <button>Google search</button>
            </p>
        </form>
    </div>
</body>

</html>