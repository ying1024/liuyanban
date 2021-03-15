<?php
header("Content-Type:text/html;charset=utf-8");
$dbms='mysql';
$dbname='a0923134417';
$user='a0923134417';
$pwd='*******';
$host='localhost';
$dsn="$dbms:host=$host;dbname=$dbname";
try{
	$pdo=new PDO($dsn,$user,$pwd);
	$pdo->query("set names utf8");
	
}catch(exception $e){
	echo "数据库服务器连接错误!";
}
?>
