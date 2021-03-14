<?php
	header("Content-type: text/html; charset=utf-8");
$username=trim($_POST["username"]);
$pw=$_POST["pw"];

include("conn.php");
$result=$pdo->query("select * from tb_lyuser where name='$username'");
$rew=$result->fetch(PDO::FETCH_ASSOC);

if(!$rew){
	echo <<<script1
		<script>
		alert("该用户不存在！");
		location.href = history.back();
		</script>
script1;
}else if($rew['password']!=$pw){
	echo <<<script2
		<script>
		alert("密码错误！");
		location.href=history.back();
		</script>
script2;
}else {
	session_start();
	$_SESSION['username']=$username;
	echo <<<script
		<script>
		alert("登录成功！");
		location.href = "index.php";
		</script>
script;
	
}

$pdo=$result=null;
?>

