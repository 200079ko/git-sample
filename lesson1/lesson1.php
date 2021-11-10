<?php

$price1 = 88;
$amount1 = 5;
$price2 = 120;
$amount2 = 3;
$discount_rate = 0.1;

$sub_total1 = $price1 * $amount1;
$sub_total2 = $price2 * $amount2;

$total = $sub_total1 + $sub_total2;

$total *= (1 - $discount_rate);

$score1 = 76;
$score2 = 83;
$score3 = 69;
$score4 = 91;
$score_average = ($score1+$score2+$score3+$score4)/4;



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
    <h2>合計金額</h2>
    <?php echo $total ?>円
    <h2>平均点</h2>
    <?=$score_average ?>点
</body>

</html>