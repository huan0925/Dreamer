<?php 
include("conn.php");

	if (isset($_POST['sign_up'])) {
		$account = htmlentities(mysqli_real_escape_string($link, $_POST['account']));
		$password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));
		$email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
		$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
		$birthday = htmlentities(mysqli_real_escape_string($link, $_POST['birthday']));
		$address = htmlentities(mysqli_real_escape_string($link, $_POST['address']));
		$post = "no";
	
		$check_account = "SELECT * FROM user WHERE account = '$account'";
		$run_account = mysqli_query($link, $check_account);
		$check = mysqli_num_rows($run_account);

		$check_email = "SELECT * FROM user WHERE email = '$email'";
		$run_email = mysqli_query($link, $check_email);
		$check1 = mysqli_num_rows($run_email);
		if ($check == 1) {
			echo "<script>alert('此帳號已存在，請換另一個，謝謝！')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}else if($check1==1){
			echo "<script>alert('此EMAIL已存在，請換另一個，謝謝！')</script>";
			echo "<script>window.open('register.php','_self')</script>";
			
		}else if(strlen($password) <8){
			echo "<script>alert('密碼必須至少8個字元！')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}else{

		$rand = rand(1,3);

		if ($rand == 1) 
			$profile_pic = "head.png";
		else if($rand == 2)
			$profile_pic = "User_Circle.png";
		else if($rand == 3)
			$profile_pic = "laptop_user.png";

		$insert = "INSERT INTO user (account, password, email, user_name, describe_user,  birthday, user_image, user_cover, posts,address)
		VALUES('$account', '$password', '$email', '$name', 'hello! this is my default status!', '$birthday', '$profile_pic', 'default_cover.jpg', '$post','$address') ";
		$query = mysqli_query($link, $insert);
		
		if ($query) {
			echo "<script>alert('已註冊成功！')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}else{
			echo "<script>alert('註冊失敗，請再試一次！')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}
	}
}
?>