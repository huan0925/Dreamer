<?php
function getmydb($myusername,$mypassword, $myemail, $myname, $mytel, $mygender, $mybirthday){
	//echo ("result: " . $myusername . $mypassword . $myemail . $myname . $mytel . $mygender . $mybirthday);
 
	header("Content-Type:text/html; charset=utf-8");
	$host = 'localhost';
	$dbuser = 'root';
	$dbpw = 'huan';
	$dbname = 'dreamer';

	$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);

	if(!$link){
		die('Could not connect: ' . mysql_error());
	}
	echo "Connected successfully";
	$dbmessage = mysql_select_db("dreamer");
	$sql = "INSERT INTO users (account, password, email, user_name, gender, birthday)
	VALUES " . 
	"(" . "'" . $myusername . "', " . "'" . $mypassword . "', " . "'" . $myemail ."', " . "'" . $myname . "' ,"  . "'" . $mygender . "', " . "'" . $mybirthday . "'" . ") ";
	echo "<script>alert('註冊成功！')</script>";
	echo "<script>window.open('login.php', '_self')</script>";



if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
}
?>