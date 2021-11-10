<?php
date_default_timezone_set('Asia/Tokyo');

$weeks = ['日', '月', '火', '水', '木', '金', '土'];

$weeks_number = date('w');

$datetime = strtotime('1999/4/22');

##Today
$date = new DateTime();
##1999/4/22
$date2 = new  DateTime('1999/4/22');
## diff
$diff_date = $date2->diff($date);

$day = 1;
$format = "{$month}/{$day}";
$current_date = date($format);

$start_day = 1;
$end_day = date('t');
$days = range($start_day, $end_day);

function dayOfWeek($day){
    $year = date('Y');
    $month = date('m');
    $date_string = "{$year}-{$month}-{$day}";
    $index = date('w', strtotime($date_string));
   
    return $index;
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
    <h2>年</h2>
    <p><?= date('Y') ?></p>

    <h2>月</h2>
    <p><?= date('m') ?></p>

    <h2>日</h2>
    <p><?= date('m') ?></p>

    <h2>日付</h2>
    <p><?= date('Y年m月d日') ?></p>

    <h2>時刻</h2>
    <p><?= date('H:i:s') ?></p>

    <h2>曜日</h2>
    <p><?= $weeks[$weeks_number] ?>曜日</p>

    <h2>今月の末日</h2>
    <p><?= date('t') ?>日</p>

    <h2>UTC(Unix Timestamp)</h2>
    <p><?= time() ?></p>

    <h2>1999/4/22</h2>
    <p><?= $datetime ?></p>

    <p><?= date('Y年m月d日', $datetime) ?></p>



    <h2>翌日</h2>
    <p><?= date('Y/m/d H:i:s', strtotime('+1days')) ?></p>

    <h2>昨日</h2>
    <p><?= date('Y/m/d H:i:s', strtotime('-3months')) ?></p>

    <h2>2週間後</h2>
    <p><?= date('Y/m/d H:i:s', strtotime('+2weeks')) ?></p>

    <h2>5週間後</h2>
    <p><?= date('Y/m/d H:i:s', strtotime('+5weeks')) ?></p>

    <h2>DateTime</h2>
    <p><?= $date->format('Y') ?></p>
    <p><?= $date->format('Y/m/d H:i:s') ?></p>
    <p><?= $date->modify('+1days')->format('Y/m/d H:i:s') ?></p>

    <h2>Diff</h2>
    <p><?= $diff_date->days ?>日</p>
    <p><?= floor($diff_date->days / 365) ?>歳</p>


    <h2>今月のカレンダー</h2>
    <h2>2021年7月</h2>
    <?php foreach ($days as $day) : ?>
        <p><?= $day ?></p>
    <?php endforeach ?>

</body>

</html>