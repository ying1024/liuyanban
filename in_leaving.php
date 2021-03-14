<?php
include("conn.php");
if(isset($_POST["submit"])){
session_start();
$username=$_SESSION['username'];
var_dump($username);
$content=$_POST["txt_content"];
$huati=$_POST["huati"];
$time=date("Y-m-d H:i:s");
$huati=$_POST["huati"];
$sql=$pdo->exec("insert into tb_liuyan (name,ht,content,time) value ('$username','$huati','$content','$time')");
if($sql){
	echo "<script>alert('留言成功!');</script>";
	echo "<script>window.location.href='index.php';</script>";
}else{
	echo "<script>alert('留言失败!');</script>";
	echo "<script>window.location.href='leaving.php';</script>";
}
}else
echo "<script>alert('提交失败!');history.back();</script>";
$pdo=null;
?>