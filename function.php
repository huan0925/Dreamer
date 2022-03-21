
<?php 
function get_posts(){
	include('conn.php');
	$get_posts = "select * from post ORDER by 1 DESC ";

	$run_posts = mysqli_query($link,$get_posts);

	$user_email = $_SESSION['email'];
	

	while($row_posts=mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$title = $row_posts['title'];
		$content = substr($row_posts['content'],0,40);
		$upload_image = $row_posts['post_image'];
		$viewers = $row_posts['viewers'];
				
		//$check user
		$check_now_user = "select * from user where email = '$user_email'";
		$link_user = mysqli_query($link,$check_now_user);
		$row_now_user = mysqli_fetch_array($link_user);
		$now_user = $row_now_user['user_id'];
		//getting the user who has posted the thread
		$user = "select * from user where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($link,$user);
		$row_user=mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];


		echo "	
		<div class='col-md-4'>
			<div class='container-fluid border' style='border:1px solid #cecece;'>
			<center>
			<a href='single.php?post_id=$post_id' style='cursor: pointer; display: block;'>
			  	<img src='image_post/$upload_image' style='width='200px' height='400px''>
			</a> 
			<p>$user_name</p>
			<p>$title</p>
			<i class='fas fa-eye'>$viewers</i>
			<center>
			</div>
			</div>
		";
	}
	
}

