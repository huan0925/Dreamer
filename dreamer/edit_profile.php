<!--user_image和user_cover的更改功能尚未寫入-->
<!DOCTYPE html>
<?php
session_start();
include('conn.php');
?>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
</head>
<style>
		*{
			margin:0px;
			padding: 0px;
			box-sizing: border-box;
		}
		body{
		background:url("images/21.png") no-repeat center; 
		}
		.rg_layout{
			width: 900px;
			height: 600px;
			border: 8px solid #EEEEEE;
			background-color: white;
			margin:auto;
			margin-top:15px;
			padding: 20px;
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
		#username,#password,#email,#name,#birthday,#account,#describe,#gender,#status,#address,#u_image{
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
		}
		input[type="file"] {
    		display: none;
		}

		</style>
	</head>
	<body>
	<?php 
        $user = $_SESSION['email'];
        $get_user = "SELECT * FROM user WHERE email='$user'"; 
        $run_user = mysqli_query($link,$get_user);
        $row=mysqli_fetch_array($run_user);
        
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $account = $row['account'];
            $describe_user = $row['describe_user'];
            $password = $row['password'];
            $email = $row['email'];
            $gender = $row['gender'];
            $birthday = $row['birthday'];
            $account = $row['account'];
            $user_image = $row['user_image'];
            $user_cover = $row['user_cover'];
			$address = $row['address'];
            $recovery_account = $row['recovery_account'];
      ?>

		<div class="rg_layout">
			<div class="rg_left">
				<p style="font-weight: bolder;">修改個人資料</p>
				<p>Edit your profile</p>
			</div>
			<div class="rg_center">
				<div class="rg_form">
					<form action="" method="post">
						<div class="input-group">
						<table>
							<tr>
								<td class="td_left">帳號</td>
								<td class="td_right"><input id="account" placeholder="請輸入更改的帳號" type="text" name="account" required="required" value="<?php echo $account;?>"></td>
							</tr>
							<tr>
								<td class="td_left">用戶名</td>
								<td class="td_right"><input id="username" placeholder="請輸入更改的用戶名" type="text" name="u_name" required="required" value="<?php echo $user_name;?>"></td>
							</tr>
							<tr>
								<td class="td_left">個性簽名</td>
								<td class="td_right"><input id="describe" type="text" name="describe_user" required="required" value="<?php echo $describe_user;?>"></td>
							</tr>
							<tr>
								<td class="td_left">密碼</td>
								<td class="td_right">
								<input class="form-control" type="password" name="password" id="my_pass" required="required" value="<?php echo $password;?>"/><!-- onfocus="this.value=''" --><br>
								<input type="checkbox" onclick="show_password()"> <strong>Show Password</strong>
								</td>
							</tr>
							<tr>
								<td class="td_left">Email</td>
								<td class="td_right"><input id="email" type="email" name="u_email" required="required" value="<?php echo $email;?>"></td>
							</tr>
							<tr>
								<td class="td_left">地址</td>
								<td class="td_right"><input id="address" type="text" name="u_address" required="required" value="<?php echo $address;?>"></td>
							</tr>
							<tr>
								<td class="td_left">頭貼</td>
								
								<td class="td_right">
									<span><?php echo $user_image;?></span>
									<label class='btn btn-info'>更換頭貼
									<input id="u_image" type="file" name="u_image" value="<?php echo $user_image;?>"/>	
								</td></label>
								
							</tr>
						<tr>
							<td class="td_left">生日</td>
							<td class="td_right"><input id="birthday" type="date" name="u_birthday" class="form-control input-md" value="<?php echo $birthday;?>" required="required"></td>
						</tr>
						<tr>
						<tr align="center">
							<td colspan="6">
							<input class="btn btn-info" style="width: 80px;" type="submit" name="update" value="更改"/>
							</td>
							<td colspan="6">
							<button type="button" class="btn btn-info" style="width: 80px;"><a href="user.php?u_id=<?php echo $user_id; ?>">回上頁</a></button>
							</td>
						</tr>
						<?php 
							if(isset($_POST['update'])){
								$account = htmlentities($_POST['account']);
								$u_name = htmlentities($_POST['u_name']);
								$describe_user = htmlentities($_POST['describe_user']);
								//$u_image = $_FILES['u_image']['name'];
						        //$image_tmp = $_FILES['u_image']['tmp_name'];
								$u_pass = htmlentities($_POST['password']);
								$u_address = htmlentities($_POST['u_address']);
								$u_birthday = htmlentities($_POST['u_birthday']);				        
							
								//move_uploaded_file($image_tmp,"users/$u_image");
								$update = "update user set account='$account',user_name='$u_name',describe_user='$describe_user', password='$u_pass',gender='$u_gender',birthday='$u_birthday',address='$u_address' where user_id='$user_id'";
								$run = mysqli_query($link,$update); 

								if($run){
									echo "<script>alert('Your Profile Updated!')</script>";
									//echo "<script>window.open('index.php','_self')</script>";
								}
							}											
						?>

					</table>
				</form>
						
		</div>
		</div>
	</div>
</div>
</body>
</html>
					

<script>
function show_password() {
    var x = document.getElementById("my_pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>