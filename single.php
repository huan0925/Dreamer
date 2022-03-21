<!DOCTYPE html>
<?php session_start();
include('function.php');
include('conn.php');
if(!isset($_SESSION['email'])){
  
  header("location: index.php");

}
else{
  $user = $_SESSION['email'];
  $get_user = "SELECT * FROM user WHERE email='$user'"; 
  $run_user = mysqli_query($link,$get_user);
  $row=mysqli_fetch_array($run_user);
  $user_id = $row['user_id'];
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
  <style>
  body{
    background:url("images/21.png") center;
  }
</style>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <a href="index.php" class="navbar-brand">
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
    <?php single_post()?>
  </body>
</html>
