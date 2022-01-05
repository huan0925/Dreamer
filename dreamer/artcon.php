<?php 
	
	header("Content-Type:text/html; charset=utf-8");
	$host = 'localhost';
	$dbuser = 'root';
	$dbpw = 'huan';
	$dbname = 'dreamer';

	$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);


	if(!$link){
		die('Could not connect: ' . mysql_error());
	}
	if (isset($_POST['upload']) && isset($_FILES['uploadfile'])) {
		echo "<pre>";
		//print_r($_FILES['uploadfile']);
		echo "</pre>";

		$img_name = $_FILES['uploadfile']['name'];
		$img_size = $_FILES['uploadfile']['size'];
		$tmp_name = $_FILES['uploadfile']['tmp_name'];
		$error = $_FILES['uploadfile']['error'];

		if ($error === 0) {
			if ($img_size > 125000) {
				$err = "sorry, your file is too large!";
				echo $err;
				
			}else{
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);

				$allowed = array("jpg", "png", "jpeg");
				if (in_array($img_ex_lc, $allowed)) {
					$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
					$img_uploade_path = 'uploads/' . $new_img_name;
					move_uploaded_file($tmp_name, $img_uploade_path);
					$title = $_POST['title'];
					$content = $_POST['content'];
					$user = "INSERT INTO articles(user_id) SELECT user_id FROM users";
					$sql = "INSERT INTO articles(title, content, image) VALUES('$title', '$content','$new_img_name')";
					mysqli_query($link, $sql, $users);
					header("Location: user.php");
				}else{
					$err = "you can't upload file like this type.";
					echo $err;
				}
			}
		}else{
			$err = "unknow error occured!";
			echo $err;
		}

	}else{
		header("Location: post.php");
	}

?>