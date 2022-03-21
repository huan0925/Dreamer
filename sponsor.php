<!DOCTYPE html>
<?php session_start();
include('conn.php');

$user = $_SESSION['email'];
$get_user = "SELECT * FROM user WHERE email='$user'"; 
$run_user = mysqli_query($link,$get_user);
$row=mysqli_fetch_array($run_user);  
$user_id = $row['user_id'];

$sponsor_post_id = $_SESSION['sponsor_post_id'];
$get_from_post = "select * from post where post_id = '$sponsor_post_id'";
$run_post = mysqli_query($link,$get_from_post);
while($row_post = mysqli_fetch_array($run_post)){
    $goal = $row_post['goal'];
    $start = $row_post['start_date'];
    $end = $row_post['end_date'];
    $principle_name = $row_post['proj_name'];
    $principle_phone = $row_post['proj_phone'];
    $principle_email = $row_post['proj_email'];
}

$user = $_SESSION['email'];
$get_user = "select * from user where email='$user'"; 
$run_user = mysqli_query($link,$get_user);
$row=mysqli_fetch_array($run_user);  
$user_id = $row['user_id'];

$sponsor_post_id = $_SESSION['sponsor_post_id'];
$sponsor_price = $_SESSION['sponsor_price'];

//get post title and project priciple
$get_from_post = "select * from post where post_id = '$sponsor_post_id'";
$run_post = mysqli_query($link,$get_from_post);
while($row_post = mysqli_fetch_array($run_post)){
    $proj_title = $row_post['title'];
    $proj_priciple = $row_post['proj_name'];
    $sponsor_total = $row_post['sponsor_total'];

$total = $sponsor_price+$sponsor_total;
$insert = "insert into sponsor (sponsor_user_id,post_id,title,principle_name,sponsor_price) 
values ('$user_id','$sponsor_post_id','$proj_title','$proj_priciple',$sponsor_price)";
//echo $insert;
$run = mysqli_query($link,$insert);	

$update = "update post set sponsor_total='$total' where post_id = '$sponsor_post_id'"; 
//echo $update;
$run_update = mysqli_query($link,$update); 
}

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
          <a class="navbar-brand" href="index.php">
            <img src="images/dream.jpg">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <form class="form-inline my-2 my-lg-0" method="post" action="result.php">
                <input type="text" name="user_search"  class="form-control mr-sm-2 input-jq-toggle" placeholder="搜尋" aria-label="Search" style="width:780px; border-radius: 30px;" name="question">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form> 
            <a href="user.php?u_id=<?php echo $user_id; ?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">登出</a>
            </li>

          </div>
        </nav>
      </div>
    </header>
    <div class="sponsor">
    <h2>感謝您的贊助</h2>
      <div>
        <img src="images/thanks.jfif" style="width:700px; height:500px; border-radius: 30px">
        <div><center>
          <p>本專案目標為<?php echo $goal;?>元</p>
          <p>募資時間為<?php echo $start;?>~<?php echo $end;?></p>
          <p>贊助小禮物將迅速發放</p><br>
          <p>有問題再請直接聯絡專案負責人</p>
          <p>專案負責人姓名：<?php echo $principle_name;?></p>
          <p>專案負責人E-mail：<?php echo $principle_email;?></p>
          <p>專案負責人電話：<?php echo $principle_phone;?></p>
</center>
        </div>
      </div>
    </div>  
    </div>
  </body>
</html>



