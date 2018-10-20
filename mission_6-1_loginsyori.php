<?php
	$name_login=$_POST['name_login'];
	$pass_login=$_POST['pass_login'];

	session_start();


	//ユーザー名とパスワードが一致したらサイトにログイン
	if($name_login==$_SESSION['username'] and $pass_login==$_SESSION['password']){

		header( "Location: http://tt-245.99sv-coco.com/mission_6-1_monthkakunin-2018.php" ) ;

	}else{
		$_SESSION['error_login']="※ユーザー名またはパスワードが違います。"."<br>";
		header( "Location: http://tt-245.99sv-coco.com/mission_6-1_login.php" ) ;
	}


?>