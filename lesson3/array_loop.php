<?php
    $years = [2020, 2019, 2018, 2017];
    $drinks = ['コーヒー', '紅茶', 'ほうじ茶'];
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
   <h2>個数</h2> 
   <p><?= count($years) ?></p>
   <?php
        //$years の個数分繰り返す
        for ($i = 0; $i < count($years); $i++) { 
            echo $years[$i];
            //HTMLの改行タグ
            echo '<br>';
        }

        foreach ($years as $year) {
            echo $year;
            echo '<br>';
        }
   ?>

   <ul>
       <?php
            //liの繰り返し
            foreach ($drinks as $drink) {
                echo "<li>{$drink}</li>";
            }
       ?>
   </ul>

    <ul>
        <?php foreach ($drinks as $drink) : ?>
            <li><?= $drink ?></li>
        <?php endforeach ?>
    </ul>

</body>
</html>