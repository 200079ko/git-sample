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

if (!empty($_POST)) {
    $user = $_SESSION['user'] = $_POST;///$user = $_POST,$_SESSION['$user'] = $user;
    $year = (int) $user['year'];
    $month = (int) $user['month'];
    $day = (int) $user['day'];
    $user['birthday_at'] = date("{$year}/{$month}/{$day}");
    
    if($errors = validate($user)){
        //var_dump($errors);
        header('Location: post.php');
        exit;
    }
}
function validate($user)
{
    $errors = [];
    // if(empty($user['name'])){
    //     $errors['name']=true;
    // }
    // if(empty($user['email'])){
    //     $errors['email']=true;
    // }
    // if(empty($user['password'])){
    //     $errors['password']=true;
    // }
    // if(empty($user['gender'])){
    //     $errors['gender']=true;
    // }
    // if(empty($user['birthday_at'])){
    //     $errors['birthday_at']=true;
    // }
    $columns =[
        'name',
        'email',
        'password',
        'gender',
        'birthday_at',
    ];
    foreach ($columns as $column){
        if(empty($user[$column])){
            $errors[$column] = true;
        }
    }
    return $errors;
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
    <h3>name</h3>
    <p><?=$user['name']?></p>
    <h3>mail address</h3>
    <p><?=$user['email']?></p>
    <h3>gender</h3>
    <p>
        <?= $gender[$user['gender']]?>
    </p>
    <h3>Birthday</h3>
    <p>
        <?=date('Y年m月d日',strtotime($user['birthday_at']))?>
    </p>

    <p><a href="post.php">戻る</a></p>
</body>
</html>
