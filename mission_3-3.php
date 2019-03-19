<?php
$dsn='mysql:dbname=tt_245_99sv_coco_com;host=localhost';
$user='tt-245.99sv-coco.com';
$password='V4w6Fiq9';
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