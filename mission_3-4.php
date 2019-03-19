<?php
$dsn='mysql:dbname=#;host=#';
$user='#';
$password='#';
$pdo=new PDO($dsn,$user,$password);

//テーブルの中を確認
$sql='SHOW CREATE TABLE table_ohashi';
$result=$pdo->query($sql);
foreach((array)$result as $row){
print_r($row);
}
echo "<hr>";
?>