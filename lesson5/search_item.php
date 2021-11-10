<?php
$items = ['coffee','green_tea','apple_juice'];

$item = '';
$keyword = '';

if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    //finding with keyword
    $index=array_search($keyword,$items);
    //result for finding
    if(is_int($index)){
        $item = $items[$index];

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class= "container">
        <h2 class = "h2">商品検索</h2>
        <form action=""method= "get">
            <input type="text"name= "keyword"class="form-control">
            <button class="btn btn-primary">検索</button>
        </form>

        <?php if($item):?>
            <p class="alert alert-info">
                <?= $item?> is available.
            </p>
        <?php elseif($keyword): ?>
            <p class = "alert alert-danger">
                <?= $keyword ?> is not available.
            </p>
        <?php endif ?>
    </div>
</body>
</html>