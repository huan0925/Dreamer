<?php 
	session_start();
	include('conn.php');

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		$select_user = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
		$query = mysqli_query($link, $select_user);
		$check_user = mysqli_num_rows($query);



		if($check_user==1){
			$_SESSION['email']=$email;//更改為user_id
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<script>alert('帳號或密碼不正確，請再試一次！')</script>";
		}
	}
?>