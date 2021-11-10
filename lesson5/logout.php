<?php
//セッションを開始
session_start();

//もしセッションに user があれば
if (isset($_SESSION['user'])) {
    //セッションから user を消す
    unset($_SESSION['user']);
}
//ログイン画面にもどす
header('Location: login.php');