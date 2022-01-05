<!DOCTYPE html>
<?php 
    session_start();
    include("conn.php");
?>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="styles/forgot_password.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        background:url("images/21.png") no-repeat center; 
    }
	.main-content {
    width: 50%;
    height: 40%;
    margin: 10px auto;
    background-color: #fff;
    border: 2px solid #e6e6e6;
    padding: 40px 50px;
  }
  .header {
    border: 0px solid #000;
    margin-bottom: 5px;
  }
  .well{
    background-color: #187FAB;
  }
  #signup{
    width: 60%;
    border-radius: 30px;
  }
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
		        <div class="header">
				<h3 style="text-align: center;"><strong>請先輸入你的E-mail</strong></h3>
				<hr>
		        </div>
                <form method="post">
                    <div class="user-box">
                        <center>
                        <input type="email" name="email" required placeholder="E-mail"><br><br>
                        <input type="submit" id="btn_sub" value="送出" name="submit" style="width: 90px; margin-left: 5px; background-color:#FFD306; cursor: pointer;">
                        <a href="register.php"><input type="button" id="btn_reg" value="註冊" name="regist" style="width: 90px; margin-left: 5px; background-color:#FFD306; cursor: pointer;"></a>
                        </center>   
                    </div>
                </form>
                <?php
                    if (isset($_POST['submit'])){
                        $email = $_POST['email'];
                        $select_user = "SELECT * FROM user WHERE email = '$email'";
                        $query = mysqli_query($link, $select_user);
                        $check_user = mysqli_num_rows($query);
                        if ($check_user == 1) {
                            $_SESSION['email']=$email;
                            echo "<script>window.open('change_password.php','_self')</script>";
                        }else {
                            echo "<script>alert('查無此帳號，請先註冊或重新輸入您的E-mail！')</script>";
                            echo "<script>window.open('forgot_password.php','_self')</script>";
                        }
                    }
                ?>
	        </div>
		</div>
	</div>
</body>
</html>
