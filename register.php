<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>留言墙</title>
		<style>
			@media screen and (max-width:650px){
				.computer{
					display: none;
				}
			}
			@media screen and (min-width:650px){
				.phone{
					display: none;
				}
			}
			.c_table1{
				margin: 0 auto;
				margin-top: 100px;
			}
			.c_a{
				text-decoration: none;color: #000000;
			}
			.c_li{
				height: 50px;width: 120px;list-style: none;display: flex;justify-content:center;align-items:center;
			}
			.c_li:hover{
				color: #fff;
				background: #bbb;
			}
			li a{
				text-decoration: none;
			}
			.c_nr{
				width: 800px;
				
				display: flex;
				justify-content:center;
			}
			
			.c_gonggao{
				
				
				width: 150px;
				height: 500px;
			}
			.c_show{
				width: 650px;
				padding: 150px 0px;
				display: flex;justify-content:center;align-items:center;
				
			}
			.c_content{
				padding: 15px 50px 15px 40px;
				font-size: 13px;
			}
			.c_content a{
				text-decoration: none;color: #006699;
			}
			.c_time{
				font-size: 10px;
				color: #aaa;
			}
			.c_page{
				
				width: 500px;
				height: 50px;
				font-size: 12px;
				color: #777;
				
			}
			.c_page a{
				text-decoration: none;color: #777;
			}
			.c_name{
				text-decoration: none;color: #0a96d9;font-family: "微软雅黑";font-style: bold;font-size: 14px;
			}
			.c_usern{
				color: #0a96d9;;
			}
		</style>
		<script>
			var xmlobj;
			function chickpw(pw){
				var reg=/^\w{6,16}$/;
				if(pw==''){
					pts.innerText="密码不能为空！";
				}else if(!reg.test(pw)){
					pts.innerText="密码是6~16位的字母或数字！"
				}else{
					pts.innerText="";
				}
			}
			
			function chickuser(form){
				if(form.username.value==""){
					uts.innerText="用户名不能为空！";
					return false;
				}else{
					uts.innerText="";
				}
				if(form.pw.value==""){
					pts.innerText="密码不能为空！";
					return false;
				}else{
					pts.innerText="";
				}
				if(form.pw2.value==""){
				pts2.innerText="请重复密码!";
			
				return false;}
				else{
					pts2.innerText="";
				}
				if(form.pw.value!=form.pw2.value){
				pts2.innerText="两次输入的密码不同！";
				return false;
				}
			}
			function chickusername(user){
				var reg=/^\S*$/;
				console.log(user);
				if(user==''){
					uts.innerText="请输入用户名!";
				}else if(!reg.test(user)){
					uts.innerText="用户名不合法!";
				}else{
					
//					if(window.ActiveXObject){
//						xmlobj=new ActiveXObject("Microsoft.XMLHTTP");
//						
//					}else if(window.XMLHttpRequest){
//						xmlobj=new XMLHttpRequest();
//					}

					xmlobj = new XMLHttpRequest();
					xmlobj.onreadystatechange =	function (){
						
						if(xmlobj.readyState == 4 && xmlobj.status == 200){
							
						
							if(parseInt(xmlobj.responseText)==1){
								uts.innerText="该用户名已存在！";
								
							}else
								uts.innerText='';
						}
					}
					xmlobj.open('GET','chk.php?username='+user,true);
					xmlobj.send();
					
				}
			}

		</script>
	</head>
	<body>
		<div class="computer" >
			<table class="c_table1" cellspacing="0" cellpadding="0" border="1" bordercolor="#ddd" width="800px">
				<tr>
					<td height="50px" style="display: flex;">
						<a class="c_a" href="index.php">
							<li class="c_li" >所有留言</li>
						</a>
						<a class="c_a" href="tuijian.php">
							<li class="c_li">近期推荐</li>
						</a>
						<a class="c_a" href="huati.php">
							<li class="c_li">热门话题</li>
						</a>
						<a class="c_a" href="mywords.php">
							<li class="c_li">我的留言</li>
						</a>
						<a class="c_a" href="leaving.php">
							<li class="c_li">我要留言</li>
						</a>
						
						<li style="height: 50px;width: 200px;list-style: none;display: flex;justify-content:flex-end;align-items:center;font-size: 13px;"><a href='denglu.php'>登录</a>&nbsp;|&nbsp;<a href='register.php'>注册</a></li>
						
					</td>
					
				</tr>
				<tr>
					<td >
						<div class="c_nr">
							<div>
							<div class="c_show">
								<form name="denglu" action="disregister.php" method="post" onsubmit="return chickuser(this);">
									<table cellpadding="0" cellspacing="0" border="0" >
										<tr>
											<td><input placeholder="设置用户名" name="username" type="text" onblur="chickusername(denglu.username.value);" /><br><div id="uts" style="color:red;font-size: 12px;"></div></td>
										</tr>
										<tr>
											<td  style="padding:25px 0px 0px 0px;"><input placeholder="设置密码" name="pw" type="password" onblur="chickpw(denglu.pw.value);"/><br><div  style="color:red;font-size: 12px;" id="pts"></div></td>
										</tr>
										<tr >
											<td style="padding:25px 0px 0px 0px;"><input placeholder="再次输入密码" name="pw2" type="password" /><br><div  style="color:red;font-size: 12px;" id="pts2"></div></td>
										</tr>
										<tr align="center">
											<td style="padding: 25px 0px 0px 0px;"><input name="sub" type="submit" value="立即注册" style="width: 100px;"/></td>
										</tr>
									</table>
								</form>
							</div>
							</div>
						
						<div class="c_gonggao"></div>
						</div>
					</td>
					
				</tr>
			</table>
		</div>
		<div class="phone">
			<h1>sorry,手机布局正在努力调试中。。请用电脑打开！</h1>
		</div>
	</body>
</html>
