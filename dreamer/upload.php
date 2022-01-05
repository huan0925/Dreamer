<!DOCTYPE html>
<?php session_start();
include('conn.php');


$user = $_SESSION['email'];
$get_user = "SELECT * FROM user WHERE email='$user'"; 
$run_user = mysqli_query($link,$get_user);
$row=mysqli_fetch_array($run_user);
    
$user_id = $row['user_id'];;
?>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <title>DREAMER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link rel="stylesheet" href="css/d1.css">
    <link rel="stylesheet" href="css/d3.css">
    <link rel="stylesheet" href="css/save.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="scrollTop">
          <a href="index.php" class="navbar-brand">
            <img src="images/dream.jpg">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="login.html">註冊/登入</a>
              </li>
            <form class="form-inline my-2 my-lg-0" method="post">
              <input class="form-control mr-sm-2 input-jq-toggle" type="search" placeholder="搜尋" aria-label="Search" style="width:780px; border-radius: 30px;">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
            </form> 
             <li class="nav-item">
                <a class="nav-link" href=""><img class='iconnotice' src="images/notice.png"></img></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#"><i class="fas fa-comment-dots" style="font-size: 30px;"></i></a>
             </li>
             <a href="user.php?u_id=<?php echo $user_id;?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
            
          </div>
        </nav>
      </div>
    </header>

  <form method="post" enctype="multipart/form-data">
    <div class="form">
      <label for="" >專案名稱</label>
      <input type="text" placeholder="40字以內" name="title">

      <label for="">專案目標</label>
      <input type="number" placeholder="1000" name="goal">
      <div>
        <label for="">專案開始與結束時間</label><br>
        <input type="date" name="start_time">  >
        <input type="date" name="end_time">
      </div>
      
      <label for="">專案內容摘要</label>
      <textarea placeholder='內容摘要' class='pb-cmnt-textarea' name='content' cols="30" rows="5"></textarea>
      
      <label class="btn btn-info upload">
        <input id="upload_img" style="display:none;" type="file" name="upload_image">
        <i class="fa fa-photo"></i>新增圖片
      </label>

      <label for="">提案負責人姓名</label>
      <input type="text" placeholder="請填寫真實姓名" name="principle_name">
      <label for="">電子郵件</label>
      <input type="text" placeholder="電子郵件" name="principle_email">
      <label for="">行動電話</label>
      <input type="tel" placeholder="行動電話" name="principle_phone">

      <div>
        <i class="fas fa-check-circle"><span>請確認所有項目皆已填寫完畢</span></i>
        <button name="sub" type="submit">提交</button>
      </div>
      <?php
        if(isset($_POST['sub'])){

          global $user_id;
          $title = htmlentities($_POST['title']);
          $goal =  htmlentities($_POST['goal']);
          $start_time = htmlentities($_POST['start_time']);
          $end_time = htmlentities($_POST['end_time']);
          $content = htmlentities($_POST['content']);
          $upload_image = $_FILES['upload_image']['name']; 
          $image_tmp = $_FILES['upload_image']['tmp_name'];
          $random_number = rand(1,100);
          $principle_name = htmlentities($_POST['principle_name']);
          $principle_email = htmlentities($_POST['principle_email']);
          $principle_phone = htmlentities($_POST['principle_phone']); 
          
          
          if($title==""||$goal==""||$start_time==""||$end_time==""||$content==""||$upload_image==""||$principle_name==""||$principle_email==""||$principle_phone==""){
            echo"<script>alert('請完整填寫！')</script>";
            echo"<script>window.open('upload.php','_self')</script>"; 
          }else{
            if(strlen($title) > 40){
              echo "<script>alert('Please Use 40 or less than 40 words')</script>";
              echo "<script>window.open('upload.php','_self')</script>";
            }else{
              if($end_time<$start_time){
                echo "<script>alert('結束日期不可大於開始日期')</script>";
                echo "<script>window.open('upload.php','_self')</script>";
              }else{                           
                if(strlen($title) >= 1){
                  move_uploaded_file($image_tmp,"image_post/$upload_image.$random_number");
                  $insert = "insert into post (user_id,title,goal,sponsor_total,start_date,end_date,content,post_image,proj_name,proj_email,proj_phone) values ('$user_id','$title','$goal','0','$start_time','$end_time','$content','$upload_image.$random_number','$principle_name','$principle_email','$principle_phone')";
                  //echo $insert;
                  $run = mysqli_query($link,$insert);
                
                  if($run){
                    echo"<script>alert('您的專案已發佈！')</script>";
                    echo"<script>window.open('index.php','_self')</script>";
                  
                    $update = "update user set posts='yes' where user_id='$user_id'";
                    $run_update = mysqli_query($link,$update);
                  }
                }   
              }
            }
          }
        }    
      ?>
      </div>
    </form>
  </body>
</html>