function single_post(){
	include('conn.php');
	if(isset($_GET['post_id'])){
		$get_id = $_GET['post_id'];
		$get_posts = "select * from post where post_id='$get_id'";
		$run_posts = mysqli_query($link,$get_posts);
		$row_posts=mysqli_fetch_array($run_posts);

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$title = $row_posts['title'];
		$content = $row_posts['content'];
		$goal = $row_posts['goal'];
		$start = $row_posts['start_date'];
		$end = $row_posts['end_date'];
		$name = $row_posts['proj_name'];
		$proj_email = $row_posts['proj_email'];
		$phone = $row_posts['proj_phone'];
		$upload_image = $row_posts['post_image'];
		$sponsor_total = $row_posts['sponsor_total'];
		$remain = $goal-$sponsor_total; //剩下多少達標
		$reach_percent = round(($sponsor_total/$goal)*100) ;//已達標%數
		//echo $goal-$after;
		//getting the user who has posted the thread
		$user = "select * from user where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query($link,$user);
		$row_user=mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$account = $row_user['account'];
		$user_image = $row_user['user_image'];

		// getting the user session
		$user_com = $_SESSION['email'];

		$get_com = "select * from user where email='$user_com'";
		$run_com = mysqli_query($link,$get_com);
		$row_com=mysqli_fetch_array($run_com);

		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];

		$view = "update post set viewers = viewers+1 where post_id = '$post_id'";
		$row_view = mysqli_query($link,$view);


		//now displaying all at once
		if(isset($_GET['post_id'])){
			$post_id = $_GET['post_id'];
		}
			$get_posts = "select post_id from user where post_id='$post_id'";
			$run_user = mysqli_query($link,$get_posts);

			$post_id = $_GET['post_id'];

			$get_user = "select * from post where post_id='$post_id'";
			$run_user = mysqli_query($link,$get_user);
			$row=mysqli_fetch_array($run_user);
			$row_image = $row['post_image'];
			//echo $row_image;
			$p_id = $row['post_id'];

			if($p_id != $post_id){
				echo "<script>alert('ERROR！請在試一次')</script>";
				echo "<script>window.open('upload.php','_self')</script>";
			}else{
				//count days
				$Date_1=date("Y-m-d");
				$d1=strtotime($Date_1);
				$d2=strtotime($start);
				$d3=strtotime($end);
				$Days1=round(($d1-$d2)/3600/24);
				$Days2=round(($d1-$d3)/3600/24);
				if($Days1>0 && $Days2<0){
					echo"
						<i class='fas fa-arrow-left' style='margin-left: 20px; color: #000;' onclick='history.back()'></i>
						<div class='container' style='display: flex; background: #fff; border-radius: 30px; box-shadow: 3px 3px #eee; width: 750px;'>
						  	<div style='position: relative;'>
								<img src=image_post/$row_image style='border-radius: 30px 0 0 30px;' width='350px' height='700px'>
						  	</div>

						  	<div class='right-description'>
								<p><a href='user.php?u_id=$user_id'>$account</a><br></p>
								<h6>$title</h6>
								<p>$content</p>
								<p>專案目標：$goal 元</p>
								<p>募資時間： $start ~ $end</p>
								<p>專案進度：$reach_percent %</p>
								<p>目前贊助金額：$sponsor_total 元</p>
								<h4>專案負責人資訊</h4>
								<p>負責人姓名：$name</p>
								<p>負責人E-mail：$proj_email</p>
								<p>負責人電話：$phone</p>
								<form action='' method='post' class='form-inline'>
									<textarea placeholder='請寫下你的留言！' class='pb-cmnt-textarea' name='comment' style='height:40px;'></textarea>
									&nbsp;&nbsp;<button class='btn btn-info pull-right' name='reply'>Comment</button><br>
								</form><hr>留言：";
								include('comment.php');
								echo"
									<hr>
									<form method='post'>
										<input type='number' name='sponsor_price' placeholder='請輸入您要贊助的金額' style='height:40px;'>
										&nbsp;<input type='submit' id='btn_sub' value='贊助' name='sponsor' class='btn btn-info pull-right'>	
									</form>
						  	</div>
						</div>
				  	</div><br>";  
				}else{
					if($Days1<0){
						echo"
						<i class='fas fa-arrow-left' style='margin-left: 20px; color: #000;' onclick='history.back()'></i>
						<div class='container' style='display: flex; background: #fff; border-radius: 30px; box-shadow: 3px 3px #eee; width: 740px;'>
							<div style='position: relative;'>
								<img src=image_post/$row_image style='border-radius: 30px 0 0 30px;' width='350px' height='700px'>
							</div>
							
							<div class='right-description'>
								<p><a href='user.php?u_id=$user_id'>$account</a></p>
								<h6>$title</h6>
								<p>$content</p>
								<p>專案目標：$goal</p>
								<p>募資時間： $start ~ $end</p>
								<p>專案進度：$reach_percent</p>
								<p>目前贊助金額：$sponsor_total</p>
								<h4>專案負責人資訊</h4>
								<p>負責人姓名：$name</p>
								<p>負責人E-mail：$proj_email</p>
								<p>負責人電話：$phone</p>							
								<form action='' method='post' class='form-inline'>
									<textarea placeholder='請寫下你的留言！' class='pb-cmnt-textarea' name='comment'></textarea>
									<button class='btn btn-info pull-right' name='reply'>Comment</button><br>
								</form><hr>留言：";
								include('comment.php');
								echo"
									<hr>
									<p>此專案尚未開放！</p>
							</div>
						</div><br>;";
					}
					if ($Days2>0){
						echo" 
							<i class='fas fa-arrow-left' style='margin-left: 20px; color: #000;' onclick='history.back()'></i>
							<div class='container' style='display: flex; background: #fff; border-radius: 30px; box-shadow: 3px 3px #eee; width: 740px;'>
							  	<div style='position: relative;'>
									<img src=image_post/$row_image style='border-radius: 30px 0 0 30px;' width='350px' height='700px'>
							  	</div>

							  	<div class='right-description'>
									<p><a href='user.php?u_id=$user_id'>$account</a></p>
									<h6>$title</h6>
									<p>$content</p>
									<p>專案目標：$goal</p>
									<p>募資時間： $start ~ $end</p>
									<p>專案進度：$reach_percent</p>
									<p>目前贊助金額：$sponsor_total</p>	
									<h4>專案負責人資訊</h4>
									<p>負責人姓名：$name</p>
									<p>負責人E-mail：$proj_email</p>
									<p>負責人電話：$phone</p>
									<form action='' method='post' class='form-inline'>
										<textarea placeholder='請寫下你的留言！' class='pb-cmnt-textarea' name='comment'></textarea>
										<button class='btn btn-info pull-right' name='reply'>Comment</button><br>
									</form><hr>留言：";
									include('comment.php');
									echo "
										<hr>
										<p>此專案已關閉！</p>
								</div>
							</div><br>;
						";
					}
				}
			}

	

		//贊助
		if(isset($_POST['sponsor'])){
			if($_POST['sponsor_price']!=""){
				$get_post_user = "select * from post where post_id=$post_id";
				$run_get_post_user = mysqli_query($link,$get_post_user);
				//echo "<script>alert('$get_post_user')</script>";
				$sponsor_price = $_POST['sponsor_price'];
				//echo "<script>alert('$sponsor_price')</script>";
				while($row_post_detail = mysqli_fetch_array($run_get_post_user)){
					$post_id = $row_post_detail['post_id'];
					$title = $row_post_detail['title'];
					$principle_name = $row_post_detail['proj_name'];
					$sponsor_detail = "select * from sponsor where sponsor_user_id='$user_com_id' AND post_id='$post_id' ";
					
					$run_sponsor_detail = mysqli_query($link,$sponsor_detail);
					$row_sponsor_detail = mysqli_fetch_array($run_sponsor_detail);
					if($row_sponsor_detail){
						echo"<script>alert('非常感謝您，您已贊助過此專案囉！')</script>";
					}else{
						echo"<script>window.open('check_sponsor.php','_self')</script>";
						$_SESSION['sponsor_user_id'] = $user_com_id;
						$_SESSION['sponsor_post_id'] = $post_id;
						$_SESSION['sponsor_price'] = $sponsor_price;
					}
				}
			}else{
				echo "<script>alert('請輸入您要贊助的金額！')</script>";
			}
		}

		//留言
		if(isset($_POST['reply'])){

			$comment = htmlentities($_POST['comment']);

			if($comment == ""){
				echo"<script>alert('請輸入您的留言！')</script>";
				echo "<script>window.open('single.php?post_id=$post_id','_self')</script>";
			}else{
				$insert = "insert into comment (post_id,user_id,comment,comment_author) values ('$post_id','$user_id','$comment','$user_com_name')";
				$run = mysqli_query($link,$insert);
				echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
			}
		}

	}
}

