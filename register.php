<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>註冊</title>
		  <script>
        function refresh_code(){ 
            document.getElementById("imgcode").src = "register.php"; 
        } 
    </script>
		<style>
		*{
			margin:0px;
			padding: 0px;
			box-sizing: border-box;
		}
		body{
			background:url("images/21.png") no-repeat center; 
		}
		.error{
			font-size: 12px;
			color: red;
		}
		.rg_layout{
			width: 900px;
			height: 400px;
			border: 8px solid #EEEEEE;
			background-color: white;
			margin:auto;
			margin-top:15px;
		}
		.rg_left{
			float:left;
			margin: 15px;
		}
		.rg_left > p:first-child{
			color:#FFD026;
			font-size: 20px;
		}
		.rg_left > p:last-child{
			color:#A6A6A6;
			font-size: 20px;
		}
		.rg_center{
			float:left;
			width: 450px;
		}
		.rg_right{
			float:right;
			margin: 15px;
		}
		.rg_right > p:last-child{
			font-size: 15px;
		}
		.rg_right p a{
			color:blue;
		}
		.td_left{
			width: 100px;
			text-align: right;
			height: 45px;
		}
		.td_right{
			padding-left:50px;
		}
		#username,#password,#email,#name,#birthday,#address{
			width: 251px;
			height: 32px;
			border: 1px solid #A6A6A6;
			border-radius: 5px;
			padding-left: 10px;
		}
		#checkcode{
			width: 110px;
		}
		#img_check{
			height: 32px;
			vertical-align: middle;
			width: 100px;
		}
		#btn_sub{
			width: 150px;
			height: 40px;
			background-color:#FFD026;
			border: 1px solid #FFD026;
			margin-top: 15px;
			cursor: pointer;
		}
		</style>
	</head>
	<body>
<?php 
include("insert_user.php");?>

		<div class="rg_layout">
			<div class="rg_left">
				<p style="font-weight: bolder;">新用戶註冊</p>
				<p>USER REGISTER</p>
				<p><span class="error">* 必填</span></p>
			</div>
			<div class="rg_center">
				<div class="rg_form">
					<form method="post">
						<table>
							<tr>
								<td class="td_left"><label for="username">用戶名</label></td>
								<td class="td_right"><input type="text" name="account" id="username" placeholder="請輸入用戶名" required>
									<span class="error"> * <br></span></td>
							</tr>
							
							<tr>
								<td class="td_left"><label for="password">密碼</label></td>
								<td class="td_right"><input type="password" name="password" id="password" placeholder="請輸入密碼" required>
									<span class="error">* <br></span></td>
							</tr>
							<tr>
								<td class="td_left"><label for="email">email</label></td>
								<td class="td_right"><input type="email" name="email" id="email" placeholder="請輸入email" required>
									<span class="error">* <br></span>
									<p style="font-size:5px; color:red;">Email一旦輸入後不可更改，請再三確認是否正確！</p></td>
								
							</tr>
							<tr>
								<td class="td_left"><label for="name">姓名</label></td>
								<td class="td_right"><input type="text" name="name" id="name" placeholder="請輸入姓名" required>
								<span class="error">* <br></span></td>
							</tr>
						<tr>
							<td class="td_left"><label for="birthday">出生日期</label></td>
							<td class="td_right"><input type="date" name="birthday" id="birthday" placeholder="請輸入出生日期"></td>
						</tr>
						<tr>
							<td class="td_left"><label for="address">地址</label></td>
							<td class="td_right"><input type="text" name="address" id="address" placeholder="請輸入地址" required>
							<span class="error">* <br></span></td>
						</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" id="btn_sub" value="註冊" name="sign_up"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="rg_right">
		<p>已有帳號<a href="login.php"><input type="submit" id="btn_sub" value="立即登入" style="width: 90px; margin-left: 5px; background-color:#FFD306; cursor: pointer;">
	</a></p>
</div>
</div>
</body>
</html>