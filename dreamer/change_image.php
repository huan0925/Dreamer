<?php 
    include('conn.php');
    if(isset($_GET['u_id'])){
        $u_id = $_GET['u_id'];
    }
    $get_user = "SELECT * FROM user WHERE user_id='$u_id'"; 
    $run_user = mysqli_query($link,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_image = $row['user_image'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
        <link rel="stylesheet" href="css/d1.css">
        <link rel="stylesheet" href="css/d3.css">
        <link rel="stylesheet" href="css/save.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
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

                    <li class="nav-item">
                        <a class="nav-link" href=""><img class='iconnotice' src="images/notice.png"></img></a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="#"><i class="fas fa-comment-dots" style="font-size: 30px;"></i></a>
                    </li>
                    <a href="user.php?u_id=<?php echo $u_id; ?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">登出</a>
                    </li>
                </div>
            </nav>
          </div>
        </header>
        <div>
            <center>
                <img src="users/<?php echo $user_image; ?>" class="img-fluid " style="border-radius: 5%; width:600px;" alt="">
            </center>
        </div>
    </body>


