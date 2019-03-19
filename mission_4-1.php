<html>
<head>
<meta charset="UTF-8">
</head>

<body>

	<?php

	$message=$_POST['message'];
	$name=$_POST['name'];
	$number=$_POST['number'];
	$pass=$_POST['pass_text'];
	$pass_delete=$_POST['pass_delete'];
	$delete_num=$_POST['delete_num'];
	$pass_change=$_POST['pass_change'];
	$change_num=$_POST['change_num'];
	$date = date("Y/m/d H:i:s");


	//MYSQL接続
	$dsn='mysql:dbname=#;host=#';
	$user='#';
	$password='#';
	$pdo=new PDO($dsn,$user,$password);				//PDOオブジェクトの生成

	//テーブル
	$sql="CREATE TABLE IF NOT EXISTS table_ohashi"
	."("
	."id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
	."name char(32),"
	."comment TEXT,"
	."password char(32),"
	."date char(32)"
	.");";
	$stmt=$pdo->query($sql);

//編集機能
	if($_POST["sub_change"]){
		if(ctype_digit($change_num) and $pass_change){        
		    $sql="SELECT id,name,comment,password FROM table_ohashi WHERE id=$change_num";
			$stmt = $pdo->query($sql);
	        $result = $stmt->fetchAll();
				if($result[0]['password']==$pass_change){			
		                foreach($result as $row){		
		                    $Id=$row['id'];
		                    $Name=$row['name'];
		                    $Comment=$row['comment'];
		                    $Pass=$row['password'];
		                }
		         }else{
					echo "パスワードが違います。";
				 }
		}
	 }

	if($_POST['sub']){
	     if($number){ 
	            $sql="update table_ohashi set name='$name',comment='$message',password='$pass',date='$date' WHERE id=$number";
	            $result=$pdo->query($sql);
	     }else if($name and $message and $pass){				//テーブルにデータを記入
	   
	            $sql=$pdo -> prepare("INSERT INTO table_ohashi (name,comment,password,date) VALUES (:name,:comment,:password,:date)");
	            $sql->bindParam(':name',$name,PDO::PARAM_STR);
	            $sql->bindParam(':comment',$message,PDO::PARAM_STR);
	            $sql->bindParam(':password',$pass,PDO::PARAM_STR);
	            $sql->bindParam(':date',$date,PDO::PARAM_STR);
	            $sql->execute();


	     }
	}

	

	
	//削除
	if($_POST['sub_delete']){
		if(ctype_digit($delete_num) and $pass_delete){
			$sql = "SELECT id, password FROM table_ohashi WHERE id=$delete_num";		//id=$delete_numのときのidとpasswordを取得
			$stmt = $pdo->query($sql);
	        $result = $stmt->fetchAll(); //配列で取得
	        
			if($delete_num and $_POST['sub_delete']){
				
					if($result[0]['password']==$pass_delete){
					             $sql="DELETE FROM table_ohashi WHERE id=$delete_num";
					             $result=$pdo->query($sql);
					}else{
					
						echo "パスワードが違います。";
					}
				}else{
					echo "IDとパスワード両方を記述してください";
				}
		}
	}



	
    

    

	?>


	<form action="mission_4-1.php" method="post">
		<input type="text" name="name" value="<?php echo $Name;?>" placeholder="名前"><br>

		<input type="text" name="message" value="<?php echo $Comment;?>" placeholder="コメント"><br>

		<input type="hidden" name="number" value="<?php echo $Id;?>">

		<input type="text" name="pass_text" value="<?php echo $Pass;?>" placeholder="パスワード">

		<input type="submit" name="sub" value="送信">
	</form>

	<form action="mission_4-1.php" method="post">
		<p>
		<input type="text" name="delete_num" placeholder="削除対象番号"><br>
		<input type="text" name="pass_delete" placeholder="パスワード">
		<input type="submit" name="sub_delete" value="削除">

		</p>
	</form>

	<form action="mission_4-1.php" method="post">
		<p>
		<input type="text" name="change_num" placeholder="編集対象番号"><br>
		<input type="text" name="pass_change" placeholder="パスワード">
		<input type="submit" name="sub_change" value="編集">

		</p>

	</form>

	<form action="mission_4-1.php" method="post">
		<p>
		<input type="submit" name="sub_table" value="初期化">

		</p>

	</form>
<?php


 $sql="SELECT*FROM table_ohashi ORDER BY id ASC";	//入力データをすべて表示
        $result=$pdo->query($sql);
            foreach($result as $row){
                echo $row['id']." ".$row['name']." ".$row['comment']." ".$row['date'].'<br>';
            }
if($_POST['sub_table']){
	$sql="TRUNCATE TABLE table_ohashi";
	
	$stmt=$pdo->query($sql);
}        

?>
<table border="1">
  <tr>
    <th>ID</th>
    <th>名前</th>
	<th>コメント</th>
	<th>パスワード</th>
  </tr>
  <?php
  $stml = $pdo->query("SELECT * FROM table_ohashi ORDER BY id ASC");
  while ($row = $stml->fetch()) {
	$id = htmlspecialchars($row['id']);
    $name = htmlspecialchars($row['name']);
    $comment = htmlspecialchars($row['comment']);
	$password = htmlspecialchars($row['password']);
    echo "<tr><td>$id</td><td>$name</td><td>$comment</td><td>$password</td></tr>";
  }
?>
</table>

</body>
</html>
