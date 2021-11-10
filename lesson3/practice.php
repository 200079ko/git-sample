<?php
$date_string = date('y年m月d日H時i分s秒');
$random_number = rand(1, 9);
$message_1 = 'Hello';
$length_1 = strlen($message_1);
$message_2 = 'こんにちは';
$length_2 = mb_strlen($message_2);
$$message_3 = 'Hello,Tokyo';
$message_3
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
    <h2>日時</h2>
    <p><?= $date_string ?></p>
    <h2>サイコロ</h2>
    <p><?= $random_number ?></p>
    <h2><?= $message_1 ?>の長さ</h2>
    <p><?= $length_1 ?></p>
    <h2><?=$message_2?>の長さ</h2>
    <p><?=$length_2?></p>
</body>

</html>