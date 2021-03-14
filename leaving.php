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
				padding: 30px 0px;
				
				
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
			.c_form{
				display: flex;align-items:center;flex-direction:column;
			}
			.c_leav{
				padding: 30px 0px;
			}
		</style>
		<script>
			function chickcount(form){
				reg=/\S+/g;
				if(reg.test(form.txt_content.value)){
					
					tsc.innerText="";
					
				}else{
					tsc.innerText="留言不能为空！";
					return false;
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
							<li class="c_li">所有留言</li>
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
							<li class="c_li"  style="color: #fff;background: #999999;">我要留言</li>
						</a>
						
						<li style="height: 50px;width: 200px;list-style: none;display: flex;justify-content:flex-end;align-items:center;font-size: 13px;">
							<?php
							session_start();
							if(isset($_SESSION['username'])){
								$username=$_SESSION['username'];
								echo "<span class='c_usern'>$username&nbsp;</span>|&nbsp;<a href='logout.php'>注销&nbsp;</a>";
							}else{
								echo "<script>alert('请先登录!');location.href='denglu.php';</script>";
							}
							
							?>
						</li>
						
					</td>
					
				</tr>
				<tr>
					<td >
						<div class="c_nr">
							<div>
							<div class="c_show">
								<form name="form1" action='in_leaving.php' method="post" class="c_form" onsubmit="return chickcount(this)">
									<div class="c_leav"><textarea placeholder="留下你的美言吧!" name="txt_content" cols="50" rows="8" id="txt_content" value="" ></textarea><br><div id="tsc" style="font-size: 12px;color: red;"></div></div>
									<div class="c_leav">选择话题：<select name="huati" >
										<option value="">无</option>
										<?php
											
											include("conn.php");
											$result=$pdo->query("select huati from tb_huati");
											
											while($row=$result->fetch(PDO::FETCH_OBJ))
											{
												echo "<option value='".$row->huati."'>".$row->huati."</option>";
												
											}
											$result=$pdo=null;
											
										?>
									</select></div>
								
									<div class="c_leav"><input name="submit" type="submit" value="提交" style="width: 100px;"/></div>
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
