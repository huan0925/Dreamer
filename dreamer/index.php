<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>主頁</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<style>
    .wraps h2{
        background: #007FFF;
        padding: 12px 0;
        text-align: center;
        color: white;
    }
    .sign{
        margin: 0 auto;
        width: 100%;
        display: flex;
    }
    .banner h2{
        text-align: center;
        color: white;
    }
    .sign-img{
        width: 40%;
        padding-top: 120px;
        padding-left: 80px;
        padding-bottom: 120px;
        background-image: url('https://picsum.photos/800/800?random=18');
    }
    .sign-img p{
        margin-bottom: 30px;
        font-size: 18px;
        color: white;
    }
    .signup{
        display: flex;
        flex-direction: column;
        margin-left: 5%;
        width: 30%;
    }
    .signup h3{
        font-size: 22px;
    }
    .signup button{
        width: 85%;
        text-align: center;
        border: 2px solid #00BFFF;
        color: 	#00BFFF;
        border-radius: 30px;
        margin-bottom: 20px;
        padding: 12px 0px;
        font-size: 18px;
        cursor: pointer;
    }
    .signup button:hover{
        background: #00BFFF;
        color: white;
    }
</style>
<body>
<form method="post" accept-charset="utf-8">
	<div class="wraps">
        <h2>coding-cafe</h2>
        <div class="sign">    
            <div class="sign-img">
                <p><i class="fas fa-search"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="fas fa-search"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="fas fa-search"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            
            <div class="signup">
                <i class="fab fa-cuttlefish" style="color: #007FFF; font-size:50px;"></i>
                <h3>See what's happening in <br>the world right now</h3>
                <p>Join Coding Cafe Today</p>
                <button id="login" name="login">login</button>
                <?php 
				if (isset($_POST['login'])) {
					echo "<script>window.open('login.php','_self') </script>";
				}
			    ?>
                <button id="singup" name="signup">sign up</button>
                <?php 
				if (isset($_POST['signup'])) {
					echo "<script>window.open('register.php','_self') </script>";
				}
			    ?>
            </div>
        </div>
    </div>
</form>
</body>
</html>