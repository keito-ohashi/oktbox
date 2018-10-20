
<?php
	//DB接続
		$dsn='データベース名';
		$user='ユーザー名';
		$password='パスワード';
		$pdo=new PDO($dsn,$user,$password);

	//6文字以下で0を代入
	if(strlen($_POST['name'])>=6 and strlen($_POST['pass'])>=6){
		$username=$_POST['name'];
		$password=$_POST['pass'];
	}else{
		$username=0;
		$password=0;

	}
		//6文字以上でログイン画面へ
		if($username and $password){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['ok']="会員登録が完了しました。"."<br>";
			header( "Location: http://tt-245.99sv-coco.com/mission_6-1_login.php" ) ;

		}else{
			session_start();
			$_SESSION['error']="※6文字以上で入力してください。";
			header( "Location: http://tt-245.99sv-coco.com/mission_6-1.php" ) ;
		}
?>
