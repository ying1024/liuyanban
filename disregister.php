<?php
header("Content-Type:text/html;charset=utf-8");
if(isset($_POST['sub'])){
$username=$_POST['username'];
$pw=$_POST['pw'];
include("conn.php");

$result=$pdo->exec("insert into tb_lyuser (name,password) value ('$username','$pw')");

if($result){
	echo "<script>alert('注册成功！');location.href='denglu.php';</script>";	
}else{
	echo "<script>alert('注册失败！');location.href='register.php';</script>";
}
}else{
	echo "<script>alert('注册失败！');location.href='register.php';<script>";
}
$pdo=$result=null;
?>