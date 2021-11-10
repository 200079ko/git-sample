<?php
//セッションを開始
session_start();
if (isset($_SESSION['user'])) {
    //セッションにユーザデータがあったら
    $user = $_SESSION['user'];
} else {
    //セッションにユーザデータがなかったら
    //ログイン画面にもどす
    header('Location: login.php');
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
        <a href="logout.php">ログアウト</a>
    </div>
    <h2>ホーム</h2>
    <p>
        <?= $user['name'] ?>さん、ようこそ！
    </p>
</body>
</html>