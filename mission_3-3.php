<?php
$dsn='#;host=#';
$user='#';
$password='#';
$pdo=new PDO($dsn,$user,$password);

//テーブル
$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach($result as $row){
echo $row[0];
echo '<br>';
}
echo "<hr>";
?>
