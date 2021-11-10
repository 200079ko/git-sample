<?php
//定数
define('CSV_PATH', 'data/users.csv');

if (!empty($_POST)) {
    //POSTがあれば書き込み
    insert($_POST);
}
//ユーザ読み込み
$users = load();
//ユーザデータ読み込み
function load()
{
    $items = [];
    if (file_exists(CSV_PATH)) {
        //ファイルがあればファイルを開く（read only)
        $file = fopen(CSV_PATH, 'r');
        //カラムを読み込む
        $columns = fgetcsv($file);
        //1行ずつCSV読み込み
        while ($data = fgetcsv($file)) {
            //カラムを繰り返す
            foreach ($columns as $index => $column) {
                $item[$column] = $data[$index];
            }
            //ユーザを追加
            $items[] = $item;
        }
        //ファイルを閉じる
        fclose($file);
    }
    return $items;
}

//データ書き込み
function insert($posts)
{
    initCSV();
    //データチェック
    $errors = validate($posts);
    if ($errors) {
        // エラーがあったらかえす
        return $errors;
    }

    //ファイルを開く(add)
    $file = fopen(CSV_PATH, 'a');
    //データを追加で書き込む
    fputcsv($file, $posts);
    //ファイルを閉じる
    fclose($file);
}

//データチェック
function validate($data)
{
    $errors = [];
    if (empty($data['name'])) {
        $errors[] = '氏名が入力されていません';
    }
    if (empty($data['email'])) {
        $errors[] = 'Emailが入力されていません';
    }
    if (empty($data['password'])) {
        $errors[] = 'パスワードが入力されていません';
    }
    return $errors;
}

//CSVの初期化
function initCSV()
{
    //ファイルを開く（add & read）
    $file = fopen(CSV_PATH, 'a+');
    if (!fgets($file)) {
        //もしデータがなければ
        $data = ['name', 'email', 'password'];
        //ファイルに書き込む(write)
        fputcsv($file, $data);
    }
    fclose($file);
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
    <form action="" method="post">
        <h2>氏名</h2>
        <input type="text" name="name">
        <h2>Email</h2>
        <input type="text" name="email">
        <h2>パスワード</h2>
        <input type="password" name="password">
        <p><button>登録</button></p>
    </form>

    <h2>ユーザー</h2>
    <table>
        <?php if ($users): ?>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach ?>
        <?php endif ?>
    </table>
</body>

</html>