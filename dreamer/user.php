<!DOCTYPE html>
<?php session_start(); 
include('function.php');?>

<html lang="en">
  <head>
    <?php 
        include('conn.php');
        if(isset($_GET['u_id'])){
            $u_id = $_GET['u_id'];
        }
        $get_user = "SELECT * FROM user WHERE user_id='$u_id'"; 
        $run_user = mysqli_query($link,$get_user);
        $row=mysqli_fetch_array($run_user);
          
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $account = $row['account'];
            $describe_user = $row['describe_user'];
            $password = $row['password'];
            $email = $row['email'];
            $gender = $row['gender'];
            $birthday = $row['birthday'];
            $user_image = $row['user_image'];
            $user_cover = $row['user_cover'];
            $recovery_account = $row['recovery_account'];
    ?>
    <meta charset="UTF-8">
    <title><?php echo $user_name; ?></title>

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
             <a href="user.php?u_id=<?php echo $user_id; ?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">登出</a>
              </li>
          </div>
        </nav>
      </div>
    </header>
    <?php 
        include('conn.php');
        $user = $_SESSION['email'];
        $get_user = "SELECT * FROM user WHERE email='$user'"; 
        $run_user = mysqli_query($link,$get_user);
        $row=mysqli_fetch_array($run_user);
        $user_check = $row['user_id'];
    ?>

    <div class="container-lg">
        <div class="picture-user">
            <a href="change_cover.php?u_id=<?php echo $u_id?>"> 
                <img src="cover/<?php echo $user_cover; ?>" class="img-fluid" style="border-radius:40px; height: 400px; width: 600px;" alt="cover">
            </a>
            <div>
            <a href="change_image.php?u_id=<?php echo $u_id?>">
                <img src="users/<?php echo $user_image; ?>" class="img-fluid " style="border-radius: 50%; height: 80px; width: 80px;" alt="">
            </a>
            </div>
            <h2><?php echo $user_name; ?></h2>
            <p><?php echo $describe_user; ?></p>
            <p name="fans"></p> 
            <p>一千萬人 每月瀏覽</p>   
            <button type="button" name="sub" style="border-radius: 30px; padding: 5px 12px;" id = "sub">訂閱</button>
            <?php
                if($u_id==$user_check){
                    echo"<a href='edit_profile.php'><button type='button' style='border-radius: 30px; padding: 5px 12px;' >更改個人檔案</button></a>";
                }
            ?>
        </div>        
    </div>
    <div style="margin-top: 30px;"> 
        <div style="text-align: center;">
            <button type="button" class="btn-style" style="border-radius: 30px; padding: 5px 12px;" >已建立</button>
            <button type="button" class="btn-style" style="border-radius: 30px; padding: 5px 12px;" >已儲存</button>
        </div><br>
    <?php user_posts();?>
    <!-- chat -->

    <div class="chat">
        <div class="d-flex chatcenter">
            <p>收件匣</p>
            <i class="fas fa-ellipsis-h"></i>
            <i class="fas fa-pen"></i>
        </div>
        <div class="contact">
            <h4> 與朋友共享點子</h4>
            <i class="fas fa-search"></i>
            <input type="text" placeholder="按名稱或電子郵件地址搜尋" style=" width: 320px; border-radius: 30px;">
        </div>
        <div class="friends">
            <p style="margin-left: 15px; margin-top: 15px;">建議選項</p>
            <ul style="padding-left: 15px;">
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Ann Sin</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Azria</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Anna</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Amy</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Emily</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Sam</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Hank</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Billy Lin</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
                <li>
                    <div style="width: 60px;height: 60px; background: #ccc; border-radius: 50%; line-height: 60px;text-align: center; font-size: 30px ;">A</div>
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Johnson</p>
                        <p style="color: #ccc">在你的網路中</p>
                    </div>
                </li>
            </ul>


        </div>    
    </div>

    <script>

        // $(".fa-comment-dots").toggle(
        //     function(){
        //         $(".chat").css("display","block");
        //     },       
        // );

        $(document).ready(function(){
            $('.fa-comment-dots').click(function(){
                $('.chat').toggle();
            })
        })
        

    </script>
  </body>
</html>
