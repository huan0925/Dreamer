<!DOCTYPE html>
<?php session_start();
include('conn.php');
include('searchf.php');
include('function.php');?>

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

    <?php 
      $user = $_SESSION['email'];
      $get_user = "SELECT * FROM user WHERE email='$user'"; 
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
          
          
      $user_posts = "SELECT * FROM post WHERE user_id='$user_id'"; 
      $run_posts = mysqli_query($link,$user_posts); 
      $posts = mysqli_num_rows($run_posts);
      ?>
    <header id="scrollTop">
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
             
             <a href="user.php?u_id=<?php echo $user_id; ?>"><i class="fas fa-user" style="color: #777; font-size: 30px; margin-top: 6px;margin-left: 10px;"></i></a>
             <li class="nav-item">
                <a class="nav-link" href="logout.php">登出</a>
              </li>
            
          </div>
        </nav>
      </div>
    </header>
    <?php get_posts();?>
    <!--<div class="idea">
      <h6>適合妳的點子</h6>
      <div class="idea-search-area">
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1551884831-bbf3cdc6469e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=130&q=60');" >Humor</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1525947088131-b701cd0f6dc3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8d29vZHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">Woodworking</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZnVybml0dXJlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">Furniture</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1605979257913-1704eb7b6246?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80');">Pokemon</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1598815018049-fecfc7f240bc?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8YWN0cmVzc3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">Actresses</a>
      </div>
      <h6>Pinterest上的熱門話題</h6>
      <div class="idea-search-area">
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8d2FsbHBhcGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">壁紙</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1611162616305-c69b3fa7fbe0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aWd8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">ig 精選 可愛</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1556656793-08538906a9f8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aXBob25lfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">壁紙iphone</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1529336953128-a85760f58cb5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8ZGVza3RvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">桌布 文青</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1591815302525-756a9bcc3425?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGlwaG9uZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">ig 精選 封面 pink</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bGFuZHNjYXBlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">桌布 iphone 風景</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1559055443-b6627803c7e0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8JUU5JUFEJTk0JUU5JTgxJTkzfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">魔道祖師 忘美肉</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1509644851169-2acc08aa25b5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8d2luZG93fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">櫥窗</a>
      </div>
      <h6>男性時尚</h6>
      <div class="idea-search-area">
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1512581574034-6f1da619c5fa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2ljayUyMG1hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');">病驕男</a>
        <a href="#" style="background-image: url('https://images.unsplash.com/photo-1586083702768-190ae093d34d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aGFuZHNvbWUlMjBtYW58ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'); background-position: center 15%;">髮型男</a>
        <a href="#" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9xiZ1cIJyjcMJKXj3dGK0i-BLCP3lKHLMeA&usqp=CAU');  background-position: center 30%;">穿搭韓過男生</a>
        <a href="#" style="background-image: url('data:image/jpeg;base64,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'); background-position: 40% 20%;">歐美穿搭男</a>
        <a href="#" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiviQt84fu6Zbi4C8VnXjkM51qCLOqsP-InQ&usqp=CAU'); background-position: center center;">韓國歐巴</a>
      </div>
    </div>-->
     <!-- chat -->

     <!--<div class="chat" style="right: 330px; top: 70px;">
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
  </div>-->
  <div class="addProject">
    <a href="upload.php"><i class="fas fa-plus-circle"></i></a>
    <a href="#scrollTop"><i class="fas fa-arrow-alt-circle-up"></i></a>
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
      
    
       $(document).ready(function(){
            $('.input-jq-toggle').click(function(){
                $('.idea').toggle(800);
            })
        },);

        $(document).ready(function(){
            $('.fa-heart').click(function(){
                $(this).toggleClass('fas');
            })
        },);
    </script>
  </body>
</html>
