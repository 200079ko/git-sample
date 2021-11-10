<?php
//セッションを開始
session_start();
//ユーザデータを用意（資料からコピーする）
$users = [
    ['id' => 1, 'name' => 'user1', 'email' => 'user1@test.com', 'password' => '1111'],
    ['id' => 2, 'name' => 'user2', 'email' => 'user2@test.com', 'password' => '2222'],
    ['id' => 3, 'name' => 'user3', 'email' => 'user3@test.com', 'password' => '3333'],
];
//POSTデータが送信されていれば、ユーザを検索
if (!empty($_POST)) {
    $user = searchUser($users, $_POST['email'], $_POST['password']);
    //もしユーザが見つかったら
    if ($user) {
        //セッションにユーザを登録する
        $_SESSION['user'] = $user;
        //home.php にリダイレクトする
        header('Location: home.php');
    }
}

/**
 * ユーザの検索
 */
function searchUser($users, $email, $password)
{
    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            //email と password が同じなら $user をかえす
            return $user;
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div>
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div>
                <label for="">パスワード</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary">ログイン</button>
        </form>

        <!-- POSTデータがあれば処理 -->
        <?php if (isset($_POST['email'])) : ?>
            <?php if (isset($user['id'])) : ?>
                <p class="alert alert-info">Welcome!, <?= $user['name'] ?>さん</p>
            <?php else : ?>
                <p class="alert alert-danger">Emailまたはパスワードが間違っています</p>
            <?php endif ?>
        <?php endif ?>
    </div>
</body>

</html>