function user_posts(){
	include('conn.php');
	$usersession = $_SESSION['email'];
	$get_user_session = "select * from user where email='$usersession'";
	$run_user_session = mysqli_query($link,$get_user_session);
	$row_session=mysqli_fetch_array($run_user_session);
	if(is_array($row_session)){
		$user_id_session = $row_session['user_id'];
	}
	if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}
	$get_posts = "select * from post where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
	$run_posts = mysqli_query($link,$get_posts);		
	while($row_posts=mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$title = $row_posts['title'];
		$content = substr($row_posts['content'],0,40);
		$upload_image = $row_posts['post_image'];
		$viewers = $row_posts['viewers'];
		//getting the user who has posted the thread
	
		$user = "select * from user where user_id='$user_id' AND posts='yes'"; 
		$run_user = mysqli_query($link,$user); 
		$row_user=mysqli_fetch_array($run_user);
		
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		$account = $row_user['account'];
	
		//now displaying all at once 

		if($u_id==$user_id_session){
			echo"
				<script>
					function confirm_delete(){
						if(confirm('您確要刪除此篇文章？') === true){
							window.open('delete_post.php?post_id=$post_id','_self')
						}else{
							window.open('user.php?u_id=$user_id','_self')
					    }
					}
				</script>
				<div class='col-md-4'>
				<div class='container-fluid border' style='border:1px solid #cecece;'>
				<center>
					<a href='single.php?post_id=$post_id' style='cursor: pointer; display: block;'>
					  <img src='image_post/$upload_image' style='width='200px' height='400px''>
					</a> 
					<p>$account</p>
					<p>$title</p>
					<i class='fas fa-eye'>$viewers</i>
					<center>
				<a href='edit_post.php?post_id=$post_id'><button class='btn btn-info'>Edit</button></a>
				<button class='btn btn-danger' Onclick='confirm_delete()'>Delete</button></a>
				<br/><br/><br/></center></div></div>
			";
		}else{
			echo "
			<div class='col-md-4'>
			<div class='container-fluid border' style='border:1px solid #cecece;'>
			<center>
				<a href='single.php?post_id=$post_id' style='cursor: pointer; display: block;'>
				  <img src='image_post/$upload_image' style='width='200px' height='400px''>
				</a> 
				<p>$account</p>
				<p>$title</p>
				<i class='fas fa-eye'>$viewers</i>
				<center></div></div>
			";
	
		}
	}	
}
function results(){
	include('conn.php');
	if(isset($_POST['search'])){
		$search_query = htmlentities($_POST['user_search']);
		//echo $search_query;
	}
	
	$get_posts = "select * from post where content like '%$search_query%' OR title like '%$search_query%'";
	$run_posts = mysqli_query($link,$get_posts);
	/*if(is_bool($run_posts)){
		echo "yes";
	}else {
		echo"no";
	}*/
	

	while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$title = $row_posts['title'];
		$content = substr($row_posts['content'],0,40);
		$upload_image = $row_posts['post_image'];	
		$viewers = $row_posts['viewers'];

		//getting the user who has posted the thread
		$user = "select * from user where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($link,$user);
		$row_user=mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		$account = $row_user['account'];

		echo "
		<div class='col-md-4'>
<div class='container-fluid border' style='border:1px solid #cecece;'>
<center>
			<a style='cursor: pointer; display: block;' href='single.php?post_id=$post_id'>
			  <img src='image_post/$upload_image' style='width='200px' height='400px'>
			</a> 
			  	  <p>$account</p>
			  	  <p>$title</p>

			  	  <i class='fas fa-eye'>$viewers</i>
					<center></div></div>
    		";
	}
}
?>