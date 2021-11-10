<?php
$enemy_hp = 10;
// $attack = 10;
$attack = rand(1, 15);

if ($enemy_hp - $attack <= 0) {
    $message = "敵を倒した！";
} else {
    $message = "敵はまだ生きている";
}
//移動方法（いどうほうほう）
$distance = rand(0, 70) / 10;
$move_method = '';
if ($distance < 1) {
    $move_method = '徒歩';
} else if ($distance >= 1 && $distance < 5) {
    $move_method = '自転車';
} else {
    $move_method = '電車';
}
//曜日の番号（日 = 0, 月 = 1, 火 = 2 .....）
$week_number = date('w');
$week_strings = ['日', '月', '火', '水', '木', '金', '土'];
$week = $week_strings[$week_number];
$garbage_day = '';
switch ($week_number) {
    case 1:
    case 3:
        $garbage_day = '燃えるゴミ';
        break;
    case 5:
        $garbage_day = '燃えないゴミ';
        break;
    default:
        $garbage_day = '回収なし';
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
   <h2>バトルメッセージ</h2> 
   <p>敵のHP<?= $enemy_hp ?></p>
   <p>ダメージ<?= $attack ?></p>
   <p><?php echo $message ?></p>
   <p><?= $message ?></p>

   <h2>移動方法</h2>
   <p>距離：<?= $distance ?>km</p>
   <p>移動：<?= $move_method ?></p>

   <h2>曜日</h2>
   <p>番号：<?= $week_number ?></p>
   <p><?= $week ?>曜日</p>
   <p><?= $garbage_day ?></p>
</body>
</html>