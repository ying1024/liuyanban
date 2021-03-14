<?php
include("conn.php");
$un=trim($_GET['username']);


$result=$pdo->query("select * from tb_lyuser where name='$un'");
$sql=$result->fetch(PDO::FETCH_ASSOC);
echo $result->rowCount();

?>