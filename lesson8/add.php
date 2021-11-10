<?php

require_once'config.php';
require_once'connect.php';

session_start();
function findByCode($pdo,$code)
{
    $sql= "SELECT * FROM items WHERE code = '{$code}'";
}
function insert($pdo, $data){
    $sql = "INSERT INTO items ( code,name,price,stock)
            VALUES (:code,:name,:price,:stock)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
            
}

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    insert($pdo,$_POST);
    header('Location: input.php');
}
