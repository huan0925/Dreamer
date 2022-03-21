<!DOCTYPE html>
<?php
session_start();
include("conn.php");
?>
<?php

if(!isset($_SESSION['email'])){

	header("location: index.php");

}
else{ ?>
<html>
<head>
	<title>Edit Post</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link rel="stylesheet" href="css/d1.css">
    <link rel="stylesheet" href="css/d3.css">
    <link rel="stylesheet" href="css/save.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
  .form{
	  margin: 0;
	  width: 3000px;
	  background: #ccc;
	  display: flex;
	  flex-direction: column;
	  padding: 20px 15px;
	  position: relative;
    left: -50px;
  }
  body{
    background:url("images/21.png") no-repeat center; 
  }
</style>
<body>
<div class="row">
<div class="col-sm-3">

</div>
<div class="col-sm-6">
	<?php
	if(isset($_GET['post_id'])){

		$get_id = $_GET['post_id'];

		$get_post = "select * from post where post_id='$get_id'";
		$run_post = mysqli_query($link,$get_post);
		$row=mysqli_fetch_array($run_post);

        $user_id = $row['user_id'];
        $post_title = $row['title'];
		    $post_con = $row['content'];
        $post_goal = $row['goal'];
        $start_time = $row['start_date'];
        $end_time = $row['end_date'];
        $upload_image = $row['post_image'];
        $principle_name = $row['proj_name'];
        $principle_email = $row['proj_email'];
        $principle_phone = $row['proj_phone']; 
	}
	?>
  
	<form method="post" enctype="multipart/form-data">
		<center><h2 style="margin-top: 10px;">編輯您的貼文</h2></center><br>
		<div class="form">
  <label for="" >專案名稱</label>
  <input type="text" placeholder="40字以內" name="title" value=<?php echo $post_title;?>>
  <label for="">專案目標</label>
  <input type="number" placeholder="1000" name="goal" value=<?php echo $post_goal;?>>
  <div>
    <label for="">專案開始與結束時間</label><br>
    <input type="date" name="start_time" value=<?php echo $start_time;?>>  >
    <input type="date" name="end_time" value=<?php echo $end_time;?>>
  </div>
  
  <label for="">專案內容摘要</label>
  <textarea placeholder='內容摘要' class='pb-cmnt-textarea' name='content' cols="30" rows="5"><?php echo $post_con;?></textarea>
  
  <label class="btn btn-info upload" style="float:right;">
    <input id="upload_img" style="display:none;" type="file" name="upload_image" >
    <i class="fa fa-photo" ></i>新增圖片
  </label>
  <label for="">提案負責人姓名 </label>
  <input type="text" placeholder="請填寫真實姓名" name="principle_name" value=<?php echo $principle_name;?>>
  <label for="">電子郵件</label>
  <input type="text" placeholder="電子郵件" name="principle_email" value=<?php echo $principle_email;?>>
  <label for="">行動電話</label>
  <input type="tel" placeholder="行動電話" name="principle_phone" value=<?php echo $principle_phone;?>>
  <br>
  <center><i class="fas fa-check-circle"><span>請確認所有項目皆已填寫完畢</span></i></center>
  <br>
  <center><input type="submit" name="update" value="更新" class="btn btn-info" style="width: 100px;"/>
  <button type="button" class="btn btn-info" ><a href="user.php?u_id=<?php echo $user_id; ?> " style="text-decoration:none; color: white">回上頁</a></button>
</center>
	</form>

<?php
  //圖片尚未更新
	if(isset($_POST['update'])){

    $new_title = $_POST['title'];
    $new_goal = $_POST['goal'];
	  $new_content = $_POST['content'];
    $new_start = $_POST['start_time'];
    $new_end = $_POST['end_time'];
    $new_name = $_POST['principle_name'];
    $new_email = $_POST['principle_email'];
    $new_phone = $_POST['principle_phone'];
    
    if($new_title==""||$new_goal==""||$new_content==""||$new_start==""||$new_end==""||$new_name==""||$new_email==""||$new_phone==""){
      echo "<script>alert('請填寫完整！')</script>";
      echo "<script>window.open('edit_post.php?post_id=$get_id','_self')</script>";
    }else{
      if($new_end<$new_start){
        echo "<script>alert('結束日期不可大於開始日期')</script>";
        echo "<script>window.open('edit_post.php?post_id=$get_id','_self')</script>";
      }else{
	      $update_post = "update post set title='$new_title',goal='$new_goal', content='$new_content', start_date='$new_start',end_date='$new_end',
        proj_name='$new_name', proj_email='$new_email', proj_phone='$new_phone'
        where post_id='$get_id'";
	      $run_update = mysqli_query($link,$update_post);

	      if($run_update){
	        echo "<script>alert('您的貼文已更新！')</script>";
	        echo "<script>window.open('user.php?u_id=$user_id','_self')</script>";
	      }
      }
    }
	}
?>
</div>
<div class="col-sm-3">
</div>
</div>
</body>
</html>
<?php } ?>
