<?php 
	$get_id = $_GET['post_id'];	
	$get_com = "select * from comment where post_id='$get_id' ORDER by 1 DESC";	
	$run_com = mysqli_query($link,$get_com);
	while($row=mysqli_fetch_array($run_com)){
		$com = $row['comment']; 
		$com_name = $row['comment_author']; 
		echo "
			<p>$com_name ：$com</p>
		";
	}
?>