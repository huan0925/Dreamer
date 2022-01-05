
<?php 
include("conn.php");
	if(isset($_GET['post_id'])){
	    $post_id = $_GET['post_id']; 

		$get_posts = "select user_id from post where post_id='$post_id'";
	    $run_posts = mysqli_query($link,$get_posts);
	    $row_posts=mysqli_fetch_array($run_posts);

	    $user_id = $row_posts['user_id'];

		$delete_post = "delete from post where post_id='$post_id'";

		$run_delete = mysqli_query($link,$delete_post);

		if($run_delete){
			echo "<script>alert('您已刪除一則文章')</script>";
			echo "<script>window.open('user.php?u_id=$user_id','_self')</script>";
		}		
	}
?>