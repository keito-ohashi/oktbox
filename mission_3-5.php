<?php
$dsn='mysql:dbname=#;host=#';
$user='#';
$password='#';
$pdo=new PDO($dsn,$user,$password);

//テーブル
$sql=$pdo->prepare("INSERT INTO tbtest (id,name,comment) VALUES ('1',:name,:comment)"); //id,name,commentカラムに1,name,commentパラメータを与える
$sql->bindParam(':name',$name,PDO::PARAM_STR); 	//nameパラメータを$nameに代入　PARAM_STR は文字列という型
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$name='James';
$comment='日は必ず上る';
$sql->execute();//prepareの後はexecuteで実行
?>

//参考URL:https://qiita.com/tabo_purify/items/0a69fd48018c4ebfd2f2