<?php
session_start();

$user = [
    'name' => '',
    'email' => '',
    'password' => '',
    'birthday' => '',
    'gender' => '',
];
$gender = ['male' => '男','female' => '女'];

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
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
    <form action="confirm.php" method="post">
        <h3>氏名</h3>
        <input type="text" name="name" value = "<?= $user['name']?>>
        <h3>mail address</h3>
        <input type="text" name="email" value = "<?$user['email']?>>
        <h3>password</h3>
        <input type="password" name="password">
        <h2>誕生日</h2>
        <select name="year">
            <?php foreach (range(date('Y'), 1900) as $year) : ?>
                <option value="<?= $year ?>"><?= $year ?></option>
            <?php endforeach ?>
        </select>
        年
        <select name="month">
            <?php foreach (range(1, 12) as $month) : ?>
                <option value="<?= $month ?>"><?= $month ?></option>
            <?php endforeach ?>
        </select>
        月
        <select name="day">
            <?php foreach (range(1, 31) as $day) : ?>
                <option value="<?= $day ?>"><?= $day ?></option>
            <?php endforeach ?>
        </select>
        日

        <h3>性別</h3>
        <input type="radio" name="gender" value="male" id="gender_male"<? radioChecked($user)['gendef']>
        <label for="gender_male">男</label>
        <input type="radio" name="gender" value="female" id="gender_female">
        <label for="gender_female">女</label>

        <h3>Question</h3>
        <p>How's programming</p>
        <input type="checkbox" name="q1[]" id="q1_1">
        <label for="q1_1">Easy</label>
        <input type="checkbox" name="q2[]" id="q1_2">
        <label for="q1_2">Difficult</label>
        <input type="checkbox" name="q3[]" id="q1_3">
        <label for="q1_3">Normal</label>

        <div>
            <input type="submit" value="送信">
            <button type="submit">送信</button>
        </div>

    </form>
</body>

</html>