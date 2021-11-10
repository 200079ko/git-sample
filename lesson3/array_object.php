<?php
$character = [
    'id' => 1,
    'name' => 'ヨシカワ',
    'job' => 'brave',
    'level' => 1,
    'hp' => 15,
    'mp' => 0,
    'exp' => 0,
];

$character['exp'] = 5;

//職業のリスト
$jobs = [
    'brave' => '勇者',
    'warrior' => '戦士',
    'wizard' => '魔法使い',
];

$character['weapon'] = '日本刀';
$character['shield'] = 'てつの盾';

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
    <h2>ステータス</h2>
    <table>
        <tr>
            <th>名前</th>
            <th>職業</th>
            <th>Lv</th>
            <th>HP</th>
            <th>MP</th>
            <th>経験値</th>
        </tr> 
        <tr>
            <td><?= $character['name'] ?></td>
            <td><?= $jobs[$character['job']] ?></td>
            <td><?= $character['level'] ?></td>
            <td><?= $character['hp'] ?></td>
            <td><?= $character['mp'] ?></td>
            <td><?= $character['exp'] ?></td>
        </tr>
    </table>

    <h2>持ち物</h2>
    <dl>
        <dt>武器</dt>
        <dd><?= $character['weapon'] ?></dd>
        <dt>盾</dt>
        <dd><?= $character['shield'] ?></dd>
    </dl>
</body>
</html>