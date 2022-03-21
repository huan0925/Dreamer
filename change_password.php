<!DOCTYPE html>
<?php
session_start();
include("conn.php");
?>
<?php 

if(!isset($_SESSION['email'])){
	
	header("location: index.php");

}else{ 
?>
<!DOCTYPE html>
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
	<div>
		<?php 
		$user = $_SESSION['email'];
		$get_user = "select * from user where email='$user'"; 
		$run_user = mysqli_query($link,$get_user);
		$row=mysqli_fetch_array($run_user);
					
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color: white;"><strong>DREAMER</strong></h1></center>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
		        <div class="header">
				<h3 style="text-align: center;"><strong>Change Your Password </strong></h3>
				<strong style="color:#187FAB; "><i><?php echo $user_name; ?></i></strong>
				<hr>
		        </div>
		        <div class="l-part">
		          <form  action="" method="post">
		          	<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="pass" placeholder="New Password" required="required">
					</div><br>
					<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="pass1" placeholder="Re-enter Password" required="required">
					</div><br>
		            <center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
		          </form>
		        </div>
	      </div>
		</div>
	</div>
</body>
</html>
  	<?php
        if(isset($_POST['change'])){
			$pass = htmlentities(mysqli_real_escape_string($link,$_POST['pass']));
			$pass1 = htmlentities(mysqli_real_escape_string($link,$_POST['pass1']));

				if ($pass == $pass1) {
					if (strlen($pass) >= 8 && strlen($pass) <= 60) {
						$update = "update user set password='$pass' where user_id='$user_id'";
		
						$run = mysqli_query($link,$update);
							echo "<script>alert('您的密碼已更改，請重新登入一次')</script>";
							echo "<script>window.open('login.php','_self')</script>";
							
					}else{
						echo "<script>alert('密碼必須超過8個字')</script>";
						}
					}else{
						echo "<script>alert('您的密碼不相符')</script>";
					}
		}
    ?>

<?php } ?>