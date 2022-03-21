<?php 
    session_start();
    include('conn.php');
    if(isset($_GET['u_id'])){
        $u_id = $_GET['u_id'];
    }
    $get_user = "SELECT * FROM user WHERE user_id='$u_id'"; 
    $run_user = mysqli_query($link,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_image = $row['user_image'];

    $user = $_SESSION['email'];
    $get_user = "SELECT * FROM user WHERE email='$user'";
    $run_user = mysqli_query($link,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_check = $row['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/d1.css">
    <link rel="stylesheet" href="css/d3.css">
    <link rel="stylesheet" href="css/save.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
        body{
            background: url("images/21.png") no-repeat center;
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
                    <a href="user.php?u_id=<?php echo $user_check; ?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">登出</a>
                    </li>
                </div>
            </nav>
          </div>
        </header>
        <div>
            <?php
                if($u_id == $user_check){
                    echo"
                        <center>
                            <form method='post' enctype='multipart/form-data'>
                                <img src='users/$user_image' class='img-fluid' style='border-radius: 5%; width:600px;'>
                                <br><br>
                                <input id='u_image' type='file' name='u_image' value='$user_image' class='form-control' style='width:500px; background: orange;'/>	
                                <br>
                                <button name='update' type='submit'  class='btn btn-warning' style='color: #0080FF width:200px;'>上傳</button>
                            </form>
                        </center>
                    ";
                    if(isset($_POST['update'])){
                        $u_image = $_FILES['u_image']['name'];
                        $image_tmp = $_FILES['u_image']['tmp_name'];				        
                    
                        move_uploaded_file($image_tmp,"users/$u_image");
                        $update = "update user set user_image = '$u_image' where user_id='$u_id'";
                        $run = mysqli_query($link,$update); 
    
                        if($run){
                            echo "<script>alert('您的頭貼已更新！')</script>";
                            echo "<script>window.open('user.php?u_id=$u_id','_self')</script>";
                        }
                        else{
                            echo "<script>alert('請重新上傳一次！')</script>";
                        }
                    }											
    
                }
                else {
                    echo"
                        <center>
                            <img src='users/$user_image' class='img-fluid' style='border-radius: 5%; width:600px;'>
                        </center>
                    ";

                }
			?>

        </div>
    </body>
</html>


