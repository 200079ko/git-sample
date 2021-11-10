<?php
$db_name = 'my_shop';
$host = 'localhost';
$user_name = 'root';
$password = '';

$dsn = "mysql:dbname={$db_name};host={$host};charset=utf8;";
try {
    $pdo = new PDO($dsn, $user_name, $password);
    echo 'success';
} catch (PDOException $e) {
    echo 'failed';
    echo $e->getMessage();
}
echo PHP_EOL;
var_dump($pdo);
$sql = 'SELECT * FROM users LIMIT 10;';
$stmt = $pdo->query($sql);
var_dump($stmt);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($users);
