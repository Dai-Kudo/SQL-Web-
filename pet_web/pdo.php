<?php
// データベースへ接続
	$dsn = "mysql:dbname=pet_db;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	// ここに追加
	$dbInfo = new PDO($dsn,$user,$password);

?>