<?php
session_start();

//$_POSTの中身はログインボタンのnameの値
//ボタンが押されたら処理が開始される判定
if(isset($_POST['soushin'])){	

	//ログイン名が入力されていない場合の処理
	if (empty($_POST["name"])) {
		$errorMessage = "名前が未入力です。";
 		} 
		//パスワードが入力されていない場合の処理
		else if (empty($_POST["pass"])) {
    		$errorMessage = "パスワードが未入力です。";
  		} 
		
		//両方共入力されているか判別してログイン処理開始！！
		if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
		$host = "localhost";
		$db_name ="データベースの名前";		//作ったデータベース名を入れる
		$dsn = "mysql:dbname=$db_name;host=$host;charset=utf8";
		$user = 'ログイン名';		//xampやmampなら初期値は"root"
		$password = 'パスワード';		//xampやmampなら初期値は"root"
		try {
			$dbh = new PDO($dsn, $user, $password);
		}
		catch (PDOException $e){
			die('Error'.$e->getMessage());
		}
		//↑ここまでがデータベースアクセスの定形の処理方法
		
		
		//ログイン名とパスワードのエスケープ処理
		$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
 		$pass = htmlspecialchars($_POST['pass'],ENT_QUOTES);
		
		//データベースアクセスの処理文章。ログイン名があるか判定
		$query = "
		select * from ログイン名のテーブル名
		where name like '%".$name."%' 
		";
		
		//$dbhは最初に設定したデータベースアクセスの変数です。
    		$result = $dbh->query($query);
		
		//データベースにアクセス出来なかった場合の処理
    		if (!$result) {
      	print('クエリーが失敗しました。' . $dbh->error);
      	$dbh->close();
     	exit();
    			}
				
		//ユーザー名の判別。rowCount();	は行数をもらえる関数。
		//説明にはselect文で使用できないと表記されているが、環境によっては使用可能
		$ryou = $result->rowCount();	
		
		//１以上あればデータがあるということなので、判定に使用しています
		if ($ryou>=1) {
			
			//該当する列のパスワードに該当する行の値を引っ張ってきます。
			//$row['値が欲しい行の名前']を入れて値を取りましょう。
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      	$db_hashed_pwd = $row['password'];
		}
		
			//ハッシュ化されたパスワードを判定する定形関数のpassword_verify
			//入力された値と引っ張ってきた値が同じか判定しています。
		 if (password_verify($_POST["pass"], $db_hashed_pwd)) {
			 
			 //パスワードが合っていたら、下の処理します。
			 //セッション変数にsession_idと入力されたログイン名を入れています。
			 //セッション変数にログイン名等を入れることで他のphpに移動して使えます。
			 session_regenerate_id(true);
			 $_SESSION["login"] = session_id();
			 $_SESSION["loginname"] = $name;
			 
			 //ログイン後のphpを読み込ませます。
			header("Location: main.php");
			exit;
			
		 		}
				//パスワードが違ってた時の処理
				else {
					$errorMessage = "パスワードに誤りがあります。";
				}
			}
			//ログイン名がなかった時の処理
			else {
				$errorMessage = "ユーザが登録されていません。";
				}
		}
}
?>

/*ここから下はhtml部分*/

<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ログインページ</title>
</head>
<body>
<h2>ログイン画面</h2>
/*<?php print($_SERVER['PHP_SELF']) ?>は自身のphpを参照しなさいという指定*/
<form method="post" action="<?php print($_SERVER['PHP_SELF']) ?>">
名前：<input type="text" name="name" size="15"><br><br>
パスワード：<input type="text" name="pass" size="15"><br><br>
<input type="submit" name="soushin" value="ログイン">
<input type="submit" name="kuria" value="クリア">
</form>
<br>
<br>
<div><?php echo $errorMessage ?></div>
<br>
<br>
</body>
</html>