<?php 
function result(){
include('conn.php');

if(isset($_POST['search'])){
	$search_query = htmlentities($_POST['question']);
	}
	$get_posts = "SELECT * FROM posts WHERE title LIKE '%$search_query%' OR post_content LIKE '%$search_query%' OR upload_image LIKE '%$search_query%'";

	$run_posts = mysqli_query($link,$get_posts);
	
	while($row_posts=mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$title = $row_posts['title'];
		$content = substr($row_posts['post_content'],0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		//getting the user who has posted the thread

		$user = "SELECT * FROM users WHERE user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query($link,$user);
		$row_user=mysqli_fetch_array($run_user); //row_user is an array

		$user_name = $row_user['user_name'];
		$account = $row_user['account'];
		$user_image = $row_user['user_image'];

		if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			//單篇文章頁面
		}else{
			echo "很抱歉，沒有結果，請搜尋其他相關字！";
		}
	}
}

 ?>