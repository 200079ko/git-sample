<?php

$sum = 0;

for ($i = 1; $i <= 100; $i++)
{
    $sum += $i; 
    
}
echo $sum;

$years = [2021,2020,2019,2018,2017];

$fruits = ["apple","orange","peach","banana"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        li{
            cursor:pointer;
            line-height: 2em;
        }
        select{
            padding:10px;
            box-sizing:border-box;
            border-radius: 13px;
        }
        option,select:hover{
            border:2px solid rgba(38, 218, 182, 1); 
            
            background-color:rgba(193, 226, 219, 1);
        }
        
    </style>
</head>
<body>
    <p>
        １から100まで足した合計は <?= $sum ?> です。
    </p>

    <h2>年のリスト</h2>
    <p>method's 1</p>
    <ul>
        <?php
            for ($i = 0 ; $i < count($years); $i++)
            {
                $tag = "<li>".$years[$i]."</li>";
                echo $tag;
            }
        
        ?>
    </ul>
    <p>method's 2</p>
    <ul>

        <?php for($i = 0; $i < count($years); $i++):?>
        <li><?= $years[$i]?></li>
        <?php endfor ?>
    </ul>
    <ul>
        <?php foreach($years as $year):?>
        <?php endforeach ?>
    </ul>

    <h2>果物のリスト</h2>
    <ul>
        <?php
            foreach($fruits as $fruit){
                echo "<li>".$fruit."</li>";

            }
        ?>
    </ul>
    <ul>
        <?php foreach($fruits as $fruit):?>
        <li><?= $fruit ?></li>
        <?php endforeach ?>
        <?php var_dump($fruits) ?>
    </ul>

    <h2>プルダウン</h2>
    <select name="year" id="">
        <?php foreach($years as $year):?>
        <option value="<? $year ?>"> <?= $year?> </option>
        <?php endforeach ?>
    </select>
</body>
</html